
<?php

// Your AWS Access Key ID, as taken from the AWS Your Account page
$aws_access_key_id = "AKIAIE6IQV4GMYXOKF3A";

// Your AWS Secret Key corresponding to the above ID, as taken from the AWS Your Account page
$aws_secret_key = "Ow35CltLJsQDIkMMo0rID/hYD2Fi/kLgswJSsdy/";

// The region you are interested in
$endpoint = "webservices.amazon.com";

$uri = "/onca/xml";

$params = array(
    "Service" => "AWSECommerceService",
    "Operation" => "ItemLookup",
    "AWSAccessKeyId" => "AKIAIE6IQV4GMYXOKF3A",
    "AssociateTag" => "lq03-20",
    "ItemId" => "B0002DNHR8",
    "IdType" => "ASIN",
    "ResponseGroup" => "Images,ItemAttributes,Offers"
);

// Set current timestamp if not set
if (!isset($params["Timestamp"])) {
    $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
}

// Sort the parameters by key
ksort($params);

$pairs = array();

foreach ($params as $key => $value) {
    array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
}

// Generate the canonical query
$canonical_query_string = join("&", $pairs);

// Generate the string to be signed
$string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

// Generate the signature required by the Product Advertising API
$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $aws_secret_key, true));

// Generate the signed URL
$request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

echo "Signed URL: \"".$request_url."\"";

?>