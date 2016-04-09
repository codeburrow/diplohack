<?php

/* welcome.twig */
class __TwigTemplate_3c1f326eaec034174468bd3c93e3ae0906f048f418dc6e35a3c1170912f6f55e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/master.twig", "welcome.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/master.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Search";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["text"]) ? $context["text"] : null), "lipsum", array(0 => 40), "method"), "html", null, true);
        echo " Let's put our content here ";
    }

    public function getTemplateName()
    {
        return "welcome.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/master.twig" %}*/
/* */
/* {% block title %}Search{% endblock %}*/
/* */
/* {% block content %} {{ text.lipsum(40) }} Let's put our content here {% endblock %}*/
/* */
