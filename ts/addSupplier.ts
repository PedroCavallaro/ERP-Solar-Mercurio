const info: NodeListOf<HTMLInputElement> = document.querySelectorAll(".info"),
sendInfo: HTMLInputElement | null = document.querySelector("#sendInfo"),
formSupplier: HTMLFormElement | null = document.querySelector("#formSupplier") 
 //cep
//@ts-ignore
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
})


info[5].addEventListener('blur', async ()=>{
    try{
        console.log(formSupplier)
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

formSupplier?.addEventListener('submit', (e)=>{
    info.forEach((ele)=>{
        if(ele.value === ""){
            e.preventDefault()
            Toast.fire({
                icon: 'error',
                title: 'Preencha os campos necessários'
              })
        }
    })
})






