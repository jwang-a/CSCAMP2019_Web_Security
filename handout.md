# Computer Security 
James@M30W

## Prelude

Computer security is becoming more and more important as our life gets intertwined with all kinds with devices. From common hand-held devices such as cellphone, to laptops that we most people regularly use, and further on to warehouses built to serve all kinds of functionalities such as cloud storage and search engines. Everything goes under the risk of being targeted by attackers. Thus, learning the basics on how such attacks might work and also how to mitigate them is a must for any serious computer scientist/engineer. In this class, we will focus on web security and cover some of the most common attacks seen in the past decade.

## What is computer security

Before getting started, we must first question ourselves what exactly is computer security. Since attacks may come in all kinds of forms and shapes, we must set some
fundamental principles for practicers to follow. The most widely acknowledges set if principle is CIA, which stands for Confidentiality, Integrity, and Availability, with the
definition given below.

```
Confidentiality :
    Secret data should remain secrets, and cannot be acquired by unintended receivers
Integrity :
    Data should not be modified by non-privileged entities at any time
Availability :
    Attackers should not be available to deny specific users of access to services
```
These three golden laws sketches the concept of computer security. And by taking a few
examples into consideration, we can see how they work in identifying attacks.

1. **Phishing** attacks are used to steal credentials/sensitive data from users :
    violates confidentiality
2. **DDoS** attacks denies users from accessing service :
    violates availability
3. **MitM** attack eavesdrop connections and possibly alter data sent to receiver:
    violate confidentiality & integrity


## Web Security

### Basic Web


The basic model of a typical websites access work is like this:
```
    Client (browser)
          HTML
          CSS
       Javacsript

             ^
          |  |
  request |  | response
          |  |
          v

         Server
        database
        backend
```

The client sends requests to server by a url associated with some http methods, and the server responses the request after backend server sorts out the logic.

A basic URL is composed of these \<scheme\>://\<netloc\>/\<path\>?\<query\> , where scheme is the communicate protocol (usually http or https), netloc is the location of the server in the network, path is the location of target file on the server, and query is the argument that target file should take and try to interpret.


The two most common http/https method is GET and POST. GET is originally designed to be used for demanding(getting) data from server, and is shown in the query field. POST. on the other hand are designed to send data to the server, and only show up in request headers.


Other stuff that will not be covered here, but that the reader might want to look into will probably be request/response headers, status codes, and the difference between http and https.

### Cookie


Have you ever wondered how does facebook figure out whether you are logged in or not when reopening the Facebook website? This is where cookies come in handy. Cookies are pieces of strings used to store data on client side. This piece of string serves many uses. It may be used to track the action of user, determine login state, detect identity etc.


The first possible attack targeted towards cookies is by stealing it. Since cookies might determine the login state, if an attacker manages to acquire the victims cookie, he can pretty much use it to login and impersonate the victim. A basic defence against this attack is to set up timeouts for cookies to lower the possible impact of stolen cookies. Other defences such as setting HSTS, disabling CORS depend on the attack vector and will not be discussed in this section.


The second possible attack is when cookies lack protection mechanism, and could be altered in favour of the attacker. For example, if a cookie named ‘admin’ holds the value 1 for admin accounts and 0 for normal accounts, the attacker can easily change his cookie value from 0 to 1 to escalate privilege. The normal way of doing this is introducing hashing or encryption methods to make the cookie unmodifiable(and more preferable not understandable) by users without server side secrets.

### Javascript (client side)

Javascript is the main language in which client side scripts are written. Since it runs on the client browser, it has full access to the browser data related to the website. Clients may also write there own javascript to interact with the webpage sent from server.

The first attack here is due to the misunderstanding of javascript. Some newbie web-developers writes authentication scripts in javascript, however, since javascript is viewable by clients, the authentication rule is basically leaked and next to useless. This attack purely sprouts from the developers ignorance, but as more and more people try to learn programming without fully understanding what they are doing, this attack will most likely stay around for a long time.

