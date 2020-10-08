(function()
{
	function support()
	{
		var input = document.createElement('input');
		input.setAttribute('type', 'file');
		if(typeof input['files'] === 'object')
			return true;
		return false;
	}
	
	var form;
	
	if(support())
	{
		// 1MB chunk sizes.
		var BYTES_PER_CHUNK = 1024 * 1024 * 1;
		
		var _files_data = [];
	
		window.onload = function()
		{
			form = document.getElementsByTagName('form')[0];
			var inputs = form.getElementsByTagName('input');
			for(i in inputs)
			{
				if(typeof inputs[i] == 'object')
				{
					if(inputs[i].getAttribute('type')=='file')
					{
						var file_input = inputs[i];
						break;
					}
				}
			}
			
			form.reset();
	
			form.onsubmit = function(e)
			{
				e.preventDefault();
				sendRequest(file_input, this);		
			};
	
			file_input.onchange = function(e)
			{
				var toupload = document.getElementById('toupload');
				var ul = toupload.getElementsByTagName('ul')[0];
				while(ul.hasChildNodes())
					ul.removeChild(ul.firstChild);
	
				var target = e.target ? e.target : e.srcElement;
				
				var files = target.files;
				for(var i in files)
				{
					if(typeof files[i]=='object')
					{
						var found = false;
						var incompleted = document.getElementById('incompleted');
						var lis = incompleted.getElementsByTagName('li');
						for(var j in lis)
						{
							if(typeof lis[j].getAttribute=='function')
							{
								var data_name = lis[j].getAttribute('data-name');
								var slices = getSlicesCount(files[i]);
								if(data_name==files[i]['name'] && slices==lis[j].getAttribute('data-end'))
								{
									var tmp =
									{
										'data-start': lis[j].getAttribute('data-start'),
										'data-end': lis[j].getAttribute('data-end')
									};
									_files_data[i] = tmp;
									
									ul.appendChild(lis[j]);
									found = true;
								}
							}
						}
						
						if(found===false)
						{
							var tmp =
							{
								'data-start': 0,
								'data-end': getSlicesCount(files[i])
							};
							_files_data[i] = tmp;
									
							var li = document.createElement('li');
							li.setAttribute('data-name', files[i]['name']);
							var span = document.createElement('span');
							var txt = document.createTextNode(files[i]['name']+" ");
							span.appendChild(txt);	
							
							var div = document.createElement('div');
							div.className = 'progress';
							
							var div2 = document.createElement('div');
							div2.className = 'progress-bar';
							div2.setAttribute('style', 'width: 0%');
							div.appendChild(div2);
	
							li.appendChild(span);
							li.appendChild(div);
							ul.appendChild(li);	
						}
					}
				} 
			};
		};
		
		function getSlicesCount(blob)
		{
			var slices = Math.ceil(blob.size / BYTES_PER_CHUNK);
			return slices;
		}
	
		function sendRequest(input)
		{
			var blobs = input.files;
			async(blobs, 0, blobs.length);
		}
		
		function async(blobs, i, length)
		{
			if(i>=length)
			{
				form.reset();
				_files_data = [];
				return false;
			}
	
			var index = _files_data[i]['data-start'];
			if(index>0)
				index++;
	
			var start = 0;
			
			for(var j=0;j<index;j++)
			{
				var start = start + BYTES_PER_CHUNK;
				if (start > blobs[i].size)
					start = blobs[i].size;	
			}
	
			uploadFile(blobs[i], index, start, _files_data[i]['data-end'], function()
			{
				i++;
				async(blobs, i, length);
			});
		}
	
		/**
		 * Blob to ArrayBuffer (needed ex. on Android 4.0.4)
		 **/
		var str2ab_blobreader = function(str, callback)
		{
			var blob;
			var BlobBuilder = window.MozBlobBuilder || window.WebKitBlobBuilder || window.BlobBuilder;
			if ( typeof (BlobBuilder) !== 'undefined')
			{
				var bb = new BlobBuilder();
				bb.append(str);
				blob = bb.getBlob();
			}
			else
				blob = new Blob([str]);
	
			var f = new FileReader();
			f.onload = function(e)
			{
				var target = e.target ? e.target : e.srcElement;
				callback(target.result);
			};
			f.readAsArrayBuffer(blob);
		};
	
		/**
		 * Performs actual upload, adjustes progress bars
		 *
		 * @param blob
		 * @param index
		 * @param start
		 * @param end
		 */
		function uploadFile(blob, index, start, slicesTotal, callback)
		{	
			var end = start + BYTES_PER_CHUNK;
			if (end > blob.size)
				end = blob.size;
	
			getChunk(blob, start, end, function(zati)
			{
				// hash md5
				var reader = new FileReader();
				reader.onload = function(e)
				{
					var target = e.target ? e.target : e.srcElement;
	
					var binary = "";
					var bytes = new Uint8Array(target.result);
					var length = bytes.byteLength;
					for (var i = 0; i < length; i++)
						binary += String.fromCharCode(bytes[i]);
	
					var hash = md5(binary);
					binary = undefined;
	
					var xhr = new XMLHttpRequest();
				    xhr.onreadystatechange = function()
				    {
				        if(xhr.readyState == 4)
				        {
				        	var j = JSON.parse(xhr.response);
				        	
				        	if(typeof j['error'] !== undefined && j['error']==='E_HASH')
				        	{
									window.setTimeout(function()
									{
										uploadFile(blob, index, start, slicesTotal, callback);
									}, 100);
				        	}
				        	else
				        	{
					        	var toupload = document.getElementById('toupload');
					        	var lis = toupload.getElementsByTagName('li');
				
					        	for(var i in lis)
					        	{
					        		if(typeof lis[i]!='undefined' && typeof lis[i].getAttribute=='function')
					        		{
										var data_name = lis[i].getAttribute('data-name'); 
						        		if(data_name==j['filename'])
						        		{
						        			var progress_bar = lis[i].getElementsByTagName('div')[1];
						        			progress_bar.style.width = j['percent']+"%";
						        			if(j['percent']==100)
						        			{
						        				progress_bar.removeAttribute('style');
						        				progress_bar.className = 'progress-finished';
						        				
						        				var a = document.createElement('a');
						        				a.setAttribute('href', "uploads/"+lis[i].getAttribute('data-name'));
						        				a.appendChild(document.createTextNode(lis[i].getAttribute('data-name')));
						        				
						        				lis[i].removeAttribute('data-name');
						        				lis[i].removeChild(lis[i].getElementsByTagName('span')[0]);
						        				lis[i].removeChild(lis[i].getElementsByTagName('div')[0]);
						        				lis[i].appendChild(a);
						        				
						        				var completed = document.getElementById('completed');
						        				var ul = completed.getElementsByTagName('ul')[0];
						        				ul.appendChild(lis[i]);	
						        			}
						        		}
					        		}
					        	}
				
								index++;
								if(index<slicesTotal)
								{
									window.setTimeout(function()
									{
										uploadFile(blob, index, end, slicesTotal, callback);	
									}, 100);
								}
								else
									callback();
				        	}
				        }
				    };
	
				    xhr.open("post", "upload.php", true);
				    xhr.setRequestHeader("X-File-Name", blob.name);
					xhr.setRequestHeader("X-Index", index);
					xhr.setRequestHeader("X-Total", slicesTotal);
					xhr.setRequestHeader("X-Hash", hash);		
					xhr.send(zati);
				};
				reader.readAsArrayBuffer(zati);
			});
		}
		
		function getChunk(blob, start, end, callback)
		{
			var chunk;
	
			if (blob.webkitSlice)
				chunk = blob.webkitSlice(start, end);
			else if (blob.mozSlice)
				chunk = blob.mozSlice(start, end);
			else
				chunk = blob.slice(start, end);
	
			// android default browser in version 4.0.4 has webkitSlice instead of slice()
			if (blob.webkitSlice)
			{
				str2ab_blobreader(chunk, function(buf)
				{
					callback(buf);
				});
			}
			else
				callback(chunk);
		}	
	}
	else
	{
		window.onload = function()
		{
			form = document.getElementsByTagName('form')[0];
			var inputs = form.getElementsByTagName('input');
			for(i in inputs)
			{
				if(typeof inputs[i] == 'object')
				{
					if(inputs[i].getAttribute('type')=='file')
					{
						var file_input = inputs[i];
						break;
					}
				}
			}
			
			form.reset();
	
			form.onsubmit = function(e)
			{
				var img = document.createElement('img');
				img.setAttribute('src', 'loading.gif');
				img.setAttribute('alt', 'loading');

				this.appendChild(img);
			};
			
			file_input.onchange = function(e)
			{
				var name = 'File selected';
				
				if(typeof e !== undefined)
				{
					e.preventDefault();
					var target = e.target ? e.target : e.srcElement;
					console.log(target);
					name = target.value || 'File selected';	
				}

                var toupload = document.getElementById('toupload');
                var ul = toupload.getElementsByTagName('ul')[0];
                while(ul.hasChildNodes())
                        ul.removeChild(ul.firstChild);

                var li = document.createElement('li');
                li.appendChild(document.createTextNode(name));

                ul.appendChild(li);
			};
		};
	}
})();