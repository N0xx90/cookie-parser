# Cookie parser

Run : 

```bash
docker build . -t cookie-parser 
docker run -d -v $(pwd)/data:/var/www/html/data -p 80:80 --name cookie-parser cookie-parser
```

Url for xss : http://localhost/c.php?c=COOKIE
Url for get list : http://localhost/cc.php with root:toor for login


