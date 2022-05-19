import "tw-elements";
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

if (window.location.pathname.includes("/dashboard/collections/") && window.location.pathname.includes("/albums/")) {
    console.log("Loading photo preview plugin...");

    global.img_preview = (url) => {
        if (url != undefined) {
            console.log("Displaying picture");
            // Show hover thing
            console.log(hover_img);

            // let hover_img = new Image();
            let hover_img = document.createElement('img');
            if (document.getElementById('hover_img') !== null) {
              hover_img = document.getElementById('hover_img');
            }
            hover_img.id = "hover_img";

            hover_img.src = `/thumbnail/${url}`;
            hover_img.style.position = "fixed";

            const e = window.event;
            const posX = e.clientX;
            const posY = e.clientY;

            console.log(posX, posY);

            hover_img.style.left = posX+50 + 'px';
            hover_img.style.top = posY-50 + 'px';

            hover_img.style.maxWidth = '50%';

            hover_img.style.border = 'black 2px solid';
            hover_img.style.borderRadius = '10px';

            console.log(hover_img);
            document.getElementsByTagName("body")[0].appendChild(hover_img);

        } else {
            console.log("Hiding picture");
            // Remove hover thing
            const hover_img = document.getElementById("hover_img");
            hover_img.outerHTML = "";
        }
    };

    console.log('Photo preview plugin loaded!');
}
