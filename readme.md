# M2 AbuseIPDB API Integration

**Url:** https://github.com/df2k2/magento2-abuse-api

**Author:** Chris Snedaker

**Date:** 2020-06-17


------

## **CURRENTLY BEING DEVELOPED**


 

## Objective

**Create a Magento2 integration to AbuseIPDB API**
 
**Website:** https://www.abuseipdb.com/

**Documentation URL:** https://docs.abuseipdb.com/

Unfortunately, too many bots and bad actors are out to take advantage of security flaws. 

## Purpose

**The initial integration will use two different endpoints for:**

* Check IPs
* Report IPs 


**Check IPs** (https://docs.abuseipdb.com/#check-endpoint)

Use the abuse ip database API to check IPs that seem to be up to no good and take an action based on response to checked IP

Example: https://www.abuseipdb.com/check/115.84.92.92

Below is a chart of problematic IPs attempting to hack/DoS a production magento website in a single day.

```
ipAddress       countryCode isp                                        domain              abuseConfidenceScore totalReports
---------       ----------- ---                                        ------              -------------------- ------------
115.84.92.92    LA          Telecommunication Service                  newworldtelecom.net                  100           93
34.87.251.211   US          Google LLC                                 google.com                           100           19
66.70.157.189   CA          Kazooisyee                                 ip-66-70-157.net                      51            9
144.217.171.225 CA          Kazooisyee                                 ip-144-217-171.net                    48            9
14.178.144.104  VN          Vietnam Posts and Telecommunications Group vnpt.com.vn                           46            7
167.114.90.33   CA          Kazooisyee                                 ip-167-114-90.net                     44           11
188.191.22.226  UA          CrimeaCom South LLC                        crimea-com.net                        42           17
198.27.124.169  CA          Kazooisyee                                 ip-198-27-124.net                     35           11
144.217.99.65   CA          Kazooisyee                                 ip-144-217-99.net                     34            8
144.217.171.229 CA          Kazooisyee                                 ip-144-217-171.net                    34            7
216.244.66.197  US          Wowrack.com                                wowrack.com                           32          120
66.249.68.25    US          Google LLC                                 google.com                            22           12
47.244.217.16   HK          Alibaba.com LLC                            alibaba.com                           21            3
```

**Report IPs** (https://docs.abuseipdb.com/#report-endpoint)

NOT YET IMPLEMENTED

Report problematic IPs to the abuse IP database


## Installation


Install as composer package -- instructions to come.


**Step 1.** Enable Module

`php bin/magento module:enable Cs_AbuseApi`

**Step 2.** Magento setup:upgrade

`php bin/magento setup:upgrade`

**Step 3.** Clear cache and compile DI

`php bin magento setup:di:compile && php bin/magento cache:flush`


**Step 4.** Update Admin Configuration settings

Update configuration settings in admin: **Stores > Configuration > Abuse Api Db** 

* Enable module

* Register For API Key and copy API Key into configuration field  

https://www.abuseipdb.com/register






### API Key

https://www.abuseipdb.com/register

Register for API Key.




----

## Usage Example


```php

<?php

use Cs\AbuseApi\Model\ServiceClient;

//....

class Testclass 
{
    private $serviceClient;
    
    //...

    public function __construct(
        ServiceClient $serviceClient
    ) {
        $this->serviceClient = $serviceClient;
    }

    
    public function testIpCheck($ip) 
    {
        return $this->serviceClient->checkIp($ip);
    }    
    
    public function testIpsCheck($ips)
    {
        $collection = $this->serviceClient->checkIps([
                '34.87.251.211',
                '66.70.157.189',
                '144.217.171.225',
                '14.178.144.104',
                '167.114.90.33',
                '188.191.22.226',
                '198.27.124.169'
            ],90);

        return $collection;
    }
    
}

```

## Example Output

```
object(Cs\AbuseApi\Model\Client\CheckResponse)[416]
  protected '_data' => 
    array (size=13)
      'ipAddress' => string '115.84.92.92' (length=12)
      'isPublic' => boolean true
      'ipVersion' => int 4
      'isWhitelisted' => boolean false
      'abuseConfidenceScore' => int 100
      'countryCode' => string 'LA' (length=2)
      'usageType' => null
      'isp' => string 'Telecommunication Service' (length=25)
      'domain' => string 'newworldtelecom.net' (length=19)
      'hostnames' => 
        array (size=0)
          empty
      'totalReports' => int 41
      'numDistinctUsers' => int 12
      'lastReportedAt' => string '2020-09-14T17:23:53+00:00' (length=25)

```


---------

## API Key

https://www.abuseipdb.com/register

account/api


## Developer Notes:

**Configuration Fields**

Base URI => 'base_uri'
API Key => 'api_key'
Max Days => 'max_days'


### Client and HEADERS

```php
<?php
$client = new GuzzleHttp\Client([
  'base_uri' => 'https://api.abuseipdb.com/api/v2/'
]);
```


```
    'headers' => [
        'Accept' => 'application/json',
        'Key' => $YOUR_API_KEY
  ],
```




### CHECK Endpoint

**Check Parameters**

| field        | required | default | min | max |
| ----         | ----     | ----    | --- | --- |
| ipAddress    | yes      |         |     |     |
| maxAgeInDays | no       | 30      | 1   | 365 |
| verbose      | no       |         |     |     |

$response = $client->request('GET', 'check', [
    'query' => [
        'ipAddress' => '118.25.6.39',
        'maxAgeInDays' => '90',
    ],




### Request Example

```php
<?php
$client = new GuzzleHttp\Client([
  'base_uri' => 'https://api.abuseipdb.com/api/v2/'
]);

$response = $client->request('GET', 'check', [
    'query' => [
        'ipAddress' => '118.25.6.39',
        'maxAgeInDays' => '90',
    ],
    'headers' => [
        'Accept' => 'application/json',
        'Key' => $YOUR_API_KEY
  ],
]);

$output = $response->getBody();
// Store response as a PHP object.
$ipDetails = json_decode($output, true);
?>

```


### Response Example


```json
{
    "data": {
      "ipAddress": "118.25.6.39",
      "isPublic": true,
      "ipVersion": 4,
      "isWhitelisted": false,
      "abuseConfidenceScore": 100,
      "countryCode": "CN",
      "countryName": "China",
      "usageType": "Data Center/Web Hosting/Transit",
      "isp": "Tencent Cloud Computing (Beijing) Co. Ltd",
      "domain": "tencent.com",
      "hostnames": [],
      "totalReports": 1,
      "numDistinctUsers": 1,
      "lastReportedAt": "2018-12-20T20:55:14+00:00",
      "reports": [
        {
          "reportedAt": "2018-12-20T20:55:14+00:00",
          "comment": "Dec 20 20:55:14 srv206 sshd[13937]: Invalid user oracle from 118.25.6.39",
          "categories": [
            18,
            22
          ],
          "reporterId": 1,
          "reporterCountryCode": "US",
          "reporterCountryName": "United States"
        }
      ]
    }
  }
```  

### Categories

| ID | Title           | Description                                                                                                                                                                                                                     |
|--- | -----           | -------                                                                                                                                                                                                                                |
| 1  | DNS Compromise  | Altering DNS records resulting in improper redirection.                                                                                                                                                                         |
| 2  | DNS Poisoning   | Falsifying domain server cache (cache poisoning).                                                                                                                                                                               |
| 3  | Fraud Orders    | Fraudulent orders.                                                                                                                                                                                                              |
| 4  | DDoS Attack     | Participating in distributed denial-of-service (usually part of botnet).                                                                                                                                                        |
| 5  | FTP Brute-Force |                                                                                                                                                                                                                                 |
| 6  | Ping of Death   | Oversized IP packet.                                                                                                                                                                                                            |
| 7  | Phishing        | Phishing websites and/or email.                                                                                                                                                                                                 |
| 8  | Fraud VoIP      |                                                                                                                                                                                                                                 |
| 9  | Open Proxy      | Open proxy, open relay, or Tor exit node.                                                                                                                                                                                       |
| 10 | Web Spam        | Comment/forum spam, HTTP referer spam, or other CMS spam.                                                                                                                                                                       |
| 11 | Email Spam      | Spam email content, infected attachments, and phishing emails. Note: Limit comments to only relevent information (instead of log dumps) and be sure to remove PII if you want to remain anonymous.                              |
| 12 | Blog Spam       | CMS blog comment spam.                                                                                                                                                                                                          |
| 13 | VPN IP          | Conjunctive category.                                                                                                                                                                                                           |
| 14 | Port Scan       | Scanning for open ports and vulnerable services.                                                                                                                                                                                |
| 15 | Hacking         |                                                                                                                                                                                                                                 |
| 16 | SQL Injection   | Attempts at SQL injection.                                                                                                                                                                                                      |
| 17 | Spoofing        | Email sender spoofing.                                                                                                                                                                                                          |
| 18 | Brute-Force     | Credential brute-force attacks on webpage logins and services like SSH, FTP, SIP, SMTP, RDP, etc. This category is seperate from DDoS attacks.                                                                                  |
| 19 | Bad Web Bot     | Webpage scraping (for email addresses, content, etc) and crawlers that do not honor robots.txt. Excessive requests and user agent spoofing can also be reported here.                                                           |
| 20 | Exploited Host  | Host is likely infected with malware and being used for other attacks or to host malicious content. The host owner may not be aware of the compromise. This category is often used in combination with other attack categories. |
| 21 | Web App Attack  | Attempts to probe for or exploit installed web applications such as a CMS like WordPress/Drupal, e-commerce solutions, forum software, phpMyAdmin and various other software plugins/solutions.                                 |
| 22 | SSH             | Secure Shell (SSH) abuse. Use this category in combination with more specific categories.                                                                                                                                       |
| 23 | IoT Targeted    | Abuse was targeted at an "Internet of Things" type device. Include information about what type of device was targeted in the comments.                                                                                          |


"1 " => "" Altering DNS records resulting in improper redirection.                                                                                                                                                                         ",
"2 " => "" Falsifying domain server cache (cache poisoning).                                                                                                                                                                               ",
"3 " => "" Fraudulent orders.                                                                                                                                                                                                              ",
"4 " => "" Participating in distributed denial-of-service (usually part of botnet).                                                                                                                                                        ",
"5 " => ""                                                                                                                                                                                                                                 ",
"6 " => "" Oversized IP packet.                                                                                                                                                                                                            ",
"7 " => "" Phishing websites and/or email.                                                                                                                                                                                                 ",
"8 " => ""                                                                                                                                                                                                                                 ",
"9 " => "" Open proxy, open relay, or Tor exit node.                                                                                                                                                                                       ",
"10" => "Comment/forum spam, HTTP referer spam, or other CMS spam.                                                                                                                                                                       ",
"11" => "Spam email content, infected attachments, and phishing emails. Note: Limit comments to only relevant information (instead of log dumps) and be sure to remove PII if you want to remain anonymous.                              ",
"12" => "CMS blog comment spam.                                                                                                                                                                                                          ",
"13" => "Conjunctive category.                                                                                                                                                                                                           ",
"14" => "Scanning for open ports and vulnerable services.                                                                                                                                                                                ",
"15" => ""                                                                                                                                                                                                                                ",
"16" => "Attempts at SQL injection.                                                                                                                                                                                                      ",
"17" => "Email sender spoofing.                                                                                                                                                                                                          ",
"18" => "Credential brute-force attacks on webpage logins and services like SSH, FTP, SIP, SMTP, RDP, etc. This category is seperate from DDoS attacks.                                                                                  ",
"19" => "Webpage scraping (for email addresses, content, etc) and crawlers that do not honor robots.txt. Excessive requests and user agent spoofing can also be reported here.                                                           ",
"20" => "Host is likely infected with malware and being used for other attacks or to host malicious content. The host owner may not be aware of the compromise. This category is often used in combination with other attack categories. ",
"21" => "Attempts to probe for or exploit installed web applications such as a CMS like WordPress/Drupal, e-commerce solutions, forum software, phpMyAdmin and various other software plugins/solutions.                                 ",
"22" => "Secure Shell (SSH) abuse. Use this category in combination with more specific categories.                                                                                                                                       ",
"23" => "Abuse was targeted at an "Internet of Things" type device. Include information about what type of device was targeted in the comments.                                                                                          ",
