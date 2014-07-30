;(function($){var $preload=$.preload=function(original,settings){if(original.split)
original=$(original);settings=$.extend({},$preload.defaults,settings);var sources=$.map(original,function(source){if(!source)
return;if(source.split)
return settings.base+source+settings.ext;var url=source.src||source.href;if(typeof settings.placeholder=='string'&&source.src)
source.src=settings.placeholder;if(url&&settings.find)
url=url.replace(settings.find,settings.replace);return url||null;});var data={loaded:0,failed:0,next:0,done:0,total:sources.length};if(!data.total)
return finish();var imgs=$(Array(settings.threshold+1).join('<img/>')).load(handler).error(handler).bind('abort',handler).each(fetch);function handler(e){data.element=this;data.found=e.type=='load';data.image=this.src;data.index=this.index;var orig=data.original=original[this.index];data[data.found?'loaded':'failed']++;data.done++;if(settings.enforceCache)
$preload.cache.push($('<img/>').attr('src',data.image)[0]);if(settings.placeholder&&orig.src)
orig.src=data.found?data.image:settings.notFound||orig.src;if(settings.onComplete)
settings.onComplete(data);if(data.done<data.total)
fetch(0,this);else{if(imgs&&imgs.unbind)
imgs.unbind('load').unbind('error').unbind('abort');imgs=null;finish();}};function fetch(i,img,retry){if(img.attachEvent&&data.next&&data.next%$preload.gap==0&&!retry){setTimeout(function(){fetch(i,img,true);},0);return false;}
if(data.next==data.total)return false;img.index=data.next;img.src=sources[data.next++];if(settings.onRequest){data.index=img.index;data.element=img;data.image=img.src;data.original=original[data.next-1];settings.onRequest(data);}};function finish(){if(settings.onFinish)
settings.onFinish(data);};};$preload.gap=14;$preload.cache=[];$preload.defaults={threshold:2,base:'',ext:'',replace:''};$.fn.preload=function(settings){$preload(this,settings);return this;};})(jQuery);