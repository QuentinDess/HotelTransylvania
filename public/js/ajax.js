let search=document.querySelector(".fa-search")
if(search){
    search.addEventListener("click", () => {

        // Contiendra la valeur nom de la planéte recherché
        
        let city = document.querySelector("input").value;
        // Permet d'aller récupérer des informations provenant d'une ressource externe :
        fetch(`http://api.weatherstack.com/current?access_key=d8604f60fb0f6c4cac37ca3453d12113&query=${city}`)
        
        // Quand la requête fetch() est terminée, on stocke son contenu dans la variable response
        .then((response) => {
            response.json()
            .then((data) => {
                let card= document.querySelector(".api")
                if(card){
                card.innerHTML = "";
                
                }
               
                console.log(data);
                // Création de la <table> en HTML
                
                let divCard = document.createElement("div");
                divCard.setAttribute("class", "card");
                
                //on le met en haut du main avant le paragraphe 
                document.querySelector(".api").appendChild(divCard);
                //je crée la premiere partie de ma card
                let divCardFooter1= document.createElement("div");
                divCardFooter1.setAttribute("class","card-footer");
                divCard.appendChild(divCardFooter1);
                let divImg=document.createElement("div");
                divCardFooter1.appendChild(divImg);
                let Img=document.createElement("img");
                Img.setAttribute("src", data.current.weather_icons[0]);
                divImg.appendChild(Img);
                let divWeather=document.createElement("div");
                divWeather.innerHTML= data.current.weather_descriptions[0];
                divCardFooter1.appendChild(divWeather);
                //je crée la deuxieme partie de ma card
                let divCardBody=document.createElement("div");
                divCardBody.setAttribute("class","card-body");
                divCard.appendChild(divCardBody);
                let divCardText=document.createElement("div");
                divCardText.setAttribute("class","card-text");
                divCardBody.appendChild(divCardText);
                let strong= document.createElement("strong");
                strong.innerHTML= "Lieu: "+data.location.name +"</br> Pays: "+data.location.country+"</br> Heure Locale: "+data.location.localtime;
                divCardText.appendChild(strong);
                let pInfo=document.createElement("p");
                pInfo.innerHTML="Information :";
                divCardText.appendChild(pInfo);
                let ulInfo= document.createElement("ul");
                divCardText.appendChild(ulInfo);
                let liTemp=document.createElement("li");
                let liUv=document.createElement("li");
                let liRain=document.createElement("li");
                liTemp.innerHTML="Température: "+data.current.temperature+"°";
                liUv.innerHTML="Indice UV: "+data.current.uv_index;
                liRain.innerHTML="Précipitation: "+data.current.precip+"mm";
                ulInfo.appendChild(liTemp);
                ulInfo.appendChild(liUv);
                ulInfo.appendChild(liRain);

               
                
        })
        })
    })
}

