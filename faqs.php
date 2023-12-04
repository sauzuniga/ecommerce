<?php
    
    $conn = new PDO("mysql:host=localhost;dbname=sistema_ecommerce", "root", "");
    
    $sql = "SELECT * FROM faqs";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $faqs = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>FAQS</title>
    <script src="js/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css" />
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="col-md-12 accordion_one">
            <div class="panel-group" id="accordion_oneLeft">
                <?php foreach ($faqs as $faq): ?>
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-bs-toggle="collapse" href="#faq-<?php echo $faq['id']; ?>" aria-expanded="false" class="collapsed">
                                    <?php echo $faq['Pregunta']; ?>
                                </a>
                            </h4>
                        </div>
                       
                        <div id="faq-<?php echo $faq['id']; ?>" class="panel-collapse collapse" aria-expanded="false" role="tabpanel">
                            <div class="panel-body">
                                <div class="text-accordion">
                                    <?php echo $faq['Respuesta']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<style>
    .accordion_one .panel-group {
    border: 1px solid #f1f1f1;
    margin-top: 100px
}
a:link {
    text-decoration: none
}
.accordion_one .panel {
    background-color: transparent;
    box-shadow: none;
    border-bottom: 0px solid transparent;
    border-radius: 0;
    margin: 0
}
.accordion_one .panel-default {
    border: 0
}
.accordion-wrap .panel-heading {
    padding: 0px;
    border-radius: 0px
}
h4 {
    font-size: 18px;
    line-height: 24px
}
.accordion_one .panel .panel-heading a.collapsed {
    color: #999999;
    display: block;
    padding: 12px 30px;
    border-top: 0px
}
.accordion_one .panel .panel-heading a {
    display: block;
    padding: 12px 30px;
    background: #fff;
    color: #313131;
    border-bottom: 1px solid #f1f1f1
}
.accordion-wrap .panel .panel-heading a {
    font-size: 14px
}
.accordion_one .panel-group .panel-heading+.panel-collapse>.panel-body {
    border-top: 0;
    padding-top: 0;
    padding: 25px 30px 30px 35px;
    background: #fff;
    color: #999999
}
.img-accordion {
    width: 81px;
    float: left;
    margin-right: 15px;
    display: block
}
.accordion_one .panel .panel-heading a.collapsed:after {
    content: "\2b";
    color: #999999;
    background: #f1f1f1
}
.accordion_one .panel .panel-heading a:after,
.accordion_one .panel .panel-heading a.collapsed:after {
    font-family: 'FontAwesome';
    font-size: 15px;
    width: 36px;
    line-height: 48px;
    text-align: center;
    background: #F1F1F1;
    float: left;
    margin-left: -31px;
    margin-top: -12px;
    margin-right: 15px
}
.accordion_one .panel .panel-heading a:after {
    content: "\2212"
}
.accordion_one .panel .panel-heading a:after,
.accordion_one .panel .panel-heading a.collapsed:after {
    font-family: 'FontAwesome';
    font-size: 15px;
    width: 36px;
    height: 48px;
    line-height: 48px;
    text-align: center;
    background: #F1F1F1;
    float: left;
    margin-left: -31px;
    margin-top: -12px;
    margin-right: 15px
}
</style>
</body>
</html>