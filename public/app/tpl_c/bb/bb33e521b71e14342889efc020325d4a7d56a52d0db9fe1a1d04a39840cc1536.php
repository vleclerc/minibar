<?php

/* app.html */
class __TwigTemplate_2b6c416033e85fe4aa44b5f5be82a6d7e19eb81fa11d6f32bd37a468656b3644 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
        <title>Raspibar</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
\t\t<meta name=\"description\" content=\"Raspibar\" />
\t\t<meta name=\"keywords\" content=\"Raspibar\"/>
\t\t<meta name=\"theme-color\" content=\"#09F\">
\t\t<link rel=\"icon\" href=\"img/favicon.ico\" />
\t\t<link rel=\"manifest\" href=\"/manifest.json\">
\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
\t\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
\t\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css\" integrity=\"sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp\" crossorigin=\"anonymous\">
\t\t<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
\t\t<script src=\"https://www.gstatic.com/firebasejs/5.0.1/firebase.js\"></script>
\t\t<script src=\"https://www.gstatic.com/firebasejs/5.0.3/firebase.js\"></script>
\t\t<script src=\"app.js\" ></script>
    </head>
    <body>
    \t\t<div class=\"container-fluid\">
\t    \t\t<header>
\t    \t\t\t<nav id=\"menu\">
\t    \t\t\t\t<ul>
\t    \t\t\t\t\t<li><a title=\"Raspibar\" href=\"/app\">Raspibar</a></li>
\t    \t\t\t\t</ul>
\t    \t\t\t</nav>
\t    \t\t</header>
\t    \t\t<section>
\t    \t\t\t<h1>Raspibar</h1>
\t    \t\t</section>
\t    \t\t<footer id=\"footer\">
\t    \t\t\t<p class=\"text-muted\">
\t    \t\t\t\t";
        // line 35
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " &copy; <a title=\"Raspibar\" href=\"http://raspibar.ddns.net/app/\">Raspibar</a>
\t    \t\t\t</p>
\t    \t\t</footer>
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "app.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 35,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "app.html", "/var/www/html/app/tpl/app.html");
    }
}
