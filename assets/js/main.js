let sendReq = ()=>{
    const catName = document.getElementById("newCategory").value;
    const categoriesList = document.getElementById("productCategory");
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let catInfo= this.responseText.split("-");

        let option = document.createElement("option");
        let optionText = document.createTextNode(catInfo[1]);
        option.appendChild(optionText);
        option.value=catInfo[0];
        categoriesList.appendChild(option);
        
      }
    };
    if(catName.length > 0)
    {
    xmlhttp.open("GET", "../../core/addCtegory.php?cat=" + catName, true);
    xmlhttp.send();
    }
}

var x = document.getElementById("edit");
if(x)
{
    x.style.display = "none";
}
        

let displayEdit=(id)=>{
        var productName = document.getElementById("nameEditInput").value;
        var productPrice = document.getElementById("priceEditInput").value;
        var productStatus = document.getElementById("avaEditInput").value;
        
        // var productImage = document.getElementById("imageEditInput").value;

        

        const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var productInfo= this.responseText.split("**");
        document.getElementById("nameEditInput").value=productInfo[0];
        document.getElementById("priceEditInput").value=productInfo[1];
        document.getElementById("avaEditInput").value=productInfo[3];
        document.getElementById("productId").value=productInfo[4];
        }
      };
      if(true)
      {
      xmlhttp.open("GET", "../../core/editProductForm.php?productId=" + id, true);
      xmlhttp.send();
      }
        if (x.style.display === "none") {
          x.style.display = "block";
          alert(productInfo[1]);
          
        } else {
          //add image name length too
          if(productName.length > 0 || productPrice.length > 0 )
          {
            productName=productInfo[1];
          }else{
            x.style.display = "none";
          }
          
        }
      
}


let displayEdit2=(id)=>{
  var userName = document.getElementById("nameEditInput").value;
  var roomNo = document.getElementById("roomEditInput").value;
  var ext = document.getElementById("extEditInput").value;
  
  // var productImage = document.getElementById("imageEditInput").value;

  

  const xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
  var userInfo= this.responseText.split("**");
  document.getElementById("nameEditInput").value=userInfo[0];
  document.getElementById("roomEditInput").value=userInfo[1];
  document.getElementById("extEditInput").value=userInfo[2];
  document.getElementById("userId").value=userInfo[3];
  console.log(userInfo[3]);
  }
};
if(true)
{
xmlhttp.open("GET", "../../core/editUserForm.php?userId=" + id, true);
xmlhttp.send();
}
  if (x.style.display === "none") {
    x.style.display = "block";
    alert(userInfo[1]);
    
  } else {
    //add image name length too
    if(userName.length > 0 || roomNo.length >0 || ext.length>0 )
    {
      userName=userInfo[1];
    }else{
      x.style.display = "none";
    }
    
  }

}

let deleteRow=()=>{
  $('table').on('click',$(this), function(e){
    $(this).closest('tr').remove()
 })
}

const getMyOrders = function(){
  $.ajax({
    url: "../../App/controller/myOrders.php",
    type: "GET",
    // sent data object to server
    data:orders,
    success: function (orders) {
//            alert(data);
        // $(".order_products_table").append(data);
        $(".table-responsive").append(orders);
    }
});
};
const getNewOrders = function(){
  $.ajax({
    url: "../../App/controller/checks.php",
    type: "GET",
    // sent data object to server
    data:orders,
    success: function (orders) {
//            alert(data);
        // $(".order_products_table").append(data);
        // $(".table-responsive").append(orders);
    }
});
};

const checks = function(id,name){
    $.ajax({
        url: "./checks.php?id= " + id + "&name=" + name,
        type: "GET",
        // sent data object to server
        data: product
    });

}
