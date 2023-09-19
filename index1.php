
<!-- <button id="rzp-button1">pay</button> -->

<?php 
include("connection.php");
$amount=200;
$email=$_GET['email'];
$contact = $_GET['contact'];
$price=$_GET['price'];
$query=" select * from registration where email='".$email."'";
// $query1=" select * from prices_table where c_id='".$cid."'";
// $result1= $con ->query($query1);
// if($result1->num_rows >0){
//     $row1= $result1->fetch_assoc();
//     $prices=$row1['prices'];
//     echo $prices;
// }
$result = $con->query($query);
if ($result->num_rows > 0){ 
    $row = $result->fetch_assoc();
    $name=$row['name'];
}
?>
<script>
window.onload = function() {
    rzp1.open();
    e.preventDefault();
};
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var amoun=parseInt( "<?php echo $price ; ?>");
    var contact = "<?php echo $contact; ?>";
    var name= "<?php echo $name; ?>";
    var email = "<?php echo $email; ?>";
var options = {
    "key": "rzp_test_qe3wTUlGlJslMp", // Enter the Key ID generated from the Dashboard
    "amount": amoun*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Farmers Site",
    "description": "Test Transaction",
    "image": "images/logo.jpeg",

    "handler": function (response){
        window.location="lastpage.html";
        // alert(response.razorpay_payment_id);

        // alert("Payment Success")    
    },

    "prefill": {
      "name": name,
     "email": email,
       "contact": contact
   },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick= function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
