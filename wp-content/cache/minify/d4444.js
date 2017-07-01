function favorites_after_button_submit(t,e,a,o){}function favorites_after_initial_load(t){}var Favorites=Favorites||{};Favorites.Utilities=function(){var t=this,e=jQuery;t.isFavorite=function(t,a){var o=!1;return e.each(a,function(e,a){a.post_id===parseInt(t)&&(o=!0),parseInt(a.post_id)===t&&(o=!0)}),o},t.objectLength=function(t){var e,a=0;for(e in t)t.hasOwnProperty(e)&&a++;return a},t.siteIndex=function(t){for(var e=0;e<Favorites.userFavorites.length;e++)if(Favorites.userFavorites[e].site_id===parseInt(t))return e},t.getThumbnail=function(t,e){var a=t.thumbnails;if(void 0===a||0==a.length)return!1;var o=a[e];return void 0!==o&&(o||!1)}},(Favorites=Favorites||{}).Formatter=function(){var t=this,e=jQuery;t.addFavoriteCount=function(t,e){return Favorites.jsData.button_options.include_count?(e<=0&&(e=0),t+=' <span class="simplefavorite-button-count">'+e+"</span>"):t},t.decrementAllCounts=function(){for(var t=e(".simplefavorite-button.active.has-count"),a=0;a<t.length;a++){var o=e(t)[a],s=e(o).find(".simplefavorite-button-count"),i=e(s).text()-1;e(o).attr("data-favoritecount",i)}}},(Favorites=Favorites||{}).ButtonOptionsFormatter=function(){var t=this,e=jQuery;t.options=Favorites.jsData.button_options,t.formatter=new Favorites.Formatter,t.format=function(e,a){t.options.custom_colors&&t.colors(e,a),t.html(e,a)},t.html=function(a,o){var s=e(a).attr("data-favoritecount"),i=t.options.button_type,n="";return"custom"===t.options.button_type?(o&&e(a).html(t.formatter.addFavoriteCount(Favorites.jsData.favorited,s)),o||e(a).html(t.formatter.addFavoriteCount(Favorites.jsData.favorite,s)),t.applyIconColor(a,o),void t.applyCountColor(a,o)):o?(n+='<i class="'+i.icon_class+'"></i> ',n+=i.state_active,void e(a).html(t.formatter.addFavoriteCount(n,s))):(n+='<i class="'+i.icon_class+'"></i> ',n+=i.state_default,e(a).html(t.formatter.addFavoriteCount(n,s)),t.applyIconColor(a,o),void t.applyCountColor(a,o))},t.colors=function(a,o){if(t.options.custom_colors){if(o)return(s=t.options.active).background_active&&e(a).css("background-color",s.background_active),s.border_active&&e(a).css("border-color",s.border_active),void(s.text_active&&e(a).css("color",s.text_active));var s=t.options.default;s.background_default&&e(a).css("background-color",s.background_default),s.border_default&&e(a).css("border-color",s.border_default),s.text_default&&e(a).css("color",s.text_default),t.boxShadow(a)}},t.boxShadow=function(a){t.options.box_shadow||(e(a).css("box-shadow","none"),e(a).css("-webkit-box-shadow","none"),e(a).css("-moz-box-shadow","none"))},t.applyIconColor=function(a,o){t.options.custom_colors&&(o&&t.options.active.icon_active&&e(a).find("i").css("color",t.options.active.icon_active),!o&&t.options.default.icon_default&&e(a).find("i").css("color",t.options.default.icon_default))},t.applyCountColor=function(a,o){t.options.custom_colors&&(o&&t.options.active.count_active?e(a).find(Favorites.selectors.count).css("color",t.options.active.count_active):!o&&t.options.default.count_default&&e(a).find(Favorites.selectors.count).css("color",t.options.default.count_default))}},(Favorites=Favorites||{}).NonceGenerator=function(){var t=this,e=jQuery;return t.bindEvents=function(){e(document).ready(function(){Favorites.jsData.dev_mode&&(console.log("Favorites Localized Data"),console.log(Favorites.jsData)),t.getNonce()})},t.getNonce=function(){""!==Favorites.jsData.cache_enabled?e.ajax({url:Favorites.jsData.ajaxurl,type:"post",datatype:"json",data:{action:Favorites.formActions.nonce},success:function(t){Favorites.jsData.nonce=t.nonce,Favorites.jsData.dev_mode&&console.log("Nonce successfully generated: "+t.nonce),e(document).trigger("favorites-nonce-generated",[t.nonce])}}):Favorites.jsData.nonce=favorites_data.nonce},t.bindEvents()},(Favorites=Favorites||{}).UserFavorites=function(){var t=this,e=jQuery;return t.initialLoad=!1,t.bindEvents=function(){e(document).on("favorites-nonce-generated",function(){t.initalLoad=!0,t.getFavorites()})},t.getFavorites=function(){e.ajax({url:Favorites.jsData.ajaxurl,type:"post",datatype:"json",data:{action:Favorites.formActions.favoritesarray},success:function(a){Favorites.jsData.dev_mode&&(console.log("The current user favorites were successfully loaded."),console.log(a)),Favorites.userFavorites=a.favorites,e(document).trigger("favorites-user-favorites-loaded",[t.initalLoad]),e(document).trigger("favorites-update-all-buttons"),t.initalLoad&&favorites_after_initial_load(Favorites.userFavorites)},error:function(t){Favorites.jsData.dev_mode&&(console.log("The was an error loading the user favorites."),console.log(t))}})},t.bindEvents()},(Favorites=Favorites||{}).Clear=function(){var t=this,e=jQuery;return t.activeButton,t.utilities=new Favorites.Utilities,t.formatter=new Favorites.Formatter,t.bindEvents=function(){e(document).on("click",Favorites.selectors.clear_button,function(a){a.preventDefault(),t.activeButton=e(this),t.clearFavorites()}),e(document).on("favorites-updated-single",function(){t.updateClearButtons()}),e(document).on("favorites-user-favorites-loaded",function(){t.updateClearButtons()})},t.clearFavorites=function(){t.loading(!0);var a=e(t.activeButton).attr("data-siteid");e.ajax({url:Favorites.jsData.ajaxurl,type:"post",datatype:"json",data:{action:Favorites.formActions.clearall,nonce:Favorites.jsData.nonce,siteid:a},success:function(o){Favorites.jsData.dev_mode&&(console.log("Favorites list successfully cleared."),console.log(o)),t.formatter.decrementAllCounts(),t.loading(!1),t.clearSiteFavorites(a),e(document).trigger("favorites-cleared",[t.activeButton,o.old_favorites]),e(document).trigger("favorites-update-all-buttons")},error:function(t){Favorites.jsData.dev_mode&&(console.log("There was an error clearing the favorites list."),console.log(t))}})},t.loading=function(a){if(a)return e(t.activeButton).addClass(Favorites.cssClasses.loading),void e(t.activeButton).attr("disabled","disabled");e(t.activeButton).removeClass(Favorites.cssClasses.loading)},t.updateClearButtons=function(){for(var a,o,s=0;s<e(Favorites.selectors.clear_button).length;s++){a=e(Favorites.selectors.clear_button)[s],o=e(a).attr("data-siteid");for(var i=0;i<Favorites.userFavorites.length;i++)Favorites.userFavorites[i].site_id===parseInt(o)&&(t.utilities.objectLength(Favorites.userFavorites[i].posts)>0?e(a).attr("disabled",!1):e(a).attr("disabled","disabled"))}},t.clearSiteFavorites=function(t){e.each(Favorites.userFavorites,function(e,a){this.site_id===parseInt(t)&&(Favorites.userFavorites[e].posts={})})},t.bindEvents()},(Favorites=Favorites||{}).Lists=function(){var t=this,e=jQuery;return t.utilities=new Favorites.Utilities,t.buttonFormatter=new Favorites.ButtonOptionsFormatter,t.bindEvents=function(){e(document).on("favorites-update-all-lists",function(){t.updateAllLists()}),e(document).on("favorites-updated-single",function(){t.updateAllLists()}),e(document).on("favorites-cleared",function(){t.updateAllLists()}),e(document).on("favorites-user-favorites-loaded",function(){t.updateAllLists()})},t.updateAllLists=function(){for(var a=0;a<Favorites.userFavorites.length;a++)for(var o=e(Favorites.selectors.list+'[data-siteid="'+Favorites.userFavorites[a].site_id+'"]'),s=0;s<e(o).length;s++){var i=e(o)[s];t.updateSingleList(i)}},t.updateSingleList=function(a){var o=e(a).attr("data-userid"),s=e(a).attr("data-siteid"),i=e(a).attr("data-includelinks"),n=e(a).attr("data-includebuttons"),r=e(a).attr("data-includethumbnails"),c=e(a).attr("data-thumbnailsize"),d=e(a).attr("data-includeexcerpts"),u=e(a).attr("data-posttypes"),v=e(a).attr("data-nofavoritestext");e.ajax({url:Favorites.jsData.ajaxurl,type:"post",dataType:"json",data:{action:Favorites.formActions.favoritelist,nonce:Favorites.jsData.nonce,userid:o,siteid:s,include_links:i,include_buttons:n,include_thumbnails:r,thumbnail_size:c,include_excerpt:d,no_favorites:v,post_types:u},success:function(o){Favorites.jsData.dev_mode&&(console.log("Favorites list successfully retrieved."),console.log(e(a)),console.log(o));var s=e(o.list);e(a).replaceWith(s),t.removeButtonLoading(s),e(document).trigger("favorites-list-updated",[s])},error:function(t){Favorites.jsData.dev_mode&&(console.log("There was an error updating the list."),console.log(a),console.log(t))}})},t.removeButtonLoading=function(a){var o=e(a).find(Favorites.selectors.button);e.each(o,function(){t.buttonFormatter.format(e(this),!1),e(this).removeClass(Favorites.cssClasses.active),e(this).removeClass(Favorites.cssClasses.loading)})},t.removeInvalidListItems=function(a,o){var s=e(a).find("li[data-postid]");e.each(s,function(a,s){var i=e(this).attr("data-postid");t.utilities.isFavorite(i,o)||e(this).remove()})},t.bindEvents()},(Favorites=Favorites||{}).Button=function(){var t=this,e=jQuery;return t.activeButton,t.allButtons,t.authenticated=!0,t.formatter=new Favorites.Formatter,t.data={},t.bindEvents=function(){e(document).on("click",Favorites.selectors.button,function(a){a.preventDefault(),t.activeButton=e(this),t.setAllButtons(),t.submitFavorite()})},t.setAllButtons=function(){var a=e(t.activeButton).attr("data-postid");t.allButtons=e('button[data-postid="'+a+'"]')},t.setData=function(){t.data.post_id=e(t.activeButton).attr("data-postid"),t.data.site_id=e(t.activeButton).attr("data-siteid"),t.data.status=e(t.activeButton).hasClass("active")?"inactive":"active"},t.submitFavorite=function(){t.loading(!0),t.setData(),e.ajax({url:Favorites.jsData.ajaxurl,type:"post",dataType:"json",data:{action:Favorites.formActions.favorite,nonce:Favorites.jsData.nonce,postid:t.data.post_id,siteid:t.data.site_id,status:t.data.status},success:function(a){if(Favorites.jsData.dev_mode&&(console.log("The favorite was successfully saved."),console.log(a)),"unauthenticated"===a.status)return Favorites.authenticated=!1,t.loading(!1),t.data.status="inactive",e(document).trigger("favorites-update-all-buttons"),void e(document).trigger("favorites-require-authentication",[t.data]);Favorites.userFavorites=a.favorites,t.loading(!1),t.resetButtons(),e(document).trigger("favorites-updated-single",[a.favorites,t.data.post_id,t.data.site_id,t.data.status]),e(document).trigger("favorites-update-all-buttons"),favorites_after_button_submit(a.favorites,t.data.post_id,t.data.site_id,t.data.status)},error:function(t){Favorites.jsData.dev_mode&&(console.log("There was an error saving the favorite."),console.log(t))}})},t.resetButtons=function(){var a=parseInt(e(t.activeButton).attr("data-favoritecount"));e.each(t.allButtons,function(){if("inactive"===t.data.status)return a<=0&&(a=1),e(this).removeClass(Favorites.cssClasses.active),e(this).attr("data-favoritecount",a-1),void e(this).find(Favorites.selectors.count).text(a-1);e(this).addClass(Favorites.cssClasses.active),e(this).attr("data-favoritecount",a+1),e(this).find(Favorites.selectors.count).text(a+1)})},t.loading=function(a){a?e.each(t.allButtons,function(){e(this).attr("disabled","disabled"),e(this).addClass(Favorites.cssClasses.loading),e(this).html(t.addLoadingIndication())}):e.each(t.allButtons,function(){e(this).attr("disabled",!1),e(this).removeClass(Favorites.cssClasses.loading)})},t.addLoadingIndication=function(e){return"1"!==Favorites.jsData.indicate_loading?e:"active"===t.data.status?Favorites.jsData.loading_text+Favorites.jsData.loading_image_active:Favorites.jsData.loading_text+Favorites.jsData.loading_image},t.bindEvents()},(Favorites=Favorites||{}).ButtonUpdater=function(){var t=this,e=jQuery;return t.utilities=new Favorites.Utilities,t.formatter=new Favorites.Formatter,t.buttonFormatter=new Favorites.ButtonOptionsFormatter,t.activeButton,t.data={},t.bindEvents=function(){e(document).on("favorites-update-all-buttons",function(){t.updateAllButtons()}),e(document).on("favorites-list-updated",function(e,a){t.updateAllButtons(a)})},t.updateAllButtons=function(a){for(var o=void 0===typeof a&&""!==a?e(a).find(Favorites.selectors.button):e(Favorites.selectors.button),s=0;s<e(o).length;s++)t.activeButton=e(o)[s],Favorites.authenticated&&t.setButtonData(),Favorites.authenticated&&t.utilities.isFavorite(t.data.postid,t.data.site_favorites)?(t.buttonFormatter.format(e(t.activeButton),!0),e(t.activeButton).addClass(Favorites.cssClasses.active),e(t.activeButton).removeClass(Favorites.cssClasses.loading)):(t.buttonFormatter.format(e(t.activeButton),!1),e(t.activeButton).removeClass(Favorites.cssClasses.active),e(t.activeButton).removeClass(Favorites.cssClasses.loading))},t.setButtonData=function(){t.data.postid=e(t.activeButton).attr("data-postid"),t.data.siteid=e(t.activeButton).attr("data-siteid"),t.data.favorite_count=e(t.activeButton).attr("data-favoritecount"),t.data.site_index=t.utilities.siteIndex(t.data.siteid),t.data.site_favorites=Favorites.userFavorites[t.data.site_index].posts},t.bindEvents()},(Favorites=Favorites||{}).TotalCount=function(){var t=this,e=jQuery;return t.bindEvents=function(){e(document).on("favorites-updated-single",function(){t.updateTotal()}),e(document).on("favorites-cleared",function(){t.updateTotal()})},t.updateTotal=function(){for(var t=0;t<e(Favorites.selectors.total_favorites).length;t++){for(var a=e(Favorites.selectors.total_favorites)[t],o=parseInt(e(a).attr("data-siteid")),s=e(a).attr("data-posttypes").split(","),i=0,n=0;n<Favorites.userFavorites.length;n++){var r=Favorites.userFavorites[n];r.site_id===o&&e.each(r.posts,function(){"all"!==e(a).attr("data-posttypes")?-1!==e.inArray(this.post_type,s)&&i++:i++})}e(a).text(i)}},t.bindEvents()},(Favorites=Favorites||{}).PostFavoriteCount=function(){var t=this,e=jQuery;return t.bindEvents=function(){e(document).on("favorites-updated-single",function(e,a,o,s,i){if("active"===i)return t.updateCounts();t.decrementSingle(o,s)}),e(document).on("favorites-cleared",function(e,a,o){t.updateCounts(o,!0)})},t.updateCounts=function(t,a){void 0!==t&&""!==t||(t=Favorites.userFavorites),void 0!==a&&""!==a||(a=!1);for(var o=0;o<e("["+Favorites.selectors.post_favorite_count+"]").length;o++){var s=e("["+Favorites.selectors.post_favorite_count+"]")[o],i=parseInt(e(s).attr(Favorites.selectors.post_favorite_count)),n=e(s).attr("data-siteid");""===n&&(n="1");for(var r=0;r<t.length;r++){var c=t[r];c.site_id===parseInt(n)&&e.each(c.posts,function(){if(this.post_id===i){if(a){var t=parseInt(this.total)-1;return void e(s).text(t)}e(s).text(this.total)}})}}},t.decrementSingle=function(t,a){for(var o=0;o<e("["+Favorites.selectors.post_favorite_count+"]").length;o++){var s=e("["+Favorites.selectors.post_favorite_count+"]")[o],i=e(s).attr(Favorites.selectors.post_favorite_count),n=e(s).attr("data-siteid");if(""===n&&(n="1"),n===a&&i===t){var r=parseInt(e(s).text())-1;e(s).text(r)}}},t.bindEvents()},(Favorites=Favorites||{}).RequireAuthentication=function(){var t=this,e=jQuery;return t.bindEvents=function(){e(document).on("favorites-require-authentication",function(){Favorites.jsData.dev_mode&&console.log("Unauthenticated user was prevented from favoriting."),t.openModal()}),e(document).on("click",".simplefavorites-modal-backdrop",function(e){t.closeModal()}),e(document).on("click","["+Favorites.selectors.close_modals+"]",function(e){e.preventDefault(),t.closeModal()})},t.openModal=function(){t.buildModal(),setTimeout(function(){e("["+Favorites.selectors.modals+"]").addClass("active")},10)},t.buildModal=function(){if(!(e("["+Favorites.selectors.modals+"]").length>0)){var t='<div class="simplefavorites-modal-backdrop" '+Favorites.selectors.modals+"></div>";t+='<div class="simplefavorites-modal-content" '+Favorites.selectors.modals+">",t+='<div class="simplefavorites-modal-content-body">',t+=Favorites.jsData.authentication_modal_content,t+="</div>\x3c!-- .simplefavorites-modal-content-body --\x3e",t+="</div>\x3c!-- .simplefavorites-modal-content --\x3e",e("body").prepend(t)}},t.closeModal=function(){e("["+Favorites.selectors.modals+"]").removeClass("active"),e(document).trigger("favorites-modal-closed")},t.bindEvents()},jQuery(document).ready(function(){new Favorites.Factory}),(Favorites=Favorites||{}).selectors={button:".simplefavorite-button",list:".favorites-list",clear_button:".simplefavorites-clear",total_favorites:".simplefavorites-user-count",modals:"data-favorites-modal",close_modals:"data-favorites-modal-close",count:".simplefavorite-button-count",post_favorite_count:"data-favorites-post-count-id"},Favorites.cssClasses={loading:"loading",active:"active"},Favorites.jsData={ajaxurl:favorites_data.ajaxurl,nonce:null,favorite:favorites_data.favorite,favorited:favorites_data.favorited,include_count:favorites_data.includecount,indicate_loading:favorites_data.indicate_loading,loading_text:favorites_data.loading_text,loading_image_active:favorites_data.loading_image_active,loading_image:favorites_data.loading_image,cache_enabled:favorites_data.cache_enabled,authentication_modal_content:favorites_data.authentication_modal_content,button_options:favorites_data.button_options,dev_mode:favorites_data.dev_mode},Favorites.userFavorites=null,Favorites.authenticated=!0,Favorites.formActions={nonce:"favorites_nonce",favoritesarray:"favorites_array",favorite:"favorites_favorite",clearall:"favorites_clear",favoritelist:"favorites_list"},Favorites.Factory=function(){var t=this;jQuery;return t.build=function(){new Favorites.NonceGenerator,new Favorites.UserFavorites,new Favorites.Lists,new Favorites.Clear,new Favorites.Button,new Favorites.ButtonUpdater,new Favorites.TotalCount,new Favorites.PostFavoriteCount,new Favorites.RequireAuthentication},t.build()};