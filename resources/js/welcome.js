window.onload = function() {
  if (window.location.pathname == '/') {
    console.log('Loading welcome page script...');
  
    const body = document.getElementsByTagName('body')[0];
  
    const photos = [
      'img/welcome-background-0.jpg',
      'img/welcome-background-1.jpg',
      'img/welcome-background-2.jpg',
      'img/welcome-background-3.jpg',
      'img/welcome-background-4.jpg',
      'img/welcome-background-5.jpg',
      'img/welcome-background-6.jpg',
      'img/welcome-background-7.jpg',
    ];
  
    global.currentImageIndex = 0;
    global.imageSlideshowActive = true;
  
    const interval = setInterval(function() {
      changeBackgroundImage();
    }, 5000);

    global.changeBackgroundImage = () => {
      try {
        if (!imageSlideshowActive) return;
        currentImageIndex++;
    
        if (currentImageIndex > photos.length-1) currentImageIndex = 0;
        
        const img = new Image;
        img.src = photos[currentImageIndex];

        img.onload = function() {
          body.style.backgroundImage = `url(${this.src})`;
        }

        console.log(`Changing background to: ${photos[currentImageIndex]}`);
      } catch (error) {
        console.error(`Failed changing background to: ${photos[currentImageIndex]}`);
        console.error(error);
      }
    }
  }
}