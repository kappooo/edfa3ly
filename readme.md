<h1>Edaf3ly Task</h1>
<h5>Problem</h5>
<p>We have problem of computing different products which have different prices and some of them have 
   discount others not, also we have promotions when buy x of product you will get discount on another product, and taxes applied to all products.</p>
<hr>
<h5>Solution</h5>
My solution based on separate and split problem to small pieces.<br/>
<ul>
    <li>
        So you will find in code class responsible for holding data of products (Product) class has information like price, title and discount value.<br/>
            Class
    </li>
    <li>
        Currency Class which responsible for hold data for each currency like conversion rate and symbol of currency and way of formatting numbers.
    </li>
     <li>
           ITax interface which a contract for all taxes needed to be add on the system and have method return vale of tax.
     </li>
     <li>
          Promotion class responsible for applying promotions which consist of two clas
          <ul>
            <li>
                Rule Class when you can define rules or conditions need to be achieve to apply some action.
            </li>
             <li>
                Action Class when you define what will do if rule achieved like make discount with 30%.
             </li>
          </ul>
     </li>
     <li>
        Cart Handler which is the brain of problem which handel all dependencies of problem like product, taxes and promotions.<br/>
        <em style="text-decoration:underline">pseudo code for cart handler</em>
        <ul>
            <li>Map products from array of string to array of products objects</li>
            <li>Check if there is promotions and if one of products eligible for promotion to be apply on product and apply it</li>
            <li>Calculate discount per each Product and store discount in object from discount type class which respobsbile for storing discount value and product that have value</li>
            <li>Loop on taxes injected and apply on products which receive tax object and calculate the tax value</li>
            <li>Calculate the subtotal for all products</li>
        </ul>
     </li>
     <li>
        Cart Return is object return from Cart Handel which contain all data need to be print like: total discount, total taxes, subtotal, discount item and method for final total
     </li>
     <li>
        Currency Handler which take cart handler and Currency and it convert price due to currency passed and call factory of currency to get right object.
     </li>
     <li>
        IOutput interface responsible for printing output  and text need to be displayed
     </li>
</ul>
<hr/>
<h5>Conclusion</h5>
<p>This task is solved with <strong>php 7.4</strong> and make it as a package with namesapce edaf3ly\Challenge, applying psr4, psr1, psr2</p>
<p>I tried to use solid principle in this task as single responsibility, each class is doing it's business without violate another class work.</p>
<p>Using interfaces to use another class in solving some problems not modify class but implement the interface and provide another solution.</p>
<p>Using dependency injection  to provide data need to be handel to make easy use and modify </p>
<p>I used many design pattern like decorator design pattern in currency cart and currency handler, so you can add many steps before out put any value without changing existsing code.<br/>
I used factory design pattern in Product mapper and Currency Factory.</p>
<p>I tried to make commits of git to be descriptive and explain current situation.</p>
<p>I make unit and feature tests for all aspect of package and code coverage is 100%, also i used phpstan to make sure that i applied best practise in php.</p>
<hr/>
<h5>How to run it</h5>
   1- Just cole to local<br/>
   2- Make sure that you install php7.4 <br/>
   3- write in command line <strong>"composer install --dev"</strong><br/>
   4- Write command to use package <strong>"php index.php createCart --bill-currency=EGP T-shirt T-shirt shoes jacket"</strong>
   you can change currency or products you want to calculate it's prices<br/>
   5- If your want to run test cases just type in command line <strong>"./vendor/bin/phpunit"</strong>, <br/>you can show code coverage but hit link /docs/coverage.
   6- You can run <strong>"./vendor/bin/phpstan analyse --level=x"</strong> till level:8
<hr/>
<h5>Future enhancement</h5>
@todo
<ul>
    <li>Write more test cases to test without process with more taxes or promotions</li>
    <li>Make interface for Action to add more type of actions instead of type property</li>
    <li>Using docker to be ready for deployment without any configuration of for php</li>
</ul>
<hr/>
<p>*I would love hear any comments or improvements of code or structure</p>

