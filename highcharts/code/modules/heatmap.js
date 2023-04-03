/*
 Highmaps JS v9.2.1 (2021-08-19)

 (c) 2009-2021 Torstein Honsi

 License: www.highcharts.com/license
*/
'use strict';(function(a){"object"===typeof module&&module.exports?(a["default"]=a,module.exports=a):"function"===typeof define&&define.amd?define("highcharts/modules/heatmap",["highcharts"],function(p){a(p);a.Highcharts=p;return a}):a("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(a){function p(a,h,m,E){a.hasOwnProperty(h)||(a[h]=E.apply(null,m))}a=a?a._modules:{};p(a,"Mixins/ColorSeries.js",[],function(){return{colorPointMixin:{setVisible:function(a){var h=this,e=a?"show":"hide";
h.visible=h.options.visible=!!a;["graphic","dataLabel"].forEach(function(a){if(h[a])h[a][e]()});this.series.buildKDTree()}},colorSeriesMixin:{optionalAxis:"colorAxis",translateColors:function(){var a=this,h=this.options.nullColor,m=this.colorAxis,E=this.colorKey;(this.data.length?this.data:this.points).forEach(function(e){var n=e.getNestedProperty(E);(n=e.options.color||(e.isNull||null===e.value?h:m&&"undefined"!==typeof n?m.toColor(n,e):e.color||a.color))&&e.color!==n&&(e.color=n,"point"===a.options.legendType&&
e.legendItem&&a.chart.legend.colorizeItem(e,e.visible))})}}}});p(a,"Core/Axis/Color/ColorAxisComposition.js",[a["Core/Color/Color.js"],a["Mixins/ColorSeries.js"],a["Core/Utilities.js"]],function(a,h,m){var e=a.parse,B=h.colorPointMixin,n=h.colorSeriesMixin,t=m.addEvent,q=m.extend,F=m.merge,c=m.pick,r=m.splat,v;(function(a){function h(){var b=this,g=this.options;this.colorAxis=[];g.colorAxis&&(g.colorAxis=r(g.colorAxis),g.colorAxis.forEach(function(g,d){g.index=d;new w(b,g)}))}function m(b){var g=
this,d=function(d){d=b.allItems.indexOf(d);-1!==d&&(g.destroyItem(b.allItems[d]),b.allItems.splice(d,1))},f=[],l,z;(this.chart.colorAxis||[]).forEach(function(b){(l=b.options)&&l.showInLegend&&(l.dataClasses&&l.visible?f=f.concat(b.getDataClassLegendSymbols()):l.visible&&f.push(b),b.series.forEach(function(b){if(!b.options.showInLegend||l.dataClasses)"point"===b.options.legendType?b.points.forEach(function(b){d(b)}):d(b)}))});for(z=f.length;z--;)b.allItems.unshift(f[z])}function v(b){b.visible&&b.item.legendColor&&
b.item.legendSymbol.attr({fill:b.item.legendColor})}function x(){var b=this.chart.colorAxis;b&&b.forEach(function(b,d,g){b.update({},g)})}function k(){(this.chart.colorAxis&&this.chart.colorAxis.length||this.colorAttribs)&&this.translateColors()}function d(){var b=this.axisTypes;b?-1===b.indexOf("colorAxis")&&b.push("colorAxis"):this.axisTypes=["colorAxis"]}function l(b){var g=b.prototype.createAxis;b.prototype.createAxis=function(b,d){if("colorAxis"!==b)return g.apply(this,arguments);var l=new w(this,
F(d.axis,{index:this[b].length,isX:!1}));this.isDirtyLegend=!0;this.axes.forEach(function(b){b.series=[]});this.series.forEach(function(b){b.bindAxes();b.isDirtyData=!0});c(d.redraw,!0)&&this.redraw(d.animation);return l}}function f(){this.elem.attr("fill",e(this.start).tweenTo(e(this.end),this.pos),void 0,!0)}function b(){this.elem.attr("stroke",e(this.start).tweenTo(e(this.end),this.pos),void 0,!0)}var g=[],w;a.compose=function(a,c,A,e,r){w||(w=a);-1===g.indexOf(c)&&(g.push(c),a=c.prototype,a.collectionsWithUpdate.push("colorAxis"),
a.collectionsWithInit.colorAxis=[a.addColorAxis],t(c,"afterGetAxes",h),l(c));-1===g.indexOf(A)&&(g.push(A),c=A.prototype,c.fillSetter=f,c.strokeSetter=b);-1===g.indexOf(e)&&(g.push(e),t(e,"afterGetAllItems",m),t(e,"afterColorizeItem",v),t(e,"afterUpdate",x));-1===g.indexOf(r)&&(g.push(r),q(r.prototype,n),q(r.prototype.pointClass.prototype,B),t(r,"afterTranslate",k),t(r,"bindAxes",d))}})(v||(v={}));return v});p(a,"Core/Axis/Color/ColorAxisDefaults.js",[a["Core/Color/Palette.js"]],function(a){return{lineWidth:0,
minPadding:0,maxPadding:0,gridLineWidth:1,tickPixelInterval:72,startOnTick:!0,endOnTick:!0,offset:0,marker:{animation:{duration:50},width:.01,color:a.neutralColor40},labels:{overflow:"justify",rotation:0},minColor:a.highlightColor10,maxColor:a.highlightColor100,tickLength:5,showInLegend:!0}});p(a,"Core/Axis/Color/ColorAxis.js",[a["Core/Axis/Axis.js"],a["Core/Color/Color.js"],a["Core/Axis/Color/ColorAxisComposition.js"],a["Core/Axis/Color/ColorAxisDefaults.js"],a["Core/Globals.js"],a["Core/Legend/LegendSymbol.js"],
a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,h,m,p,B,n,t,q){var e=this&&this.__extends||function(){var a=function(c,d){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(d,f){d.__proto__=f}||function(d,f){for(var b in f)f.hasOwnProperty(b)&&(d[b]=f[b])};return a(c,d)};return function(c,d){function l(){this.constructor=c}a(c,d);c.prototype=null===d?Object.create(d):(l.prototype=d.prototype,new l)}}(),c=h.parse,r=B.noop,v=t.series,D=q.extend,y=q.isNumber,C=q.merge,
u=q.pick;h=function(a){function k(d,l){var f=a.call(this,d,l)||this;f.beforePadding=!1;f.chart=void 0;f.coll="colorAxis";f.dataClasses=void 0;f.legendItem=void 0;f.legendItems=void 0;f.name="";f.options=void 0;f.stops=void 0;f.visible=!0;f.init(d,l);return f}e(k,a);k.compose=function(d,l,f,b){m.compose(k,d,l,f,b)};k.prototype.init=function(d,l){var f=d.options.legend||{},b=l.layout?"vertical"!==l.layout:"vertical"!==f.layout,g=l.visible;f=C(k.defaultColorAxisOptions,l,{showEmpty:!1,title:null,visible:f.enabled&&
!1!==g});this.coll="colorAxis";this.side=l.side||b?2:1;this.reversed=l.reversed||!b;this.opposite=!b;a.prototype.init.call(this,d,f);this.userOptions.visible=g;l.dataClasses&&this.initDataClasses(l);this.initStops();this.horiz=b;this.zoomEnabled=!1};k.prototype.initDataClasses=function(d){var l=this.chart,f=this.options,b=d.dataClasses.length,g,a=0,z=l.options.chart.colorCount;this.dataClasses=g=[];this.legendItems=[];(d.dataClasses||[]).forEach(function(d,k){d=C(d);g.push(d);if(l.styledMode||!d.color)"category"===
f.dataClassColor?(l.styledMode||(k=l.options.colors,z=k.length,d.color=k[a]),d.colorIndex=a,a++,a===z&&(a=0)):d.color=c(f.minColor).tweenTo(c(f.maxColor),2>b?.5:k/(b-1))})};k.prototype.hasData=function(){return!!(this.tickPositions||[]).length};k.prototype.setTickPositions=function(){if(!this.dataClasses)return a.prototype.setTickPositions.call(this)};k.prototype.initStops=function(){this.stops=this.options.stops||[[0,this.options.minColor],[1,this.options.maxColor]];this.stops.forEach(function(d){d.color=
c(d[1])})};k.prototype.setOptions=function(d){a.prototype.setOptions.call(this,d);this.options.crosshair=this.options.marker};k.prototype.setAxisSize=function(){var d=this.legendSymbol,a=this.chart,f=a.options.legend||{},b,g;d?(this.left=f=d.attr("x"),this.top=b=d.attr("y"),this.width=g=d.attr("width"),this.height=d=d.attr("height"),this.right=a.chartWidth-f-g,this.bottom=a.chartHeight-b-d,this.len=this.horiz?g:d,this.pos=this.horiz?f:b):this.len=(this.horiz?f.symbolWidth:f.symbolHeight)||k.defaultLegendLength};
k.prototype.normalizedValue=function(d){this.logarithmic&&(d=this.logarithmic.log2lin(d));return 1-(this.max-d)/(this.max-this.min||1)};k.prototype.toColor=function(d,a){var f=this.dataClasses,b=this.stops,g;if(f)for(g=f.length;g--;){var l=f[g];var c=l.from;b=l.to;if(("undefined"===typeof c||d>=c)&&("undefined"===typeof b||d<=b)){var k=l.color;a&&(a.dataClass=g,a.colorIndex=l.colorIndex);break}}else{d=this.normalizedValue(d);for(g=b.length;g--&&!(d>b[g][0]););c=b[g]||b[g+1];b=b[g+1]||c;d=1-(b[0]-
d)/(b[0]-c[0]||1);k=c.color.tweenTo(b.color,d)}return k};k.prototype.getOffset=function(){var d=this.legendGroup,l=this.chart.axisOffset[this.side];d&&(this.axisParent=d,a.prototype.getOffset.call(this),this.added||(this.added=!0,this.labelLeft=0,this.labelRight=this.width),this.chart.axisOffset[this.side]=l)};k.prototype.setLegendColor=function(){var d=this.reversed,a=d?1:0;d=d?0:1;a=this.horiz?[a,0,d,0]:[0,d,0,a];this.legendColor={linearGradient:{x1:a[0],y1:a[1],x2:a[2],y2:a[3]},stops:this.stops}};
k.prototype.drawLegendSymbol=function(d,a){var f=d.padding,b=d.options,g=this.horiz,l=u(b.symbolWidth,g?k.defaultLegendLength:12),c=u(b.symbolHeight,g?12:k.defaultLegendLength),e=u(b.labelPadding,g?16:30);b=u(b.itemDistance,10);this.setLegendColor();a.legendSymbol=this.chart.renderer.rect(0,d.baseline-11,l,c).attr({zIndex:1}).add(a.legendGroup);this.legendItemWidth=l+f+(g?b:e);this.legendItemHeight=c+f+(g?e:0)};k.prototype.setState=function(d){this.series.forEach(function(a){a.setState(d)})};k.prototype.setVisible=
function(){};k.prototype.getSeriesExtremes=function(){var d=this.series,a=d.length,f;this.dataMin=Infinity;for(this.dataMax=-Infinity;a--;){var b=d[a];var g=b.colorKey=u(b.options.colorKey,b.colorKey,b.pointValKey,b.zoneAxis,"y");var c=b.pointArrayMap;var k=b[g+"Min"]&&b[g+"Max"];if(b[g+"Data"])var e=b[g+"Data"];else if(c){e=[];c=c.indexOf(g);var r=b.yData;if(0<=c&&r)for(f=0;f<r.length;f++)e.push(u(r[f][c],r[f]))}else e=b.yData;k?(b.minColorValue=b[g+"Min"],b.maxColorValue=b[g+"Max"]):(e=v.prototype.getExtremes.call(b,
e),b.minColorValue=e.dataMin,b.maxColorValue=e.dataMax);"undefined"!==typeof b.minColorValue&&(this.dataMin=Math.min(this.dataMin,b.minColorValue),this.dataMax=Math.max(this.dataMax,b.maxColorValue));k||v.prototype.applyExtremes.call(b)}};k.prototype.drawCrosshair=function(d,c){var f=c&&c.plotX,b=c&&c.plotY,g=this.pos,l=this.len;if(c){var k=this.toPixels(c.getNestedProperty(c.series.colorKey));k<g?k=g-2:k>g+l&&(k=g+l+2);c.plotX=k;c.plotY=this.len-k;a.prototype.drawCrosshair.call(this,d,c);c.plotX=
f;c.plotY=b;this.cross&&!this.cross.addedToColorAxis&&this.legendGroup&&(this.cross.addClass("highcharts-coloraxis-marker").add(this.legendGroup),this.cross.addedToColorAxis=!0,this.chart.styledMode||"object"!==typeof this.crosshair||this.cross.attr({fill:this.crosshair.color}))}};k.prototype.getPlotLinePath=function(d){var c=this.left,f=d.translatedValue,b=this.top;return y(f)?this.horiz?[["M",f-4,b-6],["L",f+4,b-6],["L",f,b],["Z"]]:[["M",c,f],["L",c-6,f+6],["L",c-6,f-6],["Z"]]:a.prototype.getPlotLinePath.call(this,
d)};k.prototype.update=function(d,c){var f=this.chart.legend;this.series.forEach(function(b){b.isDirtyData=!0});(d.dataClasses&&f.allItems||this.dataClasses)&&this.destroyItems();a.prototype.update.call(this,d,c);this.legendItem&&(this.setLegendColor(),f.colorizeItem(this,!0))};k.prototype.destroyItems=function(){var a=this.chart;this.legendItem?a.legend.destroyItem(this):this.legendItems&&this.legendItems.forEach(function(d){a.legend.destroyItem(d)});a.isDirtyLegend=!0};k.prototype.destroy=function(){this.chart.isDirtyLegend=
!0;this.destroyItems();a.prototype.destroy.apply(this,[].slice.call(arguments))};k.prototype.remove=function(d){this.destroyItems();a.prototype.remove.call(this,d)};k.prototype.getDataClassLegendSymbols=function(){var a=this,c=a.chart,f=a.legendItems,b=c.options.legend,g=b.valueDecimals,k=b.valueSuffix||"",e;f.length||a.dataClasses.forEach(function(b,d){var l=b.from,h=b.to,A=c.numberFormatter,w=!0;e="";"undefined"===typeof l?e="< ":"undefined"===typeof h&&(e="> ");"undefined"!==typeof l&&(e+=A(l,
g)+k);"undefined"!==typeof l&&"undefined"!==typeof h&&(e+=" - ");"undefined"!==typeof h&&(e+=A(h,g)+k);f.push(D({chart:c,name:e,options:{},drawLegendSymbol:n.drawRectangle,visible:!0,setState:r,isDataClass:!0,setVisible:function(){w=a.visible=!w;a.series.forEach(function(b){b.points.forEach(function(b){b.dataClass===d&&b.setVisible(w)})});c.legend.colorizeItem(this,w)}},b))});return f};k.defaultColorAxisOptions=p;k.defaultLegendLength=200;k.keepProps=["legendGroup","legendItemHeight","legendItemWidth",
"legendItem","legendSymbol"];return k}(a);Array.prototype.push.apply(a.keepProps,h.keepProps);"";return h});p(a,"Mixins/ColorMapSeries.js",[a["Core/Globals.js"],a["Core/Series/Point.js"],a["Core/Utilities.js"]],function(a,h,m){var e=m.defined;m=m.addEvent;var p=a.noop;a=a.seriesTypes;m(h,"afterSetState",function(a){this.moveToTopOnHover&&this.graphic&&this.graphic.attr({zIndex:a&&"hover"===a.state?1:0})});return{colorMapPointMixin:{dataLabelOnNull:!0,moveToTopOnHover:!0,isValid:function(){return null!==
this.value&&Infinity!==this.value&&-Infinity!==this.value}},colorMapSeriesMixin:{pointArrayMap:["value"],axisTypes:["xAxis","yAxis","colorAxis"],trackerGroups:["group","markerGroup","dataLabelsGroup"],getSymbol:p,parallelArrays:["x","y","value"],colorKey:"value",pointAttribs:a.column.prototype.pointAttribs,colorAttribs:function(a){var h={};!e(a.color)||a.state&&"normal"!==a.state||(h[this.colorProp||"fill"]=a.color);return h}}}});p(a,"Series/Heatmap/HeatmapPoint.js",[a["Mixins/ColorMapSeries.js"],
a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,h,m){var e=this&&this.__extends||function(){var a=function(e,c){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var e in c)c.hasOwnProperty(e)&&(a[e]=c[e])};return a(e,c)};return function(e,c){function h(){this.constructor=e}a(e,c);e.prototype=null===c?Object.create(c):(h.prototype=c.prototype,new h)}}();a=a.colorMapPointMixin;var p=m.clamp,n=m.extend,t=m.pick;h=function(a){function h(){var c=
null!==a&&a.apply(this,arguments)||this;c.options=void 0;c.series=void 0;c.value=void 0;c.x=void 0;c.y=void 0;return c}e(h,a);h.prototype.applyOptions=function(c,e){c=a.prototype.applyOptions.call(this,c,e);c.formatPrefix=c.isNull||null===c.value?"null":"point";return c};h.prototype.getCellAttributes=function(){var a=this.series,e=a.options,h=(e.colsize||1)/2,m=(e.rowsize||1)/2,n=a.xAxis,q=a.yAxis,u=this.options.marker||a.options.marker;a=a.pointPlacementToXValue();var x=t(this.pointPadding,e.pointPadding,
0),k={x1:p(Math.round(n.len-(n.translate(this.x-h,!1,!0,!1,!0,-a)||0)),-n.len,2*n.len),x2:p(Math.round(n.len-(n.translate(this.x+h,!1,!0,!1,!0,-a)||0)),-n.len,2*n.len),y1:p(Math.round(q.translate(this.y-m,!1,!0,!1,!0)||0),-q.len,2*q.len),y2:p(Math.round(q.translate(this.y+m,!1,!0,!1,!0)||0),-q.len,2*q.len)};[["width","x"],["height","y"]].forEach(function(a){var d=a[0];a=a[1];var c=a+"1",b=a+"2",g=Math.abs(k[c]-k[b]),e=u&&u.lineWidth||0,h=Math.abs(k[c]+k[b])/2;u[d]&&u[d]<g&&(k[c]=h-u[d]/2-e/2,k[b]=
h+u[d]/2+e/2);x&&("y"===a&&(c=b,b=a+"1"),k[c]+=x,k[b]-=x)});return k};h.prototype.haloPath=function(a){if(!a)return[];var c=this.shapeArgs;return["M",c.x-a,c.y-a,"L",c.x-a,c.y+c.height+a,c.x+c.width+a,c.y+c.height+a,c.x+c.width+a,c.y-a,"Z"]};h.prototype.isValid=function(){return Infinity!==this.value&&-Infinity!==this.value};return h}(h.seriesTypes.scatter.prototype.pointClass);n(h.prototype,{dataLabelOnNull:a.dataLabelOnNull,moveToTopOnHover:a.moveToTopOnHover});return h});p(a,"Series/Heatmap/HeatmapSeries.js",
[a["Core/Color/Color.js"],a["Mixins/ColorMapSeries.js"],a["Series/Heatmap/HeatmapPoint.js"],a["Core/Legend/LegendSymbol.js"],a["Core/Color/Palette.js"],a["Core/Series/SeriesRegistry.js"],a["Core/Renderer/SVG/SVGRenderer.js"],a["Core/Utilities.js"]],function(a,h,m,p,B,n,t,q){var e=this&&this.__extends||function(){var a=function(c,b){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var c in a)a.hasOwnProperty(c)&&(b[c]=a[c])};return a(c,b)};return function(c,
b){function d(){this.constructor=c}a(c,b);c.prototype=null===b?Object.create(b):(d.prototype=b.prototype,new d)}}();h=h.colorMapSeriesMixin;var c=n.series,r=n.seriesTypes,v=r.column,D=r.scatter,y=t.prototype.symbols,C=q.extend,u=q.fireEvent,x=q.isNumber,k=q.merge,d=q.pick;t=function(h){function f(){var a=null!==h&&h.apply(this,arguments)||this;a.colorAxis=void 0;a.data=void 0;a.options=void 0;a.points=void 0;a.valueMax=NaN;a.valueMin=NaN;return a}e(f,h);f.prototype.drawPoints=function(){var a=this;
if((this.options.marker||{}).enabled||this._hasPointMarkers)c.prototype.drawPoints.call(this),this.points.forEach(function(b){b.graphic&&(b.graphic[a.chart.styledMode?"css":"animate"](a.colorAttribs(b)),a.options.borderRadius&&b.graphic.attr({r:a.options.borderRadius}),null===b.value&&b.graphic.addClass("highcharts-null-point"))})};f.prototype.getExtremes=function(){var a=c.prototype.getExtremes.call(this,this.valueData),d=a.dataMin;a=a.dataMax;x(d)&&(this.valueMin=d);x(a)&&(this.valueMax=a);return c.prototype.getExtremes.call(this)};
f.prototype.getValidPoints=function(a,d){return c.prototype.getValidPoints.call(this,a,d,!0)};f.prototype.hasData=function(){return!!this.processedXData.length};f.prototype.init=function(){c.prototype.init.apply(this,arguments);var a=this.options;a.pointRange=d(a.pointRange,a.colsize||1);this.yAxis.axisPointRange=a.rowsize||1;y.ellipse=y.circle};f.prototype.markerAttribs=function(a,c){var b=a.marker||{},d=this.options.marker||{},f=a.shapeArgs||{},g={};if(a.hasImage)return{x:a.plotX,y:a.plotY};if(c){var e=
d.states[c]||{};var k=b.states&&b.states[c]||{};[["width","x"],["height","y"]].forEach(function(a){g[a[0]]=(k[a[0]]||e[a[0]]||f[a[0]])+(k[a[0]+"Plus"]||e[a[0]+"Plus"]||0);g[a[1]]=f[a[1]]+(f[a[0]]-g[a[0]])/2})}return c?g:f};f.prototype.pointAttribs=function(b,d){var f=c.prototype.pointAttribs.call(this,b,d),g=this.options||{},e=this.chart.options.plotOptions||{},h=e.series||{},l=e.heatmap||{};e=b&&b.options.borderColor||g.borderColor||l.borderColor||h.borderColor;h=b&&b.options.borderWidth||g.borderWidth||
l.borderWidth||h.borderWidth||f["stroke-width"];f.stroke=b&&b.marker&&b.marker.lineColor||g.marker&&g.marker.lineColor||e||this.color;f["stroke-width"]=h;d&&(b=k(g.states[d],g.marker&&g.marker.states[d],b&&b.options.states&&b.options.states[d]||{}),d=b.brightness,f.fill=b.color||a.parse(f.fill).brighten(d||0).get(),f.stroke=b.lineColor);return f};f.prototype.setClip=function(a){var b=this.chart;c.prototype.setClip.apply(this,arguments);(!1!==this.options.clip||a)&&this.markerGroup.clip((a||this.clipBox)&&
this.sharedClipKey?b.sharedClips[this.sharedClipKey]:b.clipRect)};f.prototype.translate=function(){var a=this.options,c=a.marker&&a.marker.symbol||"rect",d=y[c]?c:"rect",f=-1!==["circle","square"].indexOf(d);this.generatePoints();this.points.forEach(function(a){var b=a.getCellAttributes(),e={};e.x=Math.min(b.x1,b.x2);e.y=Math.min(b.y1,b.y2);e.width=Math.max(Math.abs(b.x2-b.x1),0);e.height=Math.max(Math.abs(b.y2-b.y1),0);var g=a.hasImage=0===(a.marker&&a.marker.symbol||c||"").indexOf("url");if(f){var h=
Math.abs(e.width-e.height);e.x=Math.min(b.x1,b.x2)+(e.width<e.height?0:h/2);e.y=Math.min(b.y1,b.y2)+(e.width<e.height?h/2:0);e.width=e.height=Math.min(e.width,e.height)}h={plotX:(b.x1+b.x2)/2,plotY:(b.y1+b.y2)/2,clientX:(b.x1+b.x2)/2,shapeType:"path",shapeArgs:k(!0,e,{d:y[d](e.x,e.y,e.width,e.height)})};g&&(a.marker={width:e.width,height:e.height});C(a,h)});u(this,"afterTranslate")};f.defaultOptions=k(D.defaultOptions,{animation:!1,borderRadius:0,borderWidth:0,nullColor:B.neutralColor3,dataLabels:{formatter:function(){var a=
this.series.chart.numberFormatter,c=this.point.value;return x(c)?a(c,-1):""},inside:!0,verticalAlign:"middle",crop:!1,overflow:!1,padding:0},marker:{symbol:"rect",radius:0,lineColor:void 0,states:{hover:{lineWidthPlus:0},select:{}}},clip:!0,pointRange:null,tooltip:{pointFormat:"{point.x}, {point.y}: {point.value}<br/>"},states:{hover:{halo:!1,brightness:.2}}});return f}(D);C(t.prototype,{alignDataLabel:v.prototype.alignDataLabel,axisTypes:h.axisTypes,colorAttribs:h.colorAttribs,colorKey:h.colorKey,
directTouch:!0,drawLegendSymbol:p.drawRectangle,getExtremesFromAll:!0,getSymbol:c.prototype.getSymbol,parallelArrays:h.parallelArrays,pointArrayMap:["y","value"],pointClass:m,trackerGroups:h.trackerGroups});n.registerSeriesType("heatmap",t);"";"";return t});p(a,"masters/modules/heatmap.src.js",[a["Core/Globals.js"],a["Core/Axis/Color/ColorAxis.js"]],function(a,h){a.ColorAxis=h;h.compose(a.Chart,a.Fx,a.Legend,a.Series)})});
//# sourceMappingURL=heatmap.js.map