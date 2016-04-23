##Amazon Product Advertising API




#####To start with and most importantly, store this pair of unique keys in a secured place.




#####Now, click and go to [Product Advertising API Scratchpad](http://webservices.amazon.com/scratchpad/index.html)


1. Leave marketplace as it is.
2. For assosiate tag, enter "test09cf-20"- the unique asscosiate tag I got when I register for Amazaon associate, see [Becoming an Associate](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/becomingAssociate.html)

3. Enter the above Access Key ID and Serect Access Key in the the corresponding field.


Here is a simple Itemsearch example, afterwards we are also able to *[Create a Shopping Cart](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/ImplementingaShoppingCart.html)*. Note that the generated search results could be in XML or HTML forms.


#####Sample PHP request:

<?php

// Your AWS Access Key ID, as taken from the AWS Your Account page
$aws_access_key_id = "****************";

// Your AWS Secret Key corresponding to the above ID, as taken from the AWS Your Account page
$aws_secret_key = "*********************************";

// The region you are interested in
$endpoint = "webservices.amazon.com";

$uri = "/onca/xml";

$params = array(
    "Service" => "AWSECommerceService",
    "Operation" => "ItemSearch",
    "AWSAccessKeyId" => "********************",
    "AssociateTag" => "*********",
    "SearchIndex" => "Beauty",
    "Keywords" => "ROUGE DIOR",
    "ResponseGroup" => "Images,ItemAttributes,Offers",
    "Sort" => "salesrank"
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


#####Sample XML response(too much matching results, didn't show all):
<?xml version="1.0" ?>
<ItemSearchResponse
    xmlns="http://webservices.amazon.com/AWSECommerceService/2011-08-01">
    <OperationRequest>
        <HTTPHeaders>
            <Header Name="UserAgent" Value="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36"></Header>
        </HTTPHeaders>
        <RequestId>6178b64f-6651-4a68-ac4c-62801f9e1b35</RequestId>
        <Arguments>
            <Argument Name="AWSAccessKeyId" Value="**************************"></Argument>
            <Argument Name="AssociateTag" Value="**********"></Argument>
            <Argument Name="Keywords" Value="ROUGE DIOR"></Argument>
            <Argument Name="Operation" Value="ItemSearch"></Argument>
            <Argument Name="ResponseGroup" Value="Images,ItemAttributes,Offers"></Argument>
            <Argument Name="SearchIndex" Value="Beauty"></Argument>
            <Argument Name="Service" Value="AWSECommerceService"></Argument>
            <Argument Name="Sort" Value="salesrank"></Argument>
            <Argument Name="Timestamp" Value="2016-03-22T04:50:34.000Z"></Argument>
            <Argument Name="Signature" Value="H/UzJWue7AI28R9fz+2gRJOabzUuuripQDke8O/FtbI="></Argument>
        </Arguments>
        <RequestProcessingTime>0.3062450000000000</RequestProcessingTime>
    </OperationRequest>
    <Items>
        <Request>
            <IsValid>True</IsValid>
            <ItemSearchRequest>
                <Keywords>ROUGE DIOR</Keywords>
                <ResponseGroup>Images</ResponseGroup>
                <ResponseGroup>ItemAttributes</ResponseGroup>
                <ResponseGroup>Offers</ResponseGroup>
                <SearchIndex>Beauty</SearchIndex>
                <Sort>salesrank</Sort>
            </ItemSearchRequest>
        </Request>
        <TotalResults>347</TotalResults>
        <TotalPages>35</TotalPages>
        <MoreSearchResultsUrl>http://www.amazon.com/gp/redirect.html?linkCode=xm2&SubscriptionId=AKIAJCHNZCKSDMAG6IZA&location=http%3A%2F%2Fwww.amazon.com%2Fgp%2Fsearch%3Fkeywords%3DROUGE%2BDIOR%26url%3Dsearch-alias%253Dbeauty&tag=test09cf-20&creative=386001&camp=2025</MoreSearchResultsUrl>
        <Item>
            <ASIN>B00LLMB3W0</ASIN>
            <DetailPageURL>http://www.amazon.com/Fiber-Lash-Mascara-Lengthening-Sensational/dp/B00LLMB3W0%3FSubscriptionId%3DAKIAJCHNZCKSDMAG6IZA%26tag%3Dtest09cf-20%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00LLMB3W0</DetailPageURL>
            <ItemLinks>
                <ItemLink>
                    <Description>Technical Details</Description>
                    <URL>http://www.amazon.com/Fiber-Lash-Mascara-Lengthening-Sensational/dp/tech-data/B00LLMB3W0%3FSubscriptionId%3DAKIAJCHNZCKSDMAG6IZA%26tag%3Dtest09cf-20%26linkCode%3Dxm2%26camp%3D2025%26creative%3D386001%26creativeASIN%3DB00LLMB3W0</URL>
                </ItemLink>
                <ItemLink>







