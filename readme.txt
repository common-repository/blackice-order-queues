
=== BIT Order Queues for WooCommerce===
Contributors: blackicelmtd
Donate link: http://www.blackicetrading.com
Tags: woocommerce, orders, attributes, status, queues
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tested up to: 6.2.0
WC requires at least: 6.0.0
WC tested up to: 7.5.1

Add Queues for Order Processing for each supplier in Product>Attributes>Suppliers

== Description ==

Add Order Statues for each Supplier in Product>Attributes
Statuses for:
 Ready to Export
 Awaiting Import
 Awaiting Dispatch
 Dispatched
 Query
Additional Status for Multiple Suppliers to be manually decided.

For use with BlackIce systems and automation (printers and barcode readers). Untested/unsupported for other system.

== Installation ==

1. Upload `bit-order-queues` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==
= Why am I getting a warning to create "Suppliers" attribute? =
While active the plugin relies on the Suppliers Product Attribute.
If this is not present, you will receive a warning until you create it.

= What actions should I take before deactivating? =
As the Plugin registers order statuses, on deactivation these statuses will no longer be displayed in WooCommerce.
Before deactivating you should re-assign existing orders to a standard order status.

= Do I need to re-assign orders if just checking for plugin conflicts? =
No, if you temporarily deactivate the plugin you may notice missing orders, but they are still in the database and the queues/statuses will reappear when the plugin is reactivate.

= How can I recover missing orders without reactivating the plugin? =
You can update each orders (post) status via the database.
Because this is a more advanced topic we won't cover exactly how, but it's pretty easy. Make sure to take a backup before editin database entries.

= What if I want to change the slug for a supplier? =
You can update the slug via Product>Attributes>Suppliers>
But before doing so you should re-assign any orders using the existing slug to another status.

= What if I already changed the slug without first updating orders? =
Again it's not a major problem, either change the slug back, re-assign orders, then update it again.
Or, you can update orders (posts) directly in the database.

== Screenshots ==
1. WooCommerce Products>Attributes
2. WooCommerce Products>Attributes>Supplier
3. Simple Product>Attributes>Supplier
4. Variable Product>Attributes>Supplier
5. Orders Screen, showing orders assigned to new queues.
6. Order Status Dropdown on Order Screen
7. Descision Flow to assigning order to Queues.

== Changelog ==

= 3.0.5 =
* Added BIT (Pending Payment) status for portal.

= 3.0.4 =
* Added: logging.

= 3.0.3 =
* UPDATE: Tested upto version info.
* FIX: incorrect submission of gf-submitter plugin file.

= 3.0.2 =
* UPDATE: update the filters to block automatic printing after PrintNode plugin update fixing their error.

= 3.0.1 =
* FIXED: incorrect filters to block automatic printing of all orders. Documentation for printnode plugin incorrect and reported.

= 3.0.0 =
* Renamed bit-order-statuses.php to blackice-order-statuses.php.
* Reconfigured Print functions from WooCommerce Print Orders (Google Cloud Print) to WooCommerce Automatic Printing - PrintNode

= 2.7.1 =
* Renamed the Plugin from wc-bit-order-statuses to bit-order-statuses after wordpress submission.

= 2.7 =
* Renamed the Plugin from woocommerce-bit-order-statuses to wc-bit-order-statuses

= 2.6 =
* Added print init to block print on payment/processing.
* Added print call on order assigning to bit-expt or multi supplier.
* Print functions tested using dev environment via print to pdf's.

= 2.5 =
* Added: function for 5 min processing queue check and schedule in batches of 5 orders to be run through the queue functions
* Note: above will need fine tuning, if more than 5 orders are not moved from processing then only these 5 will get checked repetadly.
* Added: schedule processing check job on Plugin Activation.
* Added: remove scheduled processing check job on Plugin De-Activation.
* Tested: reports, new orders, existing orders on dev system all ok. activated on live system but daily report mail already run. Further checks needed.

= 2.4 =
* Added: function and call for reports to include the new statuses.
* Fixed: Sales missing from WooCommerce Daily reports emails and reports screen.

= 2.3 =
* Added: functions and hooks for on payment complete
* Added: functions and hooks for on order complete (for non payment orders)
* migrate: to above hooks from thank-you page calls.

= 2.2 =
* Added: hook bit_order_queues_schedule_event
* Added: function schedule_auto_assign_status
* Added: logic to schedule_auto_assign_status to either schedule or run now if scheduler not available.
* Update: thank-you page hook to call schedule_auto_assign_status instead of running immediately.

= 2.1 =
* Move all __construct() to init() and fire init when creating the new instance of the plugin.

= 2.0 =
* Added auto sort function and programming to decide which queue to assign each order to.
* Added wc-bit-rexp BIT (Processing) and wc-bit-multi Multiple Suppiers (To Process) queues.
* ver 1.2 - 1.9 huge updates with testing to ensure decisions are correct.
* Hardcoded checks for Mug only orders to be assigned to GF.
* Hardcoded checks for Patch only orders to assign to BIT (for future use when PPE have patches) needs extending to pins/other items.

= 1.1 =
* Added ignore_slug arrays and logic
* Added ignore_adis array and logic to bulk actions.

= 1.0 =
* Write this Readme

= 0.8 =
* Fix: renamed -repx (Ready to Export) to -rexp inline with the css. 

= 0.7 =
* Fixed problem with 1 supplier text not displaying. Order Status is tied to the description on the main Orders Admin screen not just single.
* Remove text 'Mark As ' from the order status as it's display on the Orders Admin not just in the Single Order DropDown Box.
* Renamed function to include admin_ to show it also runs on the Orders Admin page.

= 0.6 =
* Added CSS file and some standard colours for our existing suppliers.
* Added to enqueue the CSS file.

= 0.5 =
* Added deactivation warning to the plugins page.

= 0.4 =
* Added warnings to the Attributes Page and Suppliers Attributes page.

= 0.3 =
* Added the order_status functions for dropdown and bulk actions.
* Renamed (Ready to CSV) to (Ready to Export)

= 0.2 =
* Added the main order_status function to query suppliers taxonomy and create the Ready to CSV queues.

= 0.1 =
* Initial setup of plugin directory structure.
