/*!
 * modernizr v3.0.0-alpha.3
 * Build http://v3.modernizr.com/download/#-adownload-ambientlight-animation-apng-appearance-applicationcache-audio-audioloop-audiopreload-backgroundblendmode-backgroundcliptext-backgroundsize-batteryapi-beacon-bgpositionshorthand-bgpositionxy-bgrepeatspace_bgrepeatround-bgsizecover-blobconstructor-bloburls-blobworkers-borderimage-borderradius-boxshadow-boxsizing-canvas-canvasblending-canvastext-canvaswinding-capture-checked-classlist-contains-contenteditable-contextmenu-cookies-cors-createelementattrs_createelement_attrs-cssall-cssanimations-csscalc-csschunit-csscolumns-cssescape-cssexunit-cssfilters-cssgradients-csshyphens_softhyphens_softhyphensfind-cssinvalid-cssmask-csspointerevents-csspositionsticky-csspseudoanimations-csspseudotransitions-cssreflections-cssremunit-cssresize-cssscrollbar-csstransforms-csstransforms3d-csstransitions-cssvalid-cssvhunit-cssvmaxunit-cssvminunit-cssvwunit-cubicbezierrange-customevent-customprotocolhandler-dart-datachannel-datalistelem-dataset-datauri-dataview-dataworkers-details-devicemotion_deviceorientation-directory-display_runin-displaytable-documentfragment-draganddrop-ellipsis-emoji-es5-es5array-es5date-es5function-es5object-es5string-es5syntax-es5undefined-es6array-es6math-es6number-es6object-es6string-eventlistener-eventsource-exiforientation-fileinput-filereader-filesystem-flash-flexbox-flexboxlegacy-flexboxtweener-flexwrap-fontface-formattribute-formvalidation-framed-fullscreen-gamepads-generatedcontent-generators-geolocation-getrandomvalues-getusermedia-hashchange-hidden-hiddenscroll-history-hsla-htmlimports-ie8compat-indexeddb-indexeddbblob-inlinesvg-input-inputformaction-inputformenctype-inputformmethod-inputformtarget-inputtypes-intl-jpegxr-json-lastchild-localizednumber-localstorage-lowbandwidth-lowbattery-mathml-mediaqueries-microdata-multiplebgs-mutationobserver-notification-nthchild-objectfit-olreversed-oninput-opacity-outputelem-overflowscrolling-pagevisibility-peerconnection-performance-picture-placeholder-pointerevents-pointerlock-postmessage-preserve3d-progressbar_meter-promises-proximity-queryselector-quotamanagement-regions-requestanimationframe-requestautocomplete-rgba-ruby-sandbox-scriptasync-scriptdefer-seamless-search-serviceworker-sessionstorage-shapes-sharedworkers-siblinggeneral-sizes-smil-speechrecognition-speechsynthesis-srcdoc-srcset-strictmode-stylescoped-subpixelfont-supports-svg-svgasimg-svgclippaths-svgfilters-svgforeignobject-target-template-templatestrings-textalignlast-textareamaxlength-textshadow-texttrackapi_track-time-todataurljpeg_todataurlpng_todataurlwebp-touchevents-transferables-typedarrays-unicode-unicoderange-unknownelements-urlparser-userdata-userselect-vibrate-video-videoautoplay-videoloop-videopreload-vml-webaudio-webgl-webglextensions-webintents-webp-webpalpha-webpanimation-webplossless_webp_lossless-websockets-websocketsbinary-websqldatabase-webworkers-willchange-wrapflow-xhr2-xhrresponsetype-xhrresponsetypearraybuffer-xhrresponsetypeblob-xhrresponsetypedocument-xhrresponsetypejson-xhrresponsetypetext-addtest-domprefixes-hasevent-mq-prefixed-prefixedcss-prefixes-shiv-testallprops-testprop-teststyles-dontmin
 *
 * Copyright (c)
 *  Faruk Ates
 *  Paul Irish
 *  Alex Sexton
 *  Ryan Seddon
 *  Alexander Farkas
 *  Patrick Kettner
 *  Stu Cox
 *  Richard Herrera

 * MIT License
 */

/*
 * Modernizr tests which native CSS3 and HTML5 features are available in the
 * current UA and makes the results available to you in two ways: as properties on
 * a global `Modernizr` object, and as classes on the `<html>` element. This
 * information allows you to progressively enhance your pages with a granular level
 * of control over the experience.
*/

