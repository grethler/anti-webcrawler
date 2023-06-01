## What is this?
---
With this source code one can only access a website if the recaptcha (v3) was successful. This is a simple way to stop crawlers from accessing your website.

## How does it work?
---
When a user accesses a page on your website one is automatically redirected to the ```verify.html``` \
[#](www.yourwebsite.com/siteabc) --> [#](www.yourwebsite.com/verify/verify.html) <br/><br/>
On that site the user clicks a ```button``` to verify that one is human. If the ```recaptcha``` is successful the user is redirected to the original page. The successful verification is then saved in the browser so the user doesn't need to verify everytime.\
[#](www.yourwebsite.com/verify/verify.html) --> [#](www.yourwebsite.com/siteabc)

## How to use
---
To make this work, fill in the following tokens:
verify.html l.17
```
grecaptcha.execute('YOUR RECAPTCHA KEY', {action:'Submit'})
```
verify.php l.12
```
$secret = 'YOUR SECRET RECAPTCHA KEY';
```
And your domainname here:
verify.php l.10+19
```
echo '<script>alert("Oops something went wrong. Please try again later."); window.location.href="YOURDOMAIN/verify/verify.html";</script>';

echo '<script>alert("Failed to process reCAPTCHA. Please try again later."); window.location.href=YOURDOMAIN/verify/verify.html";</script>';

```