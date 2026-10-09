# Adding DNS Records in Cloudflare

The domain [tesseractconsulting.in](https://tesseractconsulting.in) was migrated from its original DNS Manager GoDaddy to Cloudflare. 

The DNS records as per the zone file from GoDaddy were altered and new records were added to the domain in the Cloudflare account to point it towards the IP address of the virtual server. 

The DNS records were added as follows: 
|  Name  |  Type  |  Content  |  Proxy Status  |  TTL  |
|---|---|---|---|---|
|  tesseractconsulting.in |  A |  192.0.2.15 |  Proxied  |  Auto  |
|  tesseractconsulting.in |  AAAA |  2001:db8:a1b2:c3d4::1|  Proxied  |  Auto  |
|  www.tesseractconsulting.in |  CNAME |  tesseractconsulting.in |  Proxied  |  Auto  |