;(function(window, document, undefined){
  var classes = [];
  

  // Take the html5 variable out of the
  // html5shiv scope so we can return it.
  var html5;
  /**
  * @preserve HTML5 Shiv 3.7.2 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed
  */
  ;(function(window, document) {
  /*jshint evil:true */
    /** version */
    var version = '3.7.2';

    /** Preset options */
    var options = window.html5 || {};

    /** Used to skip problem elements */
    var reSkip = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i;

    /** Not all elements can be cloned in IE **/
    var saveClones = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i;

    /** Detect whether the browser supports default html5 styles */
    var supportsHtml5Styles;

    /** Name of the expando, to work with multiple documents or to re-shiv one document */
    var expando = '_html5shiv';

    /** The id for the the documents expando */
    var expanID = 0;

    /** Cached data for each document */
    var expandoData = {};

    /** Detect whether the browser supports unknown elements */
    var supportsUnknownElements;

    (function() {
      try {
          var a = document.createElement('a');
          a.innerHTML = '<xyz></xyz>';
          //if the hidden property is implemented we can assume, that the browser supports basic HTML5 Styles
          supportsHtml5Styles = ('hidden' in a);

          supportsUnknownElements = a.childNodes.length == 1 || (function() {
            // assign a false positive if unable to shiv
            (document.createElement)('a');
            var frag = document.createDocumentFragment();
            return (
              typeof frag.cloneNode == 'undefined' ||
              typeof frag.createDocumentFragment == 'undefined' ||
              typeof frag.createElement == 'undefined'
            );
          }());
      } catch(e) {
        // assign a false positive if detection fails => unable to shiv
        supportsHtml5Styles = true;
        supportsUnknownElements = true;
      }

    }());

    /*--------------------------------------------------------------------------*/

    /**
     * Creates a style sheet with the given CSS text and adds it to the document.
     * @private
     * @param {Document} ownerDocument The document.
     * @param {String} cssText The CSS text.
     * @returns {StyleSheet} The style element.
     */
    function addStyleSheet(ownerDocument, cssText) {
      var p = ownerDocument.createElement('p'),
          parent = ownerDocument.getElementsByTagName('head')[0] || ownerDocument.documentElement;

      p.innerHTML = 'x<style>' + cssText + '</style>';
      return parent.insertBefore(p.lastChild, parent.firstChild);
    }

    /**
     * Returns the value of `html5.elements` as an array.
     * @private
     * @returns {Array} An array of shived element node names.
     */
    function getElements() {
      var elements = html5.elements;
      return typeof elements == 'string' ? elements.split(' ') : elements;
    }

    /**
     * Extends the built-in list of html5 elements
     * @memberOf html5
     * @param {String|Array} newElements whitespace separated list or array of new element names to shiv
     * @param {Document} ownerDocument The context document.
     */
    function addElements(newElements, ownerDocument) {
      var elements = html5.elements;
      if(typeof elements != 'string'){
        elements = elements.join(' ');
      }
      if(typeof newElements != 'string'){
        newElements = newElements.join(' ');
      }
      html5.elements = elements +' '+ newElements;
      shivDocument(ownerDocument);
    }

     /**
     * Returns the data associated to the given document
     * @private
     * @param {Document} ownerDocument The document.
     * @returns {Object} An object of data.
     */
    function getExpandoData(ownerDocument) {
      var data = expandoData[ownerDocument[expando]];
      if (!data) {
          data = {};
          expanID++;
          ownerDocument[expando] = expanID;
          expandoData[expanID] = data;
      }
      return data;
    }

    /**
     * returns a shived element for the given nodeName and document
     * @memberOf html5
     * @param {String} nodeName name of the element
     * @param {Document} ownerDocument The context document.
     * @returns {Object} The shived element.
     */
    function createElement(nodeName, ownerDocument, data){
      if (!ownerDocument) {
          ownerDocument = document;
      }
      if(supportsUnknownElements){
          return ownerDocument.createElement(nodeName);
      }
      if (!data) {
          data = getExpandoData(ownerDocument);
      }
      var node;

      if (data.cache[nodeName]) {
          node = data.cache[nodeName].cloneNode();
      } else if (saveClones.test(nodeName)) {
          node = (data.cache[nodeName] = data.createElem(nodeName)).cloneNode();
      } else {
          node = data.createElem(nodeName);
      }

      // Avoid adding some elements to fragments in IE < 9 because
      // * Attributes like `name` or `type` cannot be set/changed once an element
      //   is inserted into a document/fragment
      // * Link elements with `src` attributes that are inaccessible, as with
      //   a 403 response, will cause the tab/window to crash
      // * Script elements appended to fragments will execute when their `src`
      //   or `text` property is set
      return node.canHaveChildren && !reSkip.test(nodeName) && !node.tagUrn ? data.frag.appendChild(node) : node;
    }

    /**
     * returns a shived DocumentFragment for the given document
     * @memberOf html5
     * @param {Document} ownerDocument The context document.
     * @returns {Object} The shived DocumentFragment.
     */
    function createDocumentFragment(ownerDocument, data){
      if (!ownerDocument) {
          ownerDocument = document;
      }
      if(supportsUnknownElements){
          return ownerDocument.createDocumentFragment();
      }
      data = data || getExpandoData(ownerDocument);
      var clone = data.frag.cloneNode(),
          i = 0,
          elems = getElements(),
          l = elems.length;
      for(;i<l;i++){
          clone.createElement(elems[i]);
      }
      return clone;
    }

    /**
     * Shivs the `createElement` and `createDocumentFragment` methods of the document.
     * @private
     * @param {Document|DocumentFragment} ownerDocument The document.
     * @param {Object} data of the document.
     */
    function shivMethods(ownerDocument, data) {
      if (!data.cache) {
          data.cache = {};
          data.createElem = ownerDocument.createElement;
          data.createFrag = ownerDocument.createDocumentFragment;
          data.frag = data.createFrag();
      }


      ownerDocument.createElement = function(nodeName) {
        //abort shiv
        if (!html5.shivMethods) {
            return data.createElem(nodeName);
        }
        return createElement(nodeName, ownerDocument, data);
      };

      ownerDocument.createDocumentFragment = Function('h,f', 'return function(){' +
        'var n=f.cloneNode(),c=n.createElement;' +
        'h.shivMethods&&(' +
          // unroll the `createElement` calls
          getElements().join().replace(/[\w\-:]+/g, function(nodeName) {
            data.createElem(nodeName);
            data.frag.createElement(nodeName);
            return 'c("' + nodeName + '")';
          }) +
        ');return n}'
      )(html5, data.frag);
    }

    /*--------------------------------------------------------------------------*/

    /**
     * Shivs the given document.
     * @memberOf html5
     * @param {Document} ownerDocument The document to shiv.
     * @returns {Document} The shived document.
     */
    function shivDocument(ownerDocument) {
      if (!ownerDocument) {
          ownerDocument = document;
      }
      var data = getExpandoData(ownerDocument);

      if (html5.shivCSS && !supportsHtml5Styles && !data.hasCSS) {
        data.hasCSS = !!addStyleSheet(ownerDocument,
          // corrects block display not defined in IE6/7/8/9
          'article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}' +
          // adds styling not present in IE6/7/8/9
          'mark{background:#FF0;color:#000}' +
          // hides non-rendered elements
          'template{display:none}'
        );
      }
      if (!supportsUnknownElements) {
        shivMethods(ownerDocument, data);
      }
      return ownerDocument;
    }

    /*--------------------------------------------------------------------------*/

    /**
     * The `html5` object is exposed so that more elements can be shived and
     * existing shiving can be detected on iframes.
     * @type Object
     * @example
     *
     * // options can be changed before the script is included
     * html5 = { 'elements': 'mark section', 'shivCSS': false, 'shivMethods': false };
     */
    var html5 = {

      /**
       * An array or space separated string of node names of the elements to shiv.
       * @memberOf html5
       * @type Array|String
       */
      'elements': options.elements || 'abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video',

      /**
       * current version of html5shiv
       */
      'version': version,

      /**
       * A flag to indicate that the HTML5 style sheet should be inserted.
       * @memberOf html5
       * @type Boolean
       */
      'shivCSS': (options.shivCSS !== false),

      /**
       * Is equal to true if a browser supports creating unknown/HTML5 elements
       * @memberOf html5
       * @type boolean
       */
      'supportsUnknownElements': supportsUnknownElements,

      /**
       * A flag to indicate that the document's `createElement` and `createDocumentFragment`
       * methods should be overwritten.
       * @memberOf html5
       * @type Boolean
       */
      'shivMethods': (options.shivMethods !== false),

      /**
       * A string to describe the type of `html5` object ("default" or "default print").
       * @memberOf html5
       * @type String
       */
      'type': 'default',

      // shivs the document according to the specified `html5` object options
      'shivDocument': shivDocument,

      //creates a shived element
      createElement: createElement,

      //creates a shived documentFragment
      createDocumentFragment: createDocumentFragment,

      //extends list of elements
      addElements: addElements
    };

    /*--------------------------------------------------------------------------*/

    // expose html5
    window.html5 = html5;

    // shiv the document
    shivDocument(document);

  }(this, document));

})(window, document);