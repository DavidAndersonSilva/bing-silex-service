Consume Bing Images API to the bing.com


```
use Bing\Factories\BingImageServiceFactory;


$appID = "1234567890"; // Your Bing App ID
$service = BingImageServiceFactory::create($appID);

$query = "Symfony";
$response = $service->getResponse($query);

echo $response->getBody();
```
