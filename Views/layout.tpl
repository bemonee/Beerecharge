{extends file='template.tpl'}

{block name="title"}Home{/block}

{block name="cssadicional"}
<!-- Custom -->
<link rel="stylesheet" href="{$p_dir}/Assets/css/style.css">
{/block}

{if ($smarty.session.usuario instanceof Models\Administrador)}
    {assign tpl 'admin'}
{else}
    {assign tpl 'client'}
{/if}

{block name="body"}
    <div class="row">
        <div class="col-12 sin-padding-bootstrap">
            <nav class="navbar navbar-expand-lg navbar-light grey lighten-3">
                <a class="navbar-brand" href="#">
                    <strong><i class="fa fa-beer"></i> Beerecharge</strong>
                </a>
                <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarSupportedContent" aria-label="Toggle navigation" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown">
                                <i class="fa fa-user"></i> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-unique" aria-labelledby="navbarDropdownMenuLink">
                                {include file="Views/Menus/navbar/$tpl.tpl"}
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-md-2 sidebar sin-padding-bootstrap elegant-color z-depth-1 animated slideInLeft">
            <div class="row">
                <div class="col">
                    <div class="sidebar-menu white-text">
                        {include file="Views/Menus/sidebar/$tpl.tpl"}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <!--Panel-->
            <div id="seccionPrincipal" class="card mt-3 animated fadeIn">
                <div class="card-header elegant-color white-text">
                    {block name="section_title"}{/block}
                </div>
                <div class="card-body">
                    <div class="card-text black-text texto-normal">
                        {block name="section"}{/block}
                    </div>
                </div>
            </div>
            <!--/.Panel-->
        </div>
    </div>
{/block}

{block name="jsadicional" append}
    <script>
        $('#seccionPrincipal').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass("animated fadeIn");
        });
    </script>
{/block}
