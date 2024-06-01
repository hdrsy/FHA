
WebFont.load({
  google: {
    families: [
      "Poppins:100,200,300,regular,500,600,700,800:latin,latin-ext",
    ],
  },
});


!(function (o, c) {
  var n = c.documentElement,
    t = " w-mod-";
  (n.className += t + "js"),
    ("ontouchstart" in o ||
      (o.DocumentTouch && c instanceof DocumentTouch)) &&
      (n.className += t + "touch");
})(window, document);
window.__WEBFLOW_CURRENCY_SETTINGS = {
  currencyCode: "USD",
  $init: true,
  symbol: "$",
  decimal: ".",
  fractionDigits: 2,
  group: ",",
  template:
    '{{wf {"path":"symbol","type":"PlainText"} }} {{wf {"path":"amount","type":"CommercePrice"} }} {{wf {"path":"currencyCode","type":"PlainText"} }}',
  hideDecimalForWholeNumbers: false,
};