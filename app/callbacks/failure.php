
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container">
  <div class="ui middle aligned center aligned grid">
    <div class="ui eight wide column">

      <form class="ui large form">

          <div class="ui icon negative message">
            <i class="warning icon"></i>
            <div class="content">
              <div class="header">
                Oops! Lo sentimos el pago no pudo ser procesado
              </div>
              <ul>
                <li>Payment Type: <?php echo $_GET['payment_type'] ?></li>

                 <li> Payment ID: <?php echo $_GET['payment_id'] ?></li>


               <li> External reference: <?php echo $_GET['external_reference'] ?> </li>
              </ul>
            </div>

         </div>

          <span class="ui large teal submit fluid button">Try again</span>

      </form>
    </div>
  </div>
</div>
<style media="screen">
@import url(https://fonts.googleapis.com/css?family=Raleway:400,700,600);
.container{
padding: 20px;
}
body{
background-color: #f6f4f4;
font-family: 'Raleway', sans-serif;
}
.teal{
background-color: #ffc952 !important;
color: #444444 !important;
}
a{
color: #47b8e0 !important;
}
.message{
text-align: left;
}
.price1{
font-size: 40px;
font-weight: 200;
display: block;
text-align: center;
}
.ui.message p {margin: 5px;}
</style>
