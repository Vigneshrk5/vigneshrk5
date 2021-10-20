
<?php


if(isset($_GET['campaignId'])) {
    $campaignId = $_GET['campaignId'];

    include 'includes/dbh.inc.php';

    $sql = "SELECT *,DATE(DATE_ADD(campaign_reg_date, INTERVAL campaign_days DAY)) AS endDate,
    DATE(campaign_reg_date) AS startDate
    FROM campaigns WHERE campaign_id = $campaignId;";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result); 
        $campaignName = $row['campaign_name'];
        $campaignAge = $row['campaign_age'];
        $campaignType = $row['campaign_type'];
        $campaignStartDate = $row['startDate'];
        $campaignEndDate = $row['endDate'];
        $campaignAmount = $row['campaign_amount'];
        $campaignDescription = $row['campaign_description'];
        $campaignPhone = $row['campaignPhone'];
        $campaignImage = $row['campaignImage']; 
    }
}

if(isset($_POST["pay"])) {
    $amount = $_POST['amount'];


include 'src/Instamojo.php';
$api = new Instamojo\Instamojo('test_9a050fea6e8a8d4cf7e47038daf', 'test_3dd93176d417c8b70a6818bb11b', 'https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" =>   $campaignName ,
            "amount" =>  $amount,
            "name" =>  $campaignName,
            "allow_repeated_payments" =>  false,
            "redirect_url" => "http://localhost/helphands/thankyou.php",
            //"webhook" => "http://localhost/helphands/webhook.php"
            ));
        //print_r($response);
        $pay_url=$response['longurl'];
        header("location:$pay_url");
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
?>