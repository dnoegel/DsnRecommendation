{extends file="parent:frontend/detail/index.tpl"}

{* Will show the tab header*}
{block name="frontend_detail_index_tabs_entry_also_bought" prepend}
    {if $dsnHasRecommendations}
        <a href="#content--dsn-recommendation" title="{s name='DsnRecommendation.AlsoBought'}Neo4j: Customers also bought{/s}" class="tab--link">{s name='DsnRecommendation.AlsoBought'}Neo4j: Customers also bought{/s}</a>
    {/if}
{/block}

{* Will show the tab content*}
{block name='frontend_detail_index_before_tabs' prepend}
    {if $dsnHasRecommendations}
        <div class="tab--container">
            <div class="tab--header">
                <a href="#" class="tab--title"
                   title="{s name='DsnRecommendation.AlsoBought'}Neo4j: Customers also bought{/s}">{s name='DsnRecommendation.AlsoBought'}Neo4j: Customers also bought{/s}</a>
            </div>
            <div class="tab--content">
                <div class="panel--body">
                    <div class="product-slider" data-product-slider="true">
                        <div class="product-slider--container">
                            {foreach $dsnHasRecommendations as $article}
                                <div class="product-slider--item">
                                    {include file="frontend/listing/box_article.tpl" sArticle=$article productBoxLayout="slider"}
                                </div>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/if}
{/block}