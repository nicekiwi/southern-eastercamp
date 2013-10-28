var mySound = "";

 createjs.Sound.addEventListener("fileload", createjs.proxy(this.loadHandler, this));
 createjs.Sound.registerSound("/sounds/tng_engine_1.wav", "sound");
 function loadHandler(event) {
     // This is fired for each sound that is registered.
     var instance = createjs.Sound.play("sound", {loop: -1});  // play using id.  Could also use full sourcepath or event.src.
     instance.addEventListener("complete", createjs.proxy(this.handleComplete, this));
     instance.volume = 0.5;
 }
