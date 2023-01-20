// var deletebtn=document.querySelector('.id');
// deletebtn.addEventListener('click',function(){
// });

let tbody=document.getElementById('tbody');
tbody.addEventListener("click",function(e){
    console.log(e.target);
    let deletebtn=e.target;
    if(deletebtn.innerText=="Delete")
    {
        let message=confirm('Are you sure to delete');
        console.log(message);
        if(message)
        {         
            let id=deletebtn.parentNode.getAttribute('id');
            // console.log("hello");
            console.log(id)
            $.ajax(
                {
                    url:'delete_category.php',
                    type:'post',
                    data:{id:id},
                    success:function(response){
                        console.log(response);
                        // if(response=="fail")
                        // {
                        //     console.log(response);
                        //     alert("You can't delete this data");
                        // }
                        
                    },
                    error:function(){
    
                    }
                }
            )
        }
    } 
})





// let deletebtn=document.querySelector('.delete');
// deletebtn.addEventListener('click',function(){
//     message=confirm("Are you sure to delete...");
//     if(message)
//     {
//         let id=$(this).parent('td').attr('id');
//       $.ajax(
//         {
//         type:"post",
//         url:"delete_category.php",
//         data:{id:id},
//         success:function(response)
//         {
//             console.log(response);
//         },
//         error:function()
//         {
//             console.log("error");
//         }
//       })
//     }
// })



























































// $(document).ready(function(){
//     $('.delete').click(function(){
//         let message=confirm('Are you sure to delete');
//         if(message)
//         {
//             let id=$(this).parent('td').attr('id')
//             console.log(id);
//             $.ajax(
//                 {
//                     url:'delete_category.php',
//                     type:'post',
//                     data:{id:id},
//                     success:function(response){
//                         console.log(response)
//                         if(response)
//                         {
//                             console.log(response);
//                             // alert("You can't delete this data");
//                         }
//                         else
//                         {
//                             console.log('hello')
//                         }
                        
//                     },
//                     error:function(){
    
//                     }
//                 }
//             )     
//         }
//     })
// })