The second attack, cross site scripting(XSS), is more elegant compared to the first. It utilises the fact that javascript will be executed by clients, and targets to steal client information such as cookies. The attack works in a sense where the attacker injects malicious javascript payload somewhere and tries to get the victim to load it in his browser. The malicious javascript then gathers sensitive data and sends it back to the attacker. Since XSS has been one of the top ten attacks according to OWASP, most modern browsers have set up mitigations such as disabling CORS or refusing to execute javascript that came from user input. But still, the only way to get rid of these attacks is to have website developers properly sanitise user input and never mix input with executable code.

### PHP

PHP has been a popular programming language to facilitate websites in the past. Its convenience and simplicity has attracted many new web programmers. However, due to its design, there are also several pitfalls that lead to security issues.

The first attack is based on weak comparison in PHP. there are two levels of comparison operator in PHP, the first is ‘==’ and the second is ‘===’. The difference those two is that ‘===’ returns true only if the type of compared object is the same, while ‘==’ performs type converting before comparing the two objects. For instance, 0===‘0e123’ is False since the types(int and string) is different, but 0==‘0e123’ will first attempt to convert ‘0e123’ to a number(which is 0 since ‘0e123’ is treated as a scientific notation), and 0==0 will then return True. This results in some unexpected check bypass and might end up causing authentication problems. The proper way to deal with it is again, very simple, always use ‘===’.

The second attack is about executing arbitrary user input. Since PHP has a lot of functions that execute data as shell commands or PHP script (exec(), eval(), shell_exec(),system()), if user input is not properly sanitised, it is likely that there will be RCE(remote command execution) problems and might result in a complete takeover of server by attackers. However, sanitising properly requires web programmers to completely understand what they are doing, which tragically, is quite impossible in many cases. Despite the fact, security researchers generally advise programmers to use whitelist instead of blacklist, so that misconfigurations will only result in incomplete functionality but not security issues.

### SQL

The full name of SQL is Structured Query Language, and is designed to help programmers manage databases. Most servers nowadays more or less use SQL to
keep all kinds of data under control.

The most common attack against SQL is called SQL injection. A simple example to illustrate the attack is shown below :

```
original statement : SELECT * FROM table WHERE name=‘$name’
$name = ‘ OR 1=1 OR ‘
injected statement : SELECT * FROM table WHERE name=‘’ OR 1=1 OR ‘’
equivalent statement : SELECT * FROM table
```

The original statement is meant to extrapolate data where its name is specified with user given input, however, intentionally manipulating $name to close the single
quotes and making the condition clause (name=‘’ OR 1=1 OR ‘’) will result in a case where WHERE always receives True (1=1 is definitely True), and allows attacker to
dump the entire table. Again, this attack sprouts from non-sanitised input being treated as code, and can be dealt with by proper input sanitising. Another layer of
protection is to use prepared statements provided by the framework language. Those prepared statements allow user-defined rules and check whether inputs meet the requirements automatically. Some also provide pre-defined rules for users who are not sure how to construct their own filter rules.

## How to Learn Computer Security

Computer security is a growing field and topics will only become more and more diverse. For those who are interested in learning more about computer security, a possible way is to read CVE(common vulnerabilities and exposure), try to set up the vulnerable environment and replay the attacks. This is arguably the best way to get a full grasp on discovered vulnerabilities.

Another more enjoyable way is by playing CTF games and learning along the way. In cyber security, CTF stands for Capture The Flag. The rules are rather simple, multiple
“insecure” environments are provided by game hosts, and players try to utilise the vulnerabilities to gain access to tokens called flags that are hidden in the problems. This
can help security enthusiastic sharpen their skills while having fun.

Overall, Computer Security is a interesting field to enter, and as long as you are willing to spend enough time exploring, there are always things to be learned and funs to
be found.
