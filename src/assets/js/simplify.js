/*jslint browser:true */

/**
 * Ibrohim Kholilul Islam
 */

var _;
var _onload = [];
var _ElementArray;

_ElementArray = function (elementArray) {
  this.elements = elementArray;
};

_ElementArray.prototype.click = function (callback) {
  for (var i = this.elements.length - 1; i >= 0; i--) {
    this.elements[i].onclick = function(e){
      callback(new _ElementArray([e.srcElement]));
    };
  };
}

_ElementArray.prototype.html = function (string) {
  for (var i = this.elements.length - 1; i >= 0; i--) {
    this.elements[i].innerHTML = string;
  };
}

_ElementArray.prototype.val = function (propertyName, value) {
  if (value === undefined){
    return this.elements[0].getAttributeNode(propertyName).value;
  } else {
    this.elements[0].getAttributeNode(propertyName).value = value;
  }
}

_ = function (i) {

  switch (typeof i) {
  case "function":
    _onload.push(i);
    break;
  case "string":
    return new _ElementArray(document.querySelectorAll(i));
    break;    
  }

};

document.addEventListener("DOMContentLoaded", function () {
  var i;

  for (i = _onload.length - 1; i >= 0; i--) {
    _onload[i]();
  }
});

_.ajax = {};
_.ajax.x = function () {

  if (typeof XMLHttpRequest !== 'undefined') {
    return new XMLHttpRequest();  
  }

  var versions = [
    "MSXML2.XmlHttp.6.0",
    "MSXML2.XmlHttp.5.0",
    "MSXML2.XmlHttp.4.0",
    "MSXML2.XmlHttp.3.0",
    "MSXML2.XmlHttp.2.0",
    "Microsoft.XmlHttp"
  ];

  var xhr;
  var i;

  for(i = 0; i < versions.length; i++) {  
    try {  
      xhr = new ActiveXObject(versions[i]);  
      break;  
    } catch (e) {
    }  
  }
  return xhr;
};

_.ajax.send = function(url, callback, method, data, sync) {
  var x = _.ajax.x();
  x.open(method, url, sync);
  x.onreadystatechange = function() {
    if (x.readyState == 4) {
      callback(x.responseText)
    }
  };
  if (method == 'POST') {
    x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  }
  x.send(data)
};

_.ajax.get = function (url, data, callback, sync) {
  var query = [];
  var key;

  for (key in data) {
    query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
  }

  _.ajax.send(url + (query.length ? '?' + query.join('&') : ''), callback, 'GET', null, sync);
};

_.ajax.post = function (url, data, callback, sync) {
  var key;
  var query = [];

  for (key in data) {
    query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
  }

  _.ajax.send(url, callback, 'POST', query.join('&'), sync);
};