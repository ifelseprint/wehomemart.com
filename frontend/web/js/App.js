(function ($) {
	"use strict";

	var App = function () {
		var o = this; // Create reference to this instance
		$(document).ready(function () {
			o.initialize();
		}); // Initialize app when document is ready

	};
	var p = App.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		// Init events
		this._eventModalView();
		this._enableEvents();
	};

	p.initializeInPjax = function() {
        
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	p._enableEvents = function () {

	};

	// =========================================================================
	// EVENT GOBAL MODAL
	// =========================================================================
    p._eventModalView = function () {
        $(".btn-modal-view").click(function() {
            $('#loadingOverlay').show();
            $('#modal-view')
                .find('#modal-content-view')
                .load($(this).attr('value'),function () {
                	
                    $('#modal-view').modal('show');
                    $('#loadingOverlay').hide();
            });
        });
    };

	// =========================================================================
	// DEFINE NAMESPACE
	// =========================================================================

	window.appWEHOME = window.appRI || {};
	window.appWEHOME.App = new App;
}(jQuery)); // pass in (jQuery):
