<?php


$utr = '309719884305';//309719884305  the UTR you want to search for
$amount = 100; // the amount you want to search for
?>
<!DOCTYPE html>
<html>
<head>
  <title>Verify Transaction</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    const url = 'https://payments-tesseract.bharatpe.in/api/v1/merchant/transactions';

    const params = {
      'module': 'PAYMENT_QR',
      'merchantId': '8933067', // your merchant key
      'sDate': '1678300200000',
      'eDate': '1680836479000'
    };

    const headers = {
      'accept': 'application/json, text/javascript, */*; q=0.01',
      'accept-encoding': 'gzip, deflate, br',
      'accept-language': 'en-US,en;q=0.9,it;q=0.8',
      'sec-fetch-mode': 'cors',
      'sec-fetch-site': 'same-site',
      'token': '538acbee42a44bd5a578cae8fa954fc6', // your login token 
      'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.63'
    };

    const queryString = new URLSearchParams(params).toString();
    const url2 = url + '?' + queryString;

    async function getData() {
      try {
        const response = await fetch(url2, { headers });
        const data = await response.json();
        return data;
      } catch (error) {
        console.error(error);
      }
    }

    const utr = '<?php echo $utr; ?>'; // the UTR you want to search for, passed from PHP
    const amount = <?php echo $amount; ?>; // the amount you want to search for, passed from PHP

    getData().then((data) => {
      console.log(data.data.transactions);
      const transaction = data.data.transactions.find((t) => t.bankReferenceNo === utr && t.amount === amount);
      if (transaction) {
        console.log('Transaction found:', transaction);
        document.getElementById("result").innerHTML = `Transaction Found: ${JSON.stringify(transaction)}`;
      } else {
        console.log('No matching transaction found.',utr);
        document.getElementById("result").innerHTML = "No matching transaction found.";
      }
    });
  </script>
</head>
<body>
  <h1>Verify Transaction</h1>
  <div id="result"></div>
</body>
</html>
