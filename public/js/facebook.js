window.addEventListener("DOMContentLoaded", () => {
    
    let urlparams = new URL(window.location).searchParams
    let post_text = document.querySelector("p").innerHTML;
    let profile_picture = document.querySelector(`img[role="img"]`).src;
    let timestamp = document.querySelector(".timeStampContent").innerText
    let username = document.querySelector(".timeStampContent").parentElement.parentElement.previousSibling.innerText;
    let images = Array.from(document.querySelectorAll("img")).slice(2);
    images = images.map((image) => {return image.parentElement.parentElement});

    let href = urlparams.get('href')
    document.body.innerHTML = `
        <div onclick="window.open('${href}')" class="facebook" style="width: ${urlparams.get('width')};">
            <div class="media">
                <div class="logo-div">
                    <img class="logo" src="${public_folder}/images/facebook.png">
                    <img class="text" src="${public_folder}/images/facebooktitle.svg">
                </div>
                <div style="margin-left: auto; display: flex; align-items: center; color: var(--darkest-color);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                    </svg>
                </div>
            </div>
            <div class="post" >
                <div class="top-bar">
                    <div class="pfp-div">
                        <img src="${profile_picture}">
                    </div>
                    <div class="section">
                        <div class="username">${username}</div>
                        <div class="timestamp">${timestamp}</div>
                    </div>
                </div>
                <div class="post-text">
                    <p>${post_text}</p>
                </div>
                <div class="post-images" style="width: ${parseInt(urlparams.get('width'))-4};">
                    ${
                        images.map((image) => {
                            console.log(image.style.cssText)
                            image.style.display = "inline-block";                          
                            return image.outerHTML
                        }).join("\n")
                    }
                </div>
            </div>
        </div>
    `;
    console.log(images)
})