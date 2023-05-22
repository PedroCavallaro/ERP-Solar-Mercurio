const info: NodeListOf<HTMLInputElement> = document.querySelectorAll(".info"),
 sendInfo: HTMLInputElement | null = document.querySelector("#sendInfo")
//cep
info[5].addEventListener('blur', async ()=>{
    try{
        const response =  await fetch(`https://viacep.com.br/ws/${info[5].value}/json/`)
                                         .then((res) => res.json())

         for(const key in response){
            if(document.getElementById(`${key}`)){
     
                 let fields:any = document.getElementById(`${key}`) 
                 fields.value = response[key]
             }
         }
    }catch{

    }
})
sendInfo?.addEventListener('click', (button)=>{
    console.log('oiasodi')
    info.forEach((e)=>{
        if(e.value === ""){
            console.log("oioi")
            button.preventDefault()
        }
    })


})






