<?php 
/** 
 * @package JMAP::SOURCES::administrator::components::com_jmap
 * @subpackage views
 * @subpackage help
 * @subpackage tmpl
 * @author Joomla! Extensions Store
 * @copyright (C) 2014 - Joomla! Extensions Store
 * @license GNU/GPLv2 http://www.gnu.org/licenses/gpl-2.0.html  
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' ); 
?>
<div>
	If you choose to create a new data source from scratch the wizard will be bypassed, and you will get redirect directly to edit screen for data source with empty settings.<br/>
	In order to create a new data source from scratch for specific extensions not available in predefined list, you should know SQL basis and understand how this can be accomplished.
	<br/>
	The hidden secret of such a powerful and flexible extension like JSitemap PRO is grab data directly from extensions database tables, and formatting links
	exactly as each extension indeed does by itself. 
	<br/>
	To do this a database SQL query is generated by an SQL Query Compiler™ that relates on settings managed by a user friendly interface. Next it's shown a full step process to create a new user defined data source for component Zoo items.
	
	<h3>STEP 1 - analyze raw links for target extension</h3>
	So the first thing to do as a starting point is analyze the raw links that target extension uses for items. We suppose to create a new data source for Zoo items in this example.
	We can go to Joomla! global configuration and deactivate search engines friendly urls and url rewriting parameters. After that we will be able to get raw links inside Zoo component
	for items it manages, and they will be in this form:
	<p style="font-style:italic">http://yourdomain.com/index.php?option=com_zoo&view=item&item_id=1&task=item&amp;lang=en</p>
	As you see splitting by '&amp;' character the informations needed to generate links are:
	<ul>
		<li><span class="bold">option</span> - the component name</li>
		<li><span class="bold">view</span> - the component view name to show this type of items</li>
		<li><span class="bold">item_id</span> - the id for every items, almost every extension need it</li>
		<li><span class="bold">task</span> - an extra parameter that inform component about the task that should be executed</li>
	</ul>
	Within all these data the only <span class="bold">dynamic element</span> selected from database is the item ID that changes for every links.<br/>
	With SQL Query Compiler you can select from 1 <span class="bold">main database table</span> that relates to specific items, and <span class="bold">join with max 3 other tables</span> to get additional information such as category to which items belong.
	With this in mind we can specify the static parameters for generated links query string as shown in the image below.
	<br/>
	<img src="components/com_jmap/images/documentation/sql_1.jpg" alt="compiler 1 step"/> 
	<br/>
	
	<h3>STEP 2 - setup main table settings</h3>
	Now we can setup the first main table that contains real Zoo items with these steps:
	<ul>
		<li><span class="bold">choose component</span></li>
		<li><span class="bold">select field for title in sitemap</span> - usually 'name' or 'title' in most extensions</li>
		<li><span class="bold">id</span> - the real item id that in this case need to be renamed as 'item_id' according to link format</li>
		<li><span class="bold">ordering</span> - optionally you can specify ordering for retrieved items inside sitemap</li>
		<li><span class="bold">where condition</span> - optionally you can specify where condition as a filters for retrieved items</li>
	</ul>
	<br/>
	Note that for some extensions that contain <span class="bold">'alias' field</span> in database table it could be required <span class="bold">activate 'Use alias field'</span> option, in order to get for example <span class="bold">'1:alias-for-item'</span> instead of only the <span class="bold">'1'</span> numeric ids.
	<br/>
	<img src="components/com_jmap/images/documentation/sql_2.jpg" alt="compiler 2 step"/> 
	<br/><br/>
	At this point links will be <span class="bold">already get generated for Zoo items</span> as we can see in picture below, but they are shown as a <span class="bold">flat list and without category separation</span>.
	<img src="components/com_jmap/images/documentation/sitemap1.jpg" alt="sitemap 1 view"/> 
	<br/>
	
	<h3>STEP 3 - setup first JOIN table</h3>
	In order to get category information for Zoo items it's required a <span class="bold">JOIN query between tables</span> in this case a <span class="bold">many to many relationship</span> between items and categories.
	To accomplish this task we move on next section about <span class="bold">'Join table #1'</span> where we can choose first table to join with in many to many relationship.
	Of course for <span class="bold">other extensions</span> it could be enough use only <span class="bold">Main Table and the #1 Join Table</span>, because the <span class="bold">relationship could be of type one to many</span>.
	Zoo uses a many to many relationship and a table called <span class="bold">'zoo_category_item'</span> for this, mapping categories to items. So we can select the 2 tables and corresponding fields to generate the JOIN as in picture below.
	<br/>
	<img src="components/com_jmap/images/documentation/sql_3.jpg" alt="sitemap 3 view"/>
	<br/>
	
	<h3>STEP 4 - setup second JOIN table</h3>
	The last step is <span class="bold">complete JOIN with last table</span> that relates to categories, to get the needed informations. 
	Zoo uses a table called <span class="bold">'zoo_category'</span> for this, and we will join the last used mapping table 'zoo_category_item' with 'zoo_category', selecting required information to <span class="bold">divide items by category</span>.<br/>
	As it's easy to understand the main information to retrieve is <span class="bold">category title</span>, but it's important to notice that here has been <span class="bold">switched on 'Yes'</span> the flag to instruct JSitemap that the selected field in this table
	will be <span class="bold">used to divide items into category for HTML sitemap</span>.<br/>
	Next picture will show this in more details.
	<br/>
	<img src="components/com_jmap/images/documentation/sql_4.jpg" alt="sitemap 4 view"/>
	<br/>
	
	<h3>STEP 5 - generate raw SQL query</h3>
	At this point you can <span class="bold">generate the SQL query clicking on 'Apply' button</span> for this data source, and immediatly you will see the section 'Auto generated SQL query'
	that contains the auto generated raw SQL query that will be responsible for data retrieving.
	If you are quite expert about SQL you can also <span class="bold">edit this query by hand</span>, and whenever you need the original auto generated query based on settings you can simply click on <span class="bold">'Regenerate SQL query'</span> button.
	This will <span class="bold">reset all your changes</span> eventually if you have made some mistakes, so you can feel free to experiment editing directly raw query.
	<br/>
	<img src="components/com_jmap/images/documentation/sql_5.jpg" alt="sitemap 5 view"/>
	<br/><br/>
	Finally we can see the result of this setup in frontend sitemap, that <span class="bold">shows up with categorization for selected elements</span>.
	<br/>
	<img src="components/com_jmap/images/documentation/sql_6.jpg" alt="sitemap 6 view"/>
	<br/>
	
	<h3>STEP 6 - remember to choose a menu item for SEF alias string replacement if needed</h3>
	<span class="bold">Not all extensions can be automatically integrated for menu alias Joomla! routing, so you may be needed to choose by dropdown the menu item you want associate to data sources.</span><br/>
	Just to recap if your Zoo links are in the form of:
	<p style="font-style:italic">'http://yourdomain.com/en/<span class="bold">component/com_zoo</span>/....'</p> 
	you will be able to get links more SEF friendly 
	<p style="font-style:italic">'http://yourdomain.com/en/<span class="bold">zooalias</span>/...'</p>
	simply selecting the menu items that relates to your Zoo component main view.<br/>
	<span class="bold">Note that if on your site you will have installed a 3PD advanced extension to manage URL rewriting such as sh404Sef you don't need this setting.
		<br/>
		Also if you have multiple menu items for Zoo component you may need advanced URL rewriting by 3PD extensions or split every menu item on different data source filtering for example by category. More info on filtering in 'Extras' section.
	</span>
	<br/>
	<img src="components/com_jmap/images/documentation/sql_7.jpg" alt="sitemap 7 view"/>
	<br/>
</div>