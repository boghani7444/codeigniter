<div id="main-content">
    <div class="container">
        <div class="company">
            <ul>
                <li><h2>Evosta InfoTech</h2></li>
                <li><h2>an ISO 9001 : 2014 certified compnay</h2></li>
            </ul>
        </div>

        <div class="img-404">
            <img title="404 - Page Not Found" alt="404 - Page Not Found" src="<?= base_url('assets/images/404.png'); ?>">
            <h2>ERROR</h2>
        </div>
        <div class="page-not-found">
            <h3><span>SORRY!</span> page not found</h3>
            <?php 
            $input = base_url();

            // in case scheme relative URI is passed, e.g., //www.google.com/
            $input = trim($input, '/');

            // If scheme not included, prepend it
            if (!preg_match('#^http(s)?://#', $input)) {
                $input = 'http://' . $input;
            }

            $urlParts = parse_url($input);

            // remove www
            $domain = preg_replace('/^www\./', '', $urlParts['host']);
            ?>
            The page you're looking for has either moved or is no longer on <a href="<?= base_url(); ?>"><?= $domain; ?></a>
        </div>
    </div>
    <div class="clear"></div>  
</div>
<style>
    
.company {
    float: left;
    margin: 5px auto;
    padding: 40px 0;
    text-align: center;
    width: 100%;
}
.company li {
    float: none;
    text-align: center;
    width: inherit;
}

.img-404 {
    margin: auto;
    text-align: center;
    width: 25%;
}

.img-404 h2 {
    font-size: 30px;
    font-weight: normal;
    letter-spacing: 2px;
    line-height: 40px;
    text-align: center;
}

.page-not-found {
    float: left;
    margin: 20px auto 40px;
    text-align: center;
    width: 100%;
}

.page-not-found h3 {
    color: #333;
    font-size: 40px;
    font-weight: normal;
}
.page-not-found h3 span {
    color: #197acb;
}
</style>