{{--highchart--}}
<script>
    /*
 Highcharts JS v9.1.2 (2021-06-16)

 (c) 2009-2021 Torstein Honsi

 License: www.highcharts.com/license
*/
    'use strict';
    (function (X, L) {
        "object" === typeof module && module.exports ? (L["default"] = L, module.exports = X.document ? L(X) : L) : "function" === typeof define && define.amd ? define("highcharts/highcharts", function () {
            return L(X)
        }) : (X.Highcharts && X.Highcharts.error(16, !0), X.Highcharts = L(X))
    })("undefined" !== typeof window ? window : this, function (X) {
        function L(v, a, E, H) {
            v.hasOwnProperty(a) || (v[a] = H.apply(null, E))
        }

        var a = {};
        L(a, "Core/Globals.js", [], function () {
            var v = "undefined" !== typeof X ? X : "undefined" !== typeof window ? window :
                {}, a;
            (function (a) {
                a.SVG_NS = "http://www.w3.org/2000/svg";
                a.product = "Highcharts";
                a.version = "9.1.2";
                a.win = v;
                a.doc = a.win.document;
                a.svg = a.doc && a.doc.createElementNS && !!a.doc.createElementNS(a.SVG_NS, "svg").createSVGRect;
                a.userAgent = a.win.navigator && a.win.navigator.userAgent || "";
                a.isChrome = -1 !== a.userAgent.indexOf("Chrome");
                a.isFirefox = -1 !== a.userAgent.indexOf("Firefox");
                a.isMS = /(edge|msie|trident)/i.test(a.userAgent) && !a.win.opera;
                a.isSafari = !a.isChrome && -1 !== a.userAgent.indexOf("Safari");
                a.isTouchDevice =
                    /(Mobile|Android|Windows Phone)/.test(a.userAgent);
                a.isWebKit = -1 !== a.userAgent.indexOf("AppleWebKit");
                a.deg2rad = 2 * Math.PI / 360;
                a.hasBidiBug = a.isFirefox && 4 > parseInt(a.userAgent.split("Firefox/")[1], 10);
                a.hasTouch = !!a.win.TouchEvent;
                a.marginNames = ["plotTop", "marginRight", "marginBottom", "plotLeft"];
                a.noop = function () {
                };
                a.supportsPassiveEvents = function () {
                    var v = !1;
                    if (!a.isMS) {
                        var u = Object.defineProperty({}, "passive", {
                            get: function () {
                                v = !0
                            }
                        });
                        a.win.addEventListener && a.win.removeEventListener && (a.win.addEventListener("testPassive",
                            a.noop, u), a.win.removeEventListener("testPassive", a.noop, u))
                    }
                    return v
                }();
                a.charts = [];
                a.dateFormats = {};
                a.seriesTypes = {};
                a.symbolSizes = {};
                a.chartCount = 0
            })(a || (a = {}));
            return a
        });
        L(a, "Core/Utilities.js", [a["Core/Globals.js"]], function (a) {
            function v(b, d, g, r) {
                var D = d ? "Highcharts error" : "Highcharts warning";
                32 === b && (b = D + ": Deprecated member");
                var C = h(b), M = C ? D + " #" + b + ": www.highcharts.com/errors/" + b + "/" : b.toString();
                if ("undefined" !== typeof r) {
                    var l = "";
                    C && (M += "?");
                    J(r, function (b, Q) {
                        l += "\n - " + Q + ": " + b;
                        C &&
                        (M += encodeURI(Q) + "=" + encodeURI(b))
                    });
                    M += l
                }
                A(a, "displayError", {chart: g, code: b, message: M, params: r}, function () {
                    if (d) throw Error(M);
                    k.console && -1 === v.messages.indexOf(M) && console.warn(M)
                });
                v.messages.push(M)
            }

            function E(b, d) {
                var D = {};
                J(b, function (g, k) {
                    if (G(b[k], !0) && !b.nodeType && d[k]) g = E(b[k], d[k]), Object.keys(g).length && (D[k] = g); else if (G(b[k]) || b[k] !== d[k]) D[k] = b[k]
                });
                return D
            }

            function H(b, d) {
                return parseInt(b, d || 10)
            }

            function x(b) {
                return "string" === typeof b
            }

            function y(b) {
                b = Object.prototype.toString.call(b);
                return "[object Array]" === b || "[object Array Iterator]" === b
            }

            function G(b, d) {
                return !!b && "object" === typeof b && (!d || !y(b))
            }

            function B(b) {
                return G(b) && "number" === typeof b.nodeType
            }

            function q(b) {
                var d = b && b.constructor;
                return !(!G(b, !0) || B(b) || !d || !d.name || "Object" === d.name)
            }

            function h(b) {
                return "number" === typeof b && !isNaN(b) && Infinity > b && -Infinity < b
            }

            function f(b) {
                return "undefined" !== typeof b && null !== b
            }

            function c(b, d, g) {
                var k;
                x(d) ? f(g) ? b.setAttribute(d, g) : b && b.getAttribute && ((k = b.getAttribute(d)) || "class" !==
                    d || (k = b.getAttribute(d + "Name"))) : J(d, function (d, g) {
                    b.setAttribute(g, d)
                });
                return k
            }

            function e(b, d) {
                var g;
                b || (b = {});
                for (g in d) b[g] = d[g];
                return b
            }

            function t() {
                for (var b = arguments, d = b.length, g = 0; g < d; g++) {
                    var k = b[g];
                    if ("undefined" !== typeof k && null !== k) return k
                }
            }

            function m(b, d) {
                a.isMS && !a.svg && d && "undefined" !== typeof d.opacity && (d.filter = "alpha(opacity=" + 100 * d.opacity + ")");
                e(b.style, d)
            }

            function w(b, g, k, r, l) {
                b = d.createElement(b);
                g && e(b, g);
                l && m(b, {padding: "0", border: "none", margin: "0"});
                k && m(b, k);
                r && r.appendChild(b);
                return b
            }

            function n(b, d) {
                return parseFloat(b.toPrecision(d || 14))
            }

            function l(b, d, g) {
                var D = a.getStyle || l;
                if ("width" === d) return d = Math.min(b.offsetWidth, b.scrollWidth), g = b.getBoundingClientRect && b.getBoundingClientRect().width, g < d && g >= d - 1 && (d = Math.floor(g)), Math.max(0, d - (D(b, "padding-left", !0) || 0) - (D(b, "padding-right", !0) || 0));
                if ("height" === d) return Math.max(0, Math.min(b.offsetHeight, b.scrollHeight) - (D(b, "padding-top", !0) || 0) - (D(b, "padding-bottom", !0) || 0));
                k.getComputedStyle || v(27, !0);
                if (b = k.getComputedStyle(b,
                    void 0)) {
                    var r = b.getPropertyValue(d);
                    t(g, "opacity" !== d) && (r = H(r))
                }
                return r
            }

            function J(b, d, g) {
                for (var k in b) Object.hasOwnProperty.call(b, k) && d.call(g || b[k], b[k], k, b)
            }

            function K(b, d, g) {
                function k(d, z) {
                    var Q = b.removeEventListener || a.removeEventListenerPolyfill;
                    Q && Q.call(b, d, z, !1)
                }

                function r(g) {
                    var z;
                    if (b.nodeName) {
                        if (d) {
                            var Q = {};
                            Q[d] = !0
                        } else Q = g;
                        J(Q, function (b, d) {
                            if (g[d]) for (z = g[d].length; z--;) k(d, g[d][z].fn)
                        })
                    }
                }

                var D = "function" === typeof b && b.prototype || b;
                if (Object.hasOwnProperty.call(D, "hcEvents")) {
                    var l =
                        D.hcEvents;
                    d ? (D = l[d] || [], g ? (l[d] = D.filter(function (b) {
                        return g !== b.fn
                    }), k(d, g)) : (r(l), l[d] = [])) : (r(l), delete D.hcEvents)
                }
            }

            function A(b, g, k, r) {
                k = k || {};
                if (d.createEvent && (b.dispatchEvent || b.fireEvent && b !== a)) {
                    var D = d.createEvent("Events");
                    D.initEvent(g, !0, !0);
                    k = e(D, k);
                    b.dispatchEvent ? b.dispatchEvent(k) : b.fireEvent(g, k)
                } else if (b.hcEvents) {
                    k.target || e(k, {
                        preventDefault: function () {
                            k.defaultPrevented = !0
                        }, target: b, type: g
                    });
                    D = [];
                    for (var l = b, C = !1; l.hcEvents;) Object.hasOwnProperty.call(l, "hcEvents") && l.hcEvents[g] &&
                    (D.length && (C = !0), D.unshift.apply(D, l.hcEvents[g])), l = Object.getPrototypeOf(l);
                    C && D.sort(function (b, z) {
                        return b.order - z.order
                    });
                    D.forEach(function (d) {
                        !1 === d.fn.call(b, k) && k.preventDefault()
                    })
                }
                r && !k.defaultPrevented && r.call(b, k)
            }

            var p = a.charts, d = a.doc, k = a.win;
            "";
            (v || (v = {})).messages = [];
            var b;
            Math.easeInOutSine = function (b) {
                return -.5 * (Math.cos(Math.PI * b) - 1)
            };
            var g = Array.prototype.find ? function (b, d) {
                return b.find(d)
            } : function (b, d) {
                var g, k = b.length;
                for (g = 0; g < k; g++) if (d(b[g], g)) return b[g]
            };
            J({
                map: "map",
                each: "forEach", grep: "filter", reduce: "reduce", some: "some"
            }, function (b, d) {
                a[d] = function (g) {
                    var k;
                    v(32, !1, void 0, (k = {}, k["Highcharts." + d] = "use Array." + b, k));
                    return Array.prototype[b].apply(g, [].slice.call(arguments, 1))
                }
            });
            var r, F = function () {
                var b = Math.random().toString(36).substring(2, 9) + "-", d = 0;
                return function () {
                    return "highcharts-" + (r ? "" : b) + d++
                }
            }();
            k.jQuery && (k.jQuery.fn.highcharts = function () {
                var b = [].slice.call(arguments);
                if (this[0]) return b[0] ? (new (a[x(b[0]) ? b.shift() : "Chart"])(this[0], b[0], b[1]),
                    this) : p[c(this[0], "data-highcharts-chart")]
            });
            return {
                addEvent: function (b, d, g, k) {
                    void 0 === k && (k = {});
                    var r = "function" === typeof b && b.prototype || b;
                    Object.hasOwnProperty.call(r, "hcEvents") || (r.hcEvents = {});
                    r = r.hcEvents;
                    a.Point && b instanceof a.Point && b.series && b.series.chart && (b.series.chart.runTrackerClick = !0);
                    var l = b.addEventListener || a.addEventListenerPolyfill;
                    l && l.call(b, d, g, a.supportsPassiveEvents ? {
                        passive: void 0 === k.passive ? -1 !== d.indexOf("touch") : k.passive,
                        capture: !1
                    } : !1);
                    r[d] || (r[d] = []);
                    r[d].push({
                        fn: g,
                        order: "number" === typeof k.order ? k.order : Infinity
                    });
                    r[d].sort(function (b, d) {
                        return b.order - d.order
                    });
                    return function () {
                        K(b, d, g)
                    }
                },
                arrayMax: function (b) {
                    for (var d = b.length, g = b[0]; d--;) b[d] > g && (g = b[d]);
                    return g
                },
                arrayMin: function (b) {
                    for (var d = b.length, g = b[0]; d--;) b[d] < g && (g = b[d]);
                    return g
                },
                attr: c,
                clamp: function (b, d, g) {
                    return b > d ? b < g ? b : g : d
                },
                cleanRecursively: E,
                clearTimeout: function (b) {
                    f(b) && clearTimeout(b)
                },
                correctFloat: n,
                createElement: w,
                css: m,
                defined: f,
                destroyObjectProperties: function (b, d) {
                    J(b, function (g,
                                   k) {
                        g && g !== d && g.destroy && g.destroy();
                        delete b[k]
                    })
                },
                discardElement: function (d) {
                    b || (b = w("div"));
                    d && b.appendChild(d);
                    b.innerHTML = ""
                },
                erase: function (b, d) {
                    for (var g = b.length; g--;) if (b[g] === d) {
                        b.splice(g, 1);
                        break
                    }
                },
                error: v,
                extend: e,
                extendClass: function (b, d) {
                    var g = function () {
                    };
                    g.prototype = new b;
                    e(g.prototype, d);
                    return g
                },
                find: g,
                fireEvent: A,
                getMagnitude: function (b) {
                    return Math.pow(10, Math.floor(Math.log(b) / Math.LN10))
                },
                getNestedProperty: function (b, d) {
                    for (b = b.split("."); b.length && f(d);) {
                        var g = b.shift();
                        if ("undefined" ===
                            typeof g || "__proto__" === g) return;
                        d = d[g];
                        if (!f(d) || "function" === typeof d || "number" === typeof d.nodeType || d === k) return
                    }
                    return d
                },
                getStyle: l,
                inArray: function (b, d, g) {
                    v(32, !1, void 0, {"Highcharts.inArray": "use Array.indexOf"});
                    return d.indexOf(b, g)
                },
                isArray: y,
                isClass: q,
                isDOMElement: B,
                isFunction: function (b) {
                    return "function" === typeof b
                },
                isNumber: h,
                isObject: G,
                isString: x,
                keys: function (b) {
                    v(32, !1, void 0, {"Highcharts.keys": "use Object.keys"});
                    return Object.keys(b)
                },
                merge: function () {
                    var b, d = arguments, g = {}, k = function (b,
                                                                d) {
                        "object" !== typeof b && (b = {});
                        J(d, function (g, z) {
                            "__proto__" !== z && "constructor" !== z && (!G(g, !0) || q(g) || B(g) ? b[z] = d[z] : b[z] = k(b[z] || {}, g))
                        });
                        return b
                    };
                    !0 === d[0] && (g = d[1], d = Array.prototype.slice.call(d, 2));
                    var r = d.length;
                    for (b = 0; b < r; b++) g = k(g, d[b]);
                    return g
                },
                normalizeTickInterval: function (b, d, g, k, r) {
                    var l = b;
                    g = t(g, 1);
                    var c = b / g;
                    d || (d = r ? [1, 1.2, 1.5, 2, 2.5, 3, 4, 5, 6, 8, 10] : [1, 2, 2.5, 5, 10], !1 === k && (1 === g ? d = d.filter(function (b) {
                        return 0 === b % 1
                    }) : .1 >= g && (d = [1 / g])));
                    for (k = 0; k < d.length && !(l = d[k], r && l * g >= b || !r && c <= (d[k] +
                        (d[k + 1] || d[k])) / 2); k++) ;
                    return l = n(l * g, -Math.round(Math.log(.001) / Math.LN10))
                },
                objectEach: J,
                offset: function (b) {
                    var g = d.documentElement;
                    b = b.parentElement || b.parentNode ? b.getBoundingClientRect() : {
                        top: 0,
                        left: 0,
                        width: 0,
                        height: 0
                    };
                    return {
                        top: b.top + (k.pageYOffset || g.scrollTop) - (g.clientTop || 0),
                        left: b.left + (k.pageXOffset || g.scrollLeft) - (g.clientLeft || 0),
                        width: b.width,
                        height: b.height
                    }
                },
                pad: function (b, d, g) {
                    return Array((d || 2) + 1 - String(b).replace("-", "").length).join(g || "0") + b
                },
                pick: t,
                pInt: H,
                relativeLength: function (b,
                                          d, g) {
                    return /%$/.test(b) ? d * parseFloat(b) / 100 + (g || 0) : parseFloat(b)
                },
                removeEvent: K,
                splat: function (b) {
                    return y(b) ? b : [b]
                },
                stableSort: function (b, d) {
                    var g = b.length, k, r;
                    for (r = 0; r < g; r++) b[r].safeI = r;
                    b.sort(function (b, g) {
                        k = d(b, g);
                        return 0 === k ? b.safeI - g.safeI : k
                    });
                    for (r = 0; r < g; r++) delete b[r].safeI
                },
                syncTimeout: function (b, d, g) {
                    if (0 < d) return setTimeout(b, d, g);
                    b.call(0, g);
                    return -1
                },
                timeUnits: {
                    millisecond: 1,
                    second: 1E3,
                    minute: 6E4,
                    hour: 36E5,
                    day: 864E5,
                    week: 6048E5,
                    month: 24192E5,
                    year: 314496E5
                },
                uniqueKey: F,
                useSerialIds: function (b) {
                    return r =
                        t(b, r)
                },
                wrap: function (b, d, g) {
                    var k = b[d];
                    b[d] = function () {
                        var b = Array.prototype.slice.call(arguments), d = arguments, r = this;
                        r.proceed = function () {
                            k.apply(r, arguments.length ? arguments : d)
                        };
                        b.unshift(k);
                        b = g.apply(this, b);
                        r.proceed = null;
                        return b
                    }
                }
            }
        });
        L(a, "Core/Color/Palette.js", [], function () {
            return {
                colors: "#7cb5ec #434348 #90ed7d #f7a35c #8085e9 #f15c80 #e4d354 #2b908f #f45b5b #91e8e1".split(" "),
                backgroundColor: "#ffffff",
                neutralColor100: "#000000",
                neutralColor80: "#333333",
                neutralColor60: "#666666",
                neutralColor40: "#999999",
                neutralColor20: "#cccccc",
                neutralColor10: "#e6e6e6",
                neutralColor5: "#f2f2f2",
                neutralColor3: "#f7f7f7",
                highlightColor100: "#003399",
                highlightColor80: "#335cad",
                highlightColor60: "#6685c2",
                highlightColor20: "#ccd6eb",
                highlightColor10: "#e6ebf5",
                positiveColor: "#06b535",
                negativeColor: "#f21313"
            }
        });
        L(a, "Core/Chart/ChartDefaults.js", [a["Core/Color/Palette.js"]], function (a) {
            return {
                panning: {enabled: !1, type: "x"},
                styledMode: !1,
                borderRadius: 0,
                colorCount: 10,
                defaultSeriesType: "line",
                ignoreHiddenSeries: !0,
                spacing: [10, 10,
                    15, 10],
                resetZoomButton: {theme: {zIndex: 6}, position: {align: "right", x: -10, y: 10}},
                zoomBySingleTouch: !1,
                width: null,
                height: null,
                borderColor: a.highlightColor80,
                backgroundColor: a.backgroundColor,
                plotBorderColor: a.neutralColor20
            }
        });
        L(a, "Core/Color/Color.js", [a["Core/Globals.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = u.isNumber, H = u.merge, x = u.pInt;
            u = function () {
                function u(v) {
                    this.parsers = [{
                        regex: /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]?(?:\.[0-9]+)?)\s*\)/,
                        parse: function (q) {
                            return [x(q[1]),
                                x(q[2]), x(q[3]), parseFloat(q[4], 10)]
                        }
                    }, {
                        regex: /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/, parse: function (q) {
                            return [x(q[1]), x(q[2]), x(q[3]), 1]
                        }
                    }];
                    this.rgba = [];
                    var B = a.Color;
                    if (B && B !== u) return new B(v);
                    if (!(this instanceof u)) return new u(v);
                    this.init(v)
                }

                u.parse = function (a) {
                    return new u(a)
                };
                u.prototype.init = function (a) {
                    var B, q;
                    if ((this.input = a = u.names[a && a.toLowerCase ? a.toLowerCase() : ""] || a) && a.stops) this.stops = a.stops.map(function (c) {
                        return new u(c[1])
                    }); else {
                        if (a && a.charAt &&
                            "#" === a.charAt()) {
                            var h = a.length;
                            a = parseInt(a.substr(1), 16);
                            7 === h ? B = [(a & 16711680) >> 16, (a & 65280) >> 8, a & 255, 1] : 4 === h && (B = [(a & 3840) >> 4 | (a & 3840) >> 8, (a & 240) >> 4 | a & 240, (a & 15) << 4 | a & 15, 1])
                        }
                        if (!B) for (q = this.parsers.length; q-- && !B;) {
                            var f = this.parsers[q];
                            (h = f.regex.exec(a)) && (B = f.parse(h))
                        }
                    }
                    this.rgba = B || []
                };
                u.prototype.get = function (a) {
                    var B = this.input, q = this.rgba;
                    if ("undefined" !== typeof this.stops) {
                        var h = H(B);
                        h.stops = [].concat(h.stops);
                        this.stops.forEach(function (f, c) {
                            h.stops[c] = [h.stops[c][0], f.get(a)]
                        })
                    } else h =
                        q && v(q[0]) ? "rgb" === a || !a && 1 === q[3] ? "rgb(" + q[0] + "," + q[1] + "," + q[2] + ")" : "a" === a ? q[3] : "rgba(" + q.join(",") + ")" : B;
                    return h
                };
                u.prototype.brighten = function (a) {
                    var B, q = this.rgba;
                    if (this.stops) this.stops.forEach(function (h) {
                        h.brighten(a)
                    }); else if (v(a) && 0 !== a) for (B = 0; 3 > B; B++) q[B] += x(255 * a), 0 > q[B] && (q[B] = 0), 255 < q[B] && (q[B] = 255);
                    return this
                };
                u.prototype.setOpacity = function (a) {
                    this.rgba[3] = a;
                    return this
                };
                u.prototype.tweenTo = function (a, B) {
                    var q = this.rgba, h = a.rgba;
                    h.length && q && q.length ? (a = 1 !== h[3] || 1 !== q[3], B = (a ?
                        "rgba(" : "rgb(") + Math.round(h[0] + (q[0] - h[0]) * (1 - B)) + "," + Math.round(h[1] + (q[1] - h[1]) * (1 - B)) + "," + Math.round(h[2] + (q[2] - h[2]) * (1 - B)) + (a ? "," + (h[3] + (q[3] - h[3]) * (1 - B)) : "") + ")") : B = a.input || "none";
                    return B
                };
                u.names = {white: "#ffffff", black: "#000000"};
                return u
            }();
            "";
            return u
        });
        L(a, "Core/Time.js", [a["Core/Globals.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = a.win, H = u.defined, x = u.error, y = u.extend, G = u.isObject, B = u.merge, q = u.objectEach,
                h = u.pad, f = u.pick, c = u.splat, e = u.timeUnits,
                t = a.isSafari && Intl && Intl.DateTimeFormat.prototype.formatRange,
                m = a.isSafari && Intl && !Intl.DateTimeFormat.prototype.formatRange;
            u = function () {
                function w(c) {
                    this.options = {};
                    this.variableTimezone = this.useUTC = !1;
                    this.Date = v.Date;
                    this.getTimezoneOffset = this.timezoneOffsetFunction();
                    this.update(c)
                }

                w.prototype.get = function (c, l) {
                    if (this.variableTimezone || this.timezoneOffset) {
                        var e = l.getTime(), n = e - this.getTimezoneOffset(l);
                        l.setTime(n);
                        c = l["getUTC" + c]();
                        l.setTime(e);
                        return c
                    }
                    return this.useUTC ? l["getUTC" + c]() : l["get" + c]()
                };
                w.prototype.set = function (c, l, e) {
                    if (this.variableTimezone ||
                        this.timezoneOffset) {
                        if ("Milliseconds" === c || "Seconds" === c || "Minutes" === c && 0 === this.getTimezoneOffset(l) % 36E5) return l["setUTC" + c](e);
                        var n = this.getTimezoneOffset(l);
                        n = l.getTime() - n;
                        l.setTime(n);
                        l["setUTC" + c](e);
                        c = this.getTimezoneOffset(l);
                        n = l.getTime() + c;
                        return l.setTime(n)
                    }
                    return this.useUTC || t && "FullYear" === c ? l["setUTC" + c](e) : l["set" + c](e)
                };
                w.prototype.update = function (c) {
                    var l = f(c && c.useUTC, !0);
                    this.options = c = B(!0, this.options || {}, c);
                    this.Date = c.Date || v.Date || Date;
                    this.timezoneOffset = (this.useUTC =
                        l) && c.timezoneOffset;
                    this.getTimezoneOffset = this.timezoneOffsetFunction();
                    this.variableTimezone = l && !(!c.getTimezoneOffset && !c.timezone)
                };
                w.prototype.makeTime = function (c, l, e, h, t, p) {
                    if (this.useUTC) {
                        var d = this.Date.UTC.apply(0, arguments);
                        var k = this.getTimezoneOffset(d);
                        d += k;
                        var b = this.getTimezoneOffset(d);
                        k !== b ? d += b - k : k - 36E5 !== this.getTimezoneOffset(d - 36E5) || m || (d -= 36E5)
                    } else d = (new this.Date(c, l, f(e, 1), f(h, 0), f(t, 0), f(p, 0))).getTime();
                    return d
                };
                w.prototype.timezoneOffsetFunction = function () {
                    var c = this,
                        l = this.options, e = l.moment || v.moment;
                    if (!this.useUTC) return function (l) {
                        return 6E4 * (new Date(l.toString())).getTimezoneOffset()
                    };
                    if (l.timezone) {
                        if (e) return function (c) {
                            return 6E4 * -e.tz(c, l.timezone).utcOffset()
                        };
                        x(25)
                    }
                    return this.useUTC && l.getTimezoneOffset ? function (c) {
                        return 6E4 * l.getTimezoneOffset(c.valueOf())
                    } : function () {
                        return 6E4 * (c.timezoneOffset || 0)
                    }
                };
                w.prototype.dateFormat = function (c, l, e) {
                    if (!H(l) || isNaN(l)) return a.defaultOptions.lang && a.defaultOptions.lang.invalidDate || "";
                    c = f(c, "%Y-%m-%d %H:%M:%S");
                    var n = this, t = new this.Date(l), p = this.get("Hours", t), d = this.get("Day", t),
                        k = this.get("Date", t), b = this.get("Month", t), g = this.get("FullYear", t),
                        r = a.defaultOptions.lang, F = r && r.weekdays, D = r && r.shortWeekdays;
                    t = y({
                        a: D ? D[d] : F[d].substr(0, 3),
                        A: F[d],
                        d: h(k),
                        e: h(k, 2, " "),
                        w: d,
                        b: r.shortMonths[b],
                        B: r.months[b],
                        m: h(b + 1),
                        o: b + 1,
                        y: g.toString().substr(2, 2),
                        Y: g,
                        H: h(p),
                        k: p,
                        I: h(p % 12 || 12),
                        l: p % 12 || 12,
                        M: h(this.get("Minutes", t)),
                        p: 12 > p ? "AM" : "PM",
                        P: 12 > p ? "am" : "pm",
                        S: h(t.getSeconds()),
                        L: h(Math.floor(l % 1E3), 3)
                    }, a.dateFormats);
                    q(t,
                        function (b, d) {
                            for (; -1 !== c.indexOf("%" + d);) c = c.replace("%" + d, "function" === typeof b ? b.call(n, l) : b)
                        });
                    return e ? c.substr(0, 1).toUpperCase() + c.substr(1) : c
                };
                w.prototype.resolveDTLFormat = function (e) {
                    return G(e, !0) ? e : (e = c(e), {main: e[0], from: e[1], to: e[2]})
                };
                w.prototype.getTimeTicks = function (c, l, t, h) {
                    var n = this, p = [], d = {}, k = new n.Date(l), b = c.unitRange, g = c.count || 1, r;
                    h = f(h, 1);
                    if (H(l)) {
                        n.set("Milliseconds", k, b >= e.second ? 0 : g * Math.floor(n.get("Milliseconds", k) / g));
                        b >= e.second && n.set("Seconds", k, b >= e.minute ? 0 : g *
                            Math.floor(n.get("Seconds", k) / g));
                        b >= e.minute && n.set("Minutes", k, b >= e.hour ? 0 : g * Math.floor(n.get("Minutes", k) / g));
                        b >= e.hour && n.set("Hours", k, b >= e.day ? 0 : g * Math.floor(n.get("Hours", k) / g));
                        b >= e.day && n.set("Date", k, b >= e.month ? 1 : Math.max(1, g * Math.floor(n.get("Date", k) / g)));
                        if (b >= e.month) {
                            n.set("Month", k, b >= e.year ? 0 : g * Math.floor(n.get("Month", k) / g));
                            var F = n.get("FullYear", k)
                        }
                        b >= e.year && n.set("FullYear", k, F - F % g);
                        b === e.week && (F = n.get("Day", k), n.set("Date", k, n.get("Date", k) - F + h + (F < h ? -7 : 0)));
                        F = n.get("FullYear",
                            k);
                        h = n.get("Month", k);
                        var D = n.get("Date", k), m = n.get("Hours", k);
                        l = k.getTime();
                        !n.variableTimezone && n.useUTC || !H(t) || (r = t - l > 4 * e.month || n.getTimezoneOffset(l) !== n.getTimezoneOffset(t));
                        l = k.getTime();
                        for (k = 1; l < t;) p.push(l), l = b === e.year ? n.makeTime(F + k * g, 0) : b === e.month ? n.makeTime(F, h + k * g) : !r || b !== e.day && b !== e.week ? r && b === e.hour && 1 < g ? n.makeTime(F, h, D, m + k * g) : l + b * g : n.makeTime(F, h, D + k * g * (b === e.day ? 1 : 7)), k++;
                        p.push(l);
                        b <= e.hour && 1E4 > p.length && p.forEach(function (b) {
                            0 === b % 18E5 && "000000000" === n.dateFormat("%H%M%S%L",
                                b) && (d[b] = "day")
                        })
                    }
                    p.info = y(c, {higherRanks: d, totalRange: b * g});
                    return p
                };
                return w
            }();
            "";
            return u
        });
        L(a, "Core/DefaultOptions.js", [a["Core/Globals.js"], a["Core/Chart/ChartDefaults.js"], a["Core/Color/Color.js"], a["Core/Color/Palette.js"], a["Core/Time.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y) {
            var v = a.isTouchDevice, B = a.svg;
            E = E.parse;
            var q = y.merge;
            "";
            var h = {
                colors: H.colors,
                symbols: ["circle", "diamond", "square", "triangle", "triangle-down"],
                lang: {
                    loading: "Loading...",
                    months: "January February March April May June July August September October November December".split(" "),
                    shortMonths: "Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),
                    weekdays: "Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" "),
                    decimalPoint: ".",
                    numericSymbols: "kMGTPE".split(""),
                    resetZoom: "Reset zoom",
                    resetZoomTitle: "Reset zoom level 1:1",
                    thousandsSep: " "
                },
                global: {},
                time: {Date: void 0, getTimezoneOffset: void 0, timezone: void 0, timezoneOffset: 0, useUTC: !0},
                chart: u,
                title: {text: "Chart title", align: "center", margin: 15, widthAdjust: -44},
                subtitle: {text: "", align: "center", widthAdjust: -44},
                caption: {margin: 15, text: "", align: "left", verticalAlign: "bottom"},
                plotOptions: {},
                labels: {style: {position: "absolute", color: H.neutralColor80}},
                legend: {
                    enabled: !0,
                    align: "center",
                    alignColumns: !0,
                    className: "highcharts-no-tooltip",
                    layout: "horizontal",
                    labelFormatter: function () {
                        return this.name
                    },
                    borderColor: H.neutralColor40,
                    borderRadius: 0,
                    navigation: {activeColor: H.highlightColor100, inactiveColor: H.neutralColor20},
                    itemStyle: {
                        color: H.neutralColor80,
                        cursor: "pointer",
                        fontSize: "12px",
                        fontWeight: "bold",
                        textOverflow: "ellipsis"
                    },
                    itemHoverStyle: {color: H.neutralColor100},
                    itemHiddenStyle: {color: H.neutralColor20},
                    shadow: !1,
                    itemCheckboxStyle: {position: "absolute", width: "13px", height: "13px"},
                    squareSymbol: !0,
                    symbolPadding: 5,
                    verticalAlign: "bottom",
                    x: 0,
                    y: 0,
                    title: {style: {fontWeight: "bold"}}
                },
                loading: {
                    labelStyle: {fontWeight: "bold", position: "relative", top: "45%"},
                    style: {position: "absolute", backgroundColor: H.backgroundColor, opacity: .5, textAlign: "center"}
                },
                tooltip: {
                    enabled: !0,
                    animation: B,
                    borderRadius: 3,
                    dateTimeLabelFormats: {
                        millisecond: "%A, %b %e, %H:%M:%S.%L",
                        second: "%A, %b %e, %H:%M:%S",
                        minute: "%A, %b %e, %H:%M",
                        hour: "%A, %b %e, %H:%M",
                        day: "%A, %b %e, %Y",
                        week: "Week from %A, %b %e, %Y",
                        month: "%B %Y",
                        year: "%Y"
                    },
                    footerFormat: "",
                    padding: 8,
                    snap: v ? 25 : 10,
                    headerFormat: '<span style="font-size: 10px">{point.key}</span><br/>',
                    pointFormat: '<span style="color:{point.color}">\u25cf</span> {series.name}: <b>{point.y}</b><br/>',
                    backgroundColor: E(H.neutralColor3).setOpacity(.85).get(),
                    borderWidth: 1,
                    shadow: !0,
                    style: {
                        color: H.neutralColor80, cursor: "default", fontSize: "12px",
                        whiteSpace: "nowrap"
                    }
                },
                credits: {
                    enabled: !0,
                    href: "https://www.highcharts.com?credits",
                    position: {align: "right", x: -10, verticalAlign: "bottom", y: -5},
                    style: {cursor: "pointer", color: H.neutralColor40, fontSize: "9px"},
                    text: "Highcharts.com"
                }
            };
            h.chart.styledMode = !1;
            "";
            var f = new x(q(h.global, h.time));
            return {
                defaultOptions: h, defaultTime: f, getOptions: function () {
                    return h
                }, setOptions: function (c) {
                    q(!0, h, c);
                    if (c.time || c.global) a.time ? a.time.update(q(h.global, h.time, c.global, c.time)) : a.time = f;
                    return h
                }
            }
        });
        L(a, "Core/Animation/Fx.js",
            [a["Core/Color/Color.js"], a["Core/Globals.js"], a["Core/Utilities.js"]], function (a, u, E) {
                var v = a.parse, x = u.win, y = E.isNumber, G = E.objectEach;
                return function () {
                    function a(a, h, f) {
                        this.pos = NaN;
                        this.options = h;
                        this.elem = a;
                        this.prop = f
                    }

                    a.prototype.dSetter = function () {
                        var a = this.paths, h = a && a[0];
                        a = a && a[1];
                        var f = this.now || 0, c = [];
                        if (1 !== f && h && a) if (h.length === a.length && 1 > f) for (var e = 0; e < a.length; e++) {
                            for (var t = h[e], m = a[e], w = [], n = 0; n < m.length; n++) {
                                var l = t[n], J = m[n];
                                y(l) && y(J) && ("A" !== m[0] || 4 !== n && 5 !== n) ? w[n] = l + f * (J -
                                    l) : w[n] = J
                            }
                            c.push(w)
                        } else c = a; else c = this.toD || [];
                        this.elem.attr("d", c, void 0, !0)
                    };
                    a.prototype.update = function () {
                        var a = this.elem, h = this.prop, f = this.now, c = this.options.step;
                        if (this[h + "Setter"]) this[h + "Setter"](); else a.attr ? a.element && a.attr(h, f, null, !0) : a.style[h] = f + this.unit;
                        c && c.call(a, f, this)
                    };
                    a.prototype.run = function (q, h, f) {
                        var c = this, e = c.options, t = function (e) {
                            return t.stopped ? !1 : c.step(e)
                        }, m = x.requestAnimationFrame || function (c) {
                            setTimeout(c, 13)
                        }, w = function () {
                            for (var c = 0; c < a.timers.length; c++) a.timers[c]() ||
                            a.timers.splice(c--, 1);
                            a.timers.length && m(w)
                        };
                        q !== h || this.elem["forceAnimate:" + this.prop] ? (this.startTime = +new Date, this.start = q, this.end = h, this.unit = f, this.now = this.start, this.pos = 0, t.elem = this.elem, t.prop = this.prop, t() && 1 === a.timers.push(t) && m(w)) : (delete e.curAnim[this.prop], e.complete && 0 === Object.keys(e.curAnim).length && e.complete.call(this.elem))
                    };
                    a.prototype.step = function (a) {
                        var h = +new Date, f = this.options, c = this.elem, e = f.complete, t = f.duration,
                            m = f.curAnim;
                        if (c.attr && !c.element) a = !1; else if (a ||
                            h >= t + this.startTime) {
                            this.now = this.end;
                            this.pos = 1;
                            this.update();
                            var w = m[this.prop] = !0;
                            G(m, function (c) {
                                !0 !== c && (w = !1)
                            });
                            w && e && e.call(c);
                            a = !1
                        } else this.pos = f.easing((h - this.startTime) / t), this.now = this.start + (this.end - this.start) * this.pos, this.update(), a = !0;
                        return a
                    };
                    a.prototype.initPath = function (a, h, f) {
                        function c(c, l) {
                            for (; c.length < K;) {
                                var d = c[0], k = l[K - c.length];
                                k && "M" === d[0] && (c[0] = "C" === k[0] ? ["C", d[1], d[2], d[1], d[2], d[1], d[2]] : ["L", d[1], d[2]]);
                                c.unshift(d);
                                w && (d = c.pop(), c.push(c[c.length - 1], d))
                            }
                        }

                        function e(c, l) {
                            for (; c.length < K;) if (l = c[Math.floor(c.length / n) - 1].slice(), "C" === l[0] && (l[1] = l[5], l[2] = l[6]), w) {
                                var d = c[Math.floor(c.length / n)].slice();
                                c.splice(c.length / 2, 0, l, d)
                            } else c.push(l)
                        }

                        var t = a.startX, m = a.endX;
                        f = f.slice();
                        var w = a.isArea, n = w ? 2 : 1;
                        h = h && h.slice();
                        if (!h) return [f, f];
                        if (t && m && m.length) {
                            for (a = 0; a < t.length; a++) if (t[a] === m[0]) {
                                var l = a;
                                break
                            } else if (t[0] === m[m.length - t.length + a]) {
                                l = a;
                                var J = !0;
                                break
                            } else if (t[t.length - 1] === m[m.length - t.length + a]) {
                                l = t.length - a;
                                break
                            }
                            "undefined" === typeof l &&
                            (h = [])
                        }
                        if (h.length && y(l)) {
                            var K = f.length + l * n;
                            J ? (c(h, f), e(f, h)) : (c(f, h), e(h, f))
                        }
                        return [h, f]
                    };
                    a.prototype.fillSetter = function () {
                        a.prototype.strokeSetter.apply(this, arguments)
                    };
                    a.prototype.strokeSetter = function () {
                        this.elem.attr(this.prop, v(this.start).tweenTo(v(this.end), this.pos), null, !0)
                    };
                    a.timers = [];
                    return a
                }()
            });
        L(a, "Core/Animation/AnimationUtilities.js", [a["Core/Animation/Fx.js"], a["Core/Utilities.js"]], function (a, u) {
            function v(c) {
                return q(c) ? h({duration: 500, defer: 0}, c) : {duration: c ? 500 : 0, defer: 0}
            }

            function H(c, f) {
                for (var e = a.timers.length; e--;) a.timers[e].elem !== c || f && f !== a.timers[e].prop || (a.timers[e].stopped = !0)
            }

            var x = u.defined, y = u.getStyle, G = u.isArray, B = u.isNumber, q = u.isObject, h = u.merge,
                f = u.objectEach, c = u.pick;
            return {
                animate: function (c, t, m) {
                    var e, n = "", l, J;
                    if (!q(m)) {
                        var K = arguments;
                        m = {duration: K[2], easing: K[3], complete: K[4]}
                    }
                    B(m.duration) || (m.duration = 400);
                    m.easing = "function" === typeof m.easing ? m.easing : Math[m.easing] || Math.easeInOutSine;
                    m.curAnim = h(t);
                    f(t, function (f, p) {
                        H(c, p);
                        J = new a(c, m,
                            p);
                        l = void 0;
                        "d" === p && G(t.d) ? (J.paths = J.initPath(c, c.pathArray, t.d), J.toD = t.d, e = 0, l = 1) : c.attr ? e = c.attr(p) : (e = parseFloat(y(c, p)) || 0, "opacity" !== p && (n = "px"));
                        l || (l = f);
                        "string" === typeof l && l.match("px") && (l = l.replace(/px/g, ""));
                        J.run(e, l, n)
                    })
                }, animObject: v, getDeferredAnimation: function (c, a, f) {
                    var e = v(a), n = 0, l = 0;
                    (f ? [f] : c.series).forEach(function (c) {
                        c = v(c.options.animation);
                        n = a && x(a.defer) ? e.defer : Math.max(n, c.duration + c.defer);
                        l = Math.min(e.duration, c.duration)
                    });
                    c.renderer.forExport && (n = 0);
                    return {
                        defer: Math.max(0,
                            n - l), duration: Math.min(n, l)
                    }
                }, setAnimation: function (e, a) {
                    a.renderer.globalAnimation = c(e, a.options.chart.animation, !0)
                }, stop: H
            }
        });
        L(a, "Core/Renderer/HTML/AST.js", [a["Core/Globals.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = a.SVG_NS, H = u.attr, x = u.createElement, y = u.discardElement, G = u.error, B = u.isString,
                q = u.objectEach, h = u.splat;
            try {
                var f = !!(new DOMParser).parseFromString("", "text/html")
            } catch (c) {
                f = !1
            }
            u = function () {
                function c(c) {
                    this.nodes = "string" === typeof c ? this.parseMarkup(c) : c
                }

                c.filterUserAttributes =
                    function (e) {
                        q(e, function (a, f) {
                            var h = !0;
                            -1 === c.allowedAttributes.indexOf(f) && (h = !1);
                            -1 !== ["background", "dynsrc", "href", "lowsrc", "src"].indexOf(f) && (h = B(a) && c.allowedReferences.some(function (c) {
                                return 0 === a.indexOf(c)
                            }));
                            h || (G("Highcharts warning: Invalid attribute '" + f + "' in config"), delete e[f])
                        });
                        return e
                    };
                c.setElementHTML = function (e, a) {
                    e.innerHTML = "";
                    a && (new c(a)).addToDOM(e)
                };
                c.prototype.addToDOM = function (e) {
                    function f(e, t) {
                        var n;
                        h(e).forEach(function (l) {
                            var e = l.tagName, h = l.textContent ? a.doc.createTextNode(l.textContent) :
                                void 0;
                            if (e) if ("#text" === e) var m = h; else if (-1 !== c.allowedTags.indexOf(e)) {
                                e = a.doc.createElementNS("svg" === e ? v : t.namespaceURI || v, e);
                                var p = l.attributes || {};
                                q(l, function (d, k) {
                                    "tagName" !== k && "attributes" !== k && "children" !== k && "textContent" !== k && (p[k] = d)
                                });
                                H(e, c.filterUserAttributes(p));
                                h && e.appendChild(h);
                                f(l.children || [], e);
                                m = e
                            } else G("Highcharts warning: Invalid tagName '" + e + "' in config");
                            m && t.appendChild(m);
                            n = m
                        });
                        return n
                    }

                    return f(this.nodes, e)
                };
                c.prototype.parseMarkup = function (c) {
                    var e = [];
                    if (f) c =
                        (new DOMParser).parseFromString(c, "text/html"); else {
                        var a = x("div");
                        a.innerHTML = c;
                        c = {body: a}
                    }
                    var h = function (c, l) {
                        var e = c.nodeName.toLowerCase(), a = {tagName: e};
                        if ("#text" === e) {
                            e = c.textContent || "";
                            if (/^[\s]*$/.test(e)) return;
                            a.textContent = e
                        }
                        if (e = c.attributes) {
                            var f = {};
                            [].forEach.call(e, function (d) {
                                f[d.name] = d.value
                            });
                            a.attributes = f
                        }
                        if (c.childNodes.length) {
                            var p = [];
                            [].forEach.call(c.childNodes, function (d) {
                                h(d, p)
                            });
                            p.length && (a.children = p)
                        }
                        l.push(a)
                    };
                    [].forEach.call(c.body.childNodes, function (c) {
                        return h(c,
                            e)
                    });
                    a && y(a);
                    return e
                };
                c.allowedTags = "a b br button caption circle clipPath code dd defs div dl dt em feComponentTransfer feFuncA feFuncB feFuncG feFuncR feGaussianBlur feOffset feMerge feMergeNode filter h1 h2 h3 h4 h5 h6 hr i img li linearGradient marker ol p path pattern pre rect small span stop strong style sub sup svg table text thead tbody tspan td th tr u ul #text".split(" ");
                c.allowedAttributes = "aria-controls aria-describedby aria-expanded aria-haspopup aria-hidden aria-label aria-labelledby aria-live aria-pressed aria-readonly aria-roledescription aria-selected class clip-path color colspan cx cy d dx dy disabled fill height href id in markerHeight markerWidth offset opacity orient padding paddingLeft paddingRight patternUnits r refX refY role scope slope src startOffset stdDeviation stroke stroke-linecap stroke-width style tableValues result rowspan summary target tabindex text-align textAnchor textLength type valign width x x1 x2 y y1 y2 zIndex".split(" ");
                c.allowedReferences = "https:// http:// mailto: / ../ ./ #".split(" ");
                return c
            }();
            "";
            return u
        });
        L(a, "Core/FormatUtilities.js", [a["Core/DefaultOptions.js"], a["Core/Utilities.js"]], function (a, u) {
            function v(a, f, c, e) {
                a = +a || 0;
                f = +f;
                var h = H.lang, m = (a.toString().split(".")[1] || "").split("e")[0].length,
                    w = a.toString().split("e"), n = f;
                if (-1 === f) f = Math.min(m, 20); else if (!G(f)) f = 2; else if (f && w[1] && 0 > w[1]) {
                    var l = f + +w[1];
                    0 <= l ? (w[0] = (+w[0]).toExponential(l).split("e")[0], f = l) : (w[0] = w[0].split(".")[0] || 0, a = 20 > f ? (w[0] *
                        Math.pow(10, w[1])).toFixed(f) : 0, w[1] = 0)
                }
                l = (Math.abs(w[1] ? w[0] : a) + Math.pow(10, -Math.max(f, m) - 1)).toFixed(f);
                m = String(q(l));
                var J = 3 < m.length ? m.length % 3 : 0;
                c = B(c, h.decimalPoint);
                e = B(e, h.thousandsSep);
                a = (0 > a ? "-" : "") + (J ? m.substr(0, J) + e : "");
                a = 0 > +w[1] && !n ? "0" : a + m.substr(J).replace(/(\d{3})(?=\d)/g, "$1" + e);
                f && (a += c + l.slice(-f));
                w[1] && 0 !== +a && (a += "e" + w[1]);
                return a
            }

            var H = a.defaultOptions, x = a.defaultTime, y = u.getNestedProperty, G = u.isNumber, B = u.pick,
                q = u.pInt;
            return {
                dateFormat: function (a, f, c) {
                    return x.dateFormat(a,
                        f, c)
                }, format: function (a, f, c) {
                    var e = "{", h = !1, m = /f$/, w = /\.([0-9])/, n = H.lang, l = c && c.time || x;
                    c = c && c.numberFormatter || v;
                    for (var J = []; a;) {
                        var K = a.indexOf(e);
                        if (-1 === K) break;
                        var A = a.slice(0, K);
                        if (h) {
                            A = A.split(":");
                            e = y(A.shift() || "", f);
                            if (A.length && "number" === typeof e) if (A = A.join(":"), m.test(A)) {
                                var p = parseInt((A.match(w) || ["", "-1"])[1], 10);
                                null !== e && (e = c(e, p, n.decimalPoint, -1 < A.indexOf(",") ? n.thousandsSep : ""))
                            } else e = l.dateFormat(A, e);
                            J.push(e)
                        } else J.push(A);
                        a = a.slice(K + 1);
                        e = (h = !h) ? "}" : "{"
                    }
                    J.push(a);
                    return J.join("")
                },
                numberFormat: v
            }
        });
        L(a, "Core/Renderer/SVG/SVGElement.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/Renderer/HTML/AST.js"], a["Core/Color/Color.js"], a["Core/Globals.js"], a["Core/Color/Palette.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y) {
            var v = a.animate, B = a.animObject, q = a.stop, h = H.deg2rad, f = H.doc, c = H.noop, e = H.svg,
                t = H.SVG_NS, m = H.win, w = y.addEvent, n = y.attr, l = y.createElement, J = y.css, K = y.defined,
                A = y.erase, p = y.extend, d = y.fireEvent, k = y.isArray, b = y.isFunction, g = y.isNumber,
                r = y.isString, F = y.merge,
                D = y.objectEach, M = y.pick, C = y.pInt, O = y.syncTimeout, S = y.uniqueKey;
            a = function () {
                function a() {
                    this.element = void 0;
                    this.onEvents = {};
                    this.opacity = 1;
                    this.renderer = void 0;
                    this.SVG_NS = t;
                    this.symbolCustomAttribs = "x y width height r start end innerR anchorX anchorY rounded".split(" ")
                }

                a.prototype._defaultGetter = function (b) {
                    b = M(this[b + "Value"], this[b], this.element ? this.element.getAttribute(b) : null, 0);
                    /^[\-0-9\.]+$/.test(b) && (b = parseFloat(b));
                    return b
                };
                a.prototype._defaultSetter = function (b, d, g) {
                    g.setAttribute(d,
                        b)
                };
                a.prototype.add = function (b) {
                    var d = this.renderer, g = this.element;
                    b && (this.parentGroup = b);
                    this.parentInverted = b && b.inverted;
                    "undefined" !== typeof this.textStr && "text" === this.element.nodeName && d.buildText(this);
                    this.added = !0;
                    if (!b || b.handleZ || this.zIndex) var k = this.zIndexSetter();
                    k || (b ? b.element : d.box).appendChild(g);
                    if (this.onAdd) this.onAdd();
                    return this
                };
                a.prototype.addClass = function (b, d) {
                    var g = d ? "" : this.attr("class") || "";
                    b = (b || "").split(/ /g).reduce(function (b, d) {
                            -1 === g.indexOf(d) && b.push(d);
                            return b
                        },
                        g ? [g] : []).join(" ");
                    b !== g && this.attr("class", b);
                    return this
                };
                a.prototype.afterSetters = function () {
                    this.doTransform && (this.updateTransform(), this.doTransform = !1)
                };
                a.prototype.align = function (b, d, g) {
                    var z = {}, k = this.renderer, c = k.alignedObjects, a, I, l;
                    if (b) {
                        if (this.alignOptions = b, this.alignByTranslate = d, !g || r(g)) this.alignTo = a = g || "renderer", A(c, this), c.push(this), g = void 0
                    } else b = this.alignOptions, d = this.alignByTranslate, a = this.alignTo;
                    g = M(g, k[a], "scrollablePlotBox" === a ? k.plotBox : void 0, k);
                    a = b.align;
                    var e =
                        b.verticalAlign;
                    k = (g.x || 0) + (b.x || 0);
                    c = (g.y || 0) + (b.y || 0);
                    "right" === a ? I = 1 : "center" === a && (I = 2);
                    I && (k += (g.width - (b.width || 0)) / I);
                    z[d ? "translateX" : "x"] = Math.round(k);
                    "bottom" === e ? l = 1 : "middle" === e && (l = 2);
                    l && (c += (g.height - (b.height || 0)) / l);
                    z[d ? "translateY" : "y"] = Math.round(c);
                    this[this.placed ? "animate" : "attr"](z);
                    this.placed = !0;
                    this.alignAttr = z;
                    return this
                };
                a.prototype.alignSetter = function (b) {
                    var d = {left: "start", center: "middle", right: "end"};
                    d[b] && (this.alignValue = b, this.element.setAttribute("text-anchor",
                        d[b]))
                };
                a.prototype.animate = function (b, d, g) {
                    var k = this, z = B(M(d, this.renderer.globalAnimation, !0));
                    d = z.defer;
                    M(f.hidden, f.msHidden, f.webkitHidden, !1) && (z.duration = 0);
                    0 !== z.duration ? (g && (z.complete = g), O(function () {
                        k.element && v(k, b, z)
                    }, d)) : (this.attr(b, void 0, g), D(b, function (b, d) {
                        z.step && z.step.call(this, b, {prop: d, pos: 1, elem: this})
                    }, this));
                    return this
                };
                a.prototype.applyTextOutline = function (b) {
                    var d = this.element;
                    -1 !== b.indexOf("contrast") && (b = b.replace(/contrast/g, this.renderer.getContrast(d.style.fill)));
                    var g = b.split(" ");
                    b = g[g.length - 1];
                    if ((g = g[0]) && "none" !== g && H.svg) {
                        this.fakeTS = !0;
                        this.ySetter = this.xSetter;
                        g = g.replace(/(^[\d\.]+)(.*?)$/g, function (b, d, g) {
                            return 2 * Number(d) + g
                        });
                        this.removeTextOutline();
                        var k = f.createElementNS(t, "tspan");
                        n(k, {
                            "class": "highcharts-text-outline",
                            fill: b,
                            stroke: b,
                            "stroke-width": g,
                            "stroke-linejoin": "round"
                        });
                        [].forEach.call(d.childNodes, function (b) {
                            var d = b.cloneNode(!0);
                            d.removeAttribute && ["fill", "stroke", "stroke-width", "stroke"].forEach(function (b) {
                                return d.removeAttribute(b)
                            });
                            k.appendChild(d)
                        });
                        var c = f.createElementNS(t, "tspan");
                        c.textContent = "\u200b";
                        ["x", "y"].forEach(function (b) {
                            var g = d.getAttribute(b);
                            g && c.setAttribute(b, g)
                        });
                        k.appendChild(c);
                        d.insertBefore(k, d.firstChild)
                    }
                };
                a.prototype.attr = function (b, d, g, k) {
                    var z = this.element, Q = this.symbolCustomAttribs, c, I = this, r, a;
                    if ("string" === typeof b && "undefined" !== typeof d) {
                        var l = b;
                        b = {};
                        b[l] = d
                    }
                    "string" === typeof b ? I = (this[b + "Getter"] || this._defaultGetter).call(this, b, z) : (D(b, function (d, g) {
                        r = !1;
                        k || q(this, g);
                        this.symbolName && -1 !==
                        Q.indexOf(g) && (c || (this.symbolAttr(b), c = !0), r = !0);
                        !this.rotation || "x" !== g && "y" !== g || (this.doTransform = !0);
                        r || (a = this[g + "Setter"] || this._defaultSetter, a.call(this, d, g, z), !this.styledMode && this.shadows && /^(width|height|visibility|x|y|d|transform|cx|cy|r)$/.test(g) && this.updateShadows(g, d, a))
                    }, this), this.afterSetters());
                    g && g.call(this);
                    return I
                };
                a.prototype.clip = function (b) {
                    return this.attr("clip-path", b ? "url(" + this.renderer.url + "#" + b.id + ")" : "none")
                };
                a.prototype.crisp = function (b, d) {
                    d = d || b.strokeWidth ||
                        0;
                    var g = Math.round(d) % 2 / 2;
                    b.x = Math.floor(b.x || this.x || 0) + g;
                    b.y = Math.floor(b.y || this.y || 0) + g;
                    b.width = Math.floor((b.width || this.width || 0) - 2 * g);
                    b.height = Math.floor((b.height || this.height || 0) - 2 * g);
                    K(b.strokeWidth) && (b.strokeWidth = d);
                    return b
                };
                a.prototype.complexColor = function (b, g, z) {
                    var Q = this.renderer, c, r, a, I, l, e, f, p, n, C, h = [], t;
                    d(this.renderer, "complexColor", {args: arguments}, function () {
                        b.radialGradient ? r = "radialGradient" : b.linearGradient && (r = "linearGradient");
                        if (r) {
                            a = b[r];
                            l = Q.gradients;
                            e = b.stops;
                            n = z.radialReference;
                            k(a) && (b[r] = a = {
                                x1: a[0],
                                y1: a[1],
                                x2: a[2],
                                y2: a[3],
                                gradientUnits: "userSpaceOnUse"
                            });
                            "radialGradient" === r && n && !K(a.gradientUnits) && (I = a, a = F(a, Q.getRadialAttr(n, I), {gradientUnits: "userSpaceOnUse"}));
                            D(a, function (b, d) {
                                "id" !== d && h.push(d, b)
                            });
                            D(e, function (b) {
                                h.push(b)
                            });
                            h = h.join(",");
                            if (l[h]) C = l[h].attr("id"); else {
                                a.id = C = S();
                                var d = l[h] = Q.createElement(r).attr(a).add(Q.defs);
                                d.radAttr = I;
                                d.stops = [];
                                e.forEach(function (b) {
                                    0 === b[1].indexOf("rgba") ? (c = E.parse(b[1]), f = c.get("rgb"), p = c.get("a")) : (f = b[1], p = 1);
                                    b = Q.createElement("stop").attr({
                                        offset: b[0],
                                        "stop-color": f, "stop-opacity": p
                                    }).add(d);
                                    d.stops.push(b)
                                })
                            }
                            t = "url(" + Q.url + "#" + C + ")";
                            z.setAttribute(g, t);
                            z.gradient = h;
                            b.toString = function () {
                                return t
                            }
                        }
                    })
                };
                a.prototype.css = function (b) {
                    var d = this.styles, g = {}, k = this.element, c = ["textOutline", "textOverflow", "width"], r = "",
                        a = !d;
                    b && b.color && (b.fill = b.color);
                    d && D(b, function (b, k) {
                        d && d[k] !== b && (g[k] = b, a = !0)
                    });
                    if (a) {
                        d && (b = p(d, g));
                        if (b) if (null === b.width || "auto" === b.width) delete this.textWidth; else if ("text" === k.nodeName.toLowerCase() && b.width) var I = this.textWidth =
                            C(b.width);
                        this.styles = b;
                        I && !e && this.renderer.forExport && delete b.width;
                        if (k.namespaceURI === this.SVG_NS) {
                            var l = function (b, d) {
                                return "-" + d.toLowerCase()
                            };
                            D(b, function (b, d) {
                                -1 === c.indexOf(d) && (r += d.replace(/([A-Z])/g, l) + ":" + b + ";")
                            });
                            r && n(k, "style", r)
                        } else J(k, b);
                        this.added && ("text" === this.element.nodeName && this.renderer.buildText(this), b && b.textOutline && this.applyTextOutline(b.textOutline))
                    }
                    return this
                };
                a.prototype.dashstyleSetter = function (b) {
                    var d = this["stroke-width"];
                    "inherit" === d && (d = 1);
                    if (b = b && b.toLowerCase()) {
                        var g =
                            b.replace("shortdashdotdot", "3,1,1,1,1,1,").replace("shortdashdot", "3,1,1,1").replace("shortdot", "1,1,").replace("shortdash", "3,1,").replace("longdash", "8,3,").replace(/dot/g, "1,3,").replace("dash", "4,3,").replace(/,$/, "").split(",");
                        for (b = g.length; b--;) g[b] = "" + C(g[b]) * M(d, NaN);
                        b = g.join(",").replace(/NaN/g, "none");
                        this.element.setAttribute("stroke-dasharray", b)
                    }
                };
                a.prototype.destroy = function () {
                    var b = this, d = b.element || {}, g = b.renderer, k = d.ownerSVGElement,
                        c = g.isSVG && "SPAN" === d.nodeName && b.parentGroup ||
                            void 0;
                    d.onclick = d.onmouseout = d.onmouseover = d.onmousemove = d.point = null;
                    q(b);
                    if (b.clipPath && k) {
                        var r = b.clipPath;
                        [].forEach.call(k.querySelectorAll("[clip-path],[CLIP-PATH]"), function (b) {
                            -1 < b.getAttribute("clip-path").indexOf(r.element.id) && b.removeAttribute("clip-path")
                        });
                        b.clipPath = r.destroy()
                    }
                    if (b.stops) {
                        for (k = 0; k < b.stops.length; k++) b.stops[k].destroy();
                        b.stops.length = 0;
                        b.stops = void 0
                    }
                    b.safeRemoveChild(d);
                    for (g.styledMode || b.destroyShadows(); c && c.div && 0 === c.div.childNodes.length;) d = c.parentGroup,
                        b.safeRemoveChild(c.div), delete c.div, c = d;
                    b.alignTo && A(g.alignedObjects, b);
                    D(b, function (d, g) {
                        b[g] && b[g].parentGroup === b && b[g].destroy && b[g].destroy();
                        delete b[g]
                    })
                };
                a.prototype.destroyShadows = function () {
                    (this.shadows || []).forEach(function (b) {
                        this.safeRemoveChild(b)
                    }, this);
                    this.shadows = void 0
                };
                a.prototype.destroyTextPath = function (b, d) {
                    var g = b.getElementsByTagName("text")[0];
                    if (g) {
                        if (g.removeAttribute("dx"), g.removeAttribute("dy"), d.element.setAttribute("id", ""), this.textPathWrapper && g.getElementsByTagName("textPath").length) {
                            for (b =
                                     this.textPathWrapper.element.childNodes; b.length;) g.appendChild(b[0]);
                            g.removeChild(this.textPathWrapper.element)
                        }
                    } else if (b.getAttribute("dx") || b.getAttribute("dy")) b.removeAttribute("dx"), b.removeAttribute("dy");
                    this.textPathWrapper && (this.textPathWrapper = this.textPathWrapper.destroy())
                };
                a.prototype.dSetter = function (b, d, g) {
                    k(b) && ("string" === typeof b[0] && (b = this.renderer.pathToSegments(b)), this.pathArray = b, b = b.reduce(function (b, d, g) {
                        return d && d.join ? (g ? b + " " : "") + d.join(" ") : (d || "").toString()
                    }, ""));
                    /(NaN| {2}|^$)/.test(b) && (b = "M 0 0");
                    this[d] !== b && (g.setAttribute(d, b), this[d] = b)
                };
                a.prototype.fadeOut = function (b) {
                    var d = this;
                    d.animate({opacity: 0}, {
                        duration: M(b, 150), complete: function () {
                            d.attr({y: -9999}).hide()
                        }
                    })
                };
                a.prototype.fillSetter = function (b, d, g) {
                    "string" === typeof b ? g.setAttribute(d, b) : b && this.complexColor(b, d, g)
                };
                a.prototype.getBBox = function (d, g) {
                    var k = this.renderer, c = this.element, r = this.styles, l = this.textStr, e = k.cache,
                        I = k.cacheKeys, F = c.namespaceURI === this.SVG_NS;
                    g = M(g, this.rotation, 0);
                    var P =
                        k.styledMode ? c && a.prototype.getStyle.call(c, "font-size") : r && r.fontSize, f;
                    if (K(l)) {
                        var n = l.toString();
                        -1 === n.indexOf("<") && (n = n.replace(/[0-9]/g, "0"));
                        n += ["", g, P, this.textWidth, r && r.textOverflow, r && r.fontWeight].join()
                    }
                    n && !d && (f = e[n]);
                    if (!f) {
                        if (F || k.forExport) {
                            try {
                                var D = this.fakeTS && function (b) {
                                    var d = c.querySelector(".highcharts-text-outline");
                                    d && J(d, {display: b})
                                };
                                b(D) && D("none");
                                f = c.getBBox ? p({}, c.getBBox()) : {width: c.offsetWidth, height: c.offsetHeight};
                                b(D) && D("")
                            } catch (V) {
                                ""
                            }
                            if (!f || 0 > f.width) f = {
                                width: 0,
                                height: 0
                            }
                        } else f = this.htmlGetBBox();
                        k.isSVG && (d = f.width, k = f.height, F && (f.height = k = {
                            "11px,17": 14,
                            "13px,20": 16
                        }[r && r.fontSize + "," + Math.round(k)] || k), g && (r = g * h, f.width = Math.abs(k * Math.sin(r)) + Math.abs(d * Math.cos(r)), f.height = Math.abs(k * Math.cos(r)) + Math.abs(d * Math.sin(r))));
                        if (n && 0 < f.height) {
                            for (; 250 < I.length;) delete e[I.shift()];
                            e[n] || I.push(n);
                            e[n] = f
                        }
                    }
                    return f
                };
                a.prototype.getStyle = function (b) {
                    return m.getComputedStyle(this.element || this, "").getPropertyValue(b)
                };
                a.prototype.hasClass = function (b) {
                    return -1 !==
                        ("" + this.attr("class")).split(" ").indexOf(b)
                };
                a.prototype.hide = function (b) {
                    b ? this.attr({y: -9999}) : this.attr({visibility: "hidden"});
                    return this
                };
                a.prototype.htmlGetBBox = function () {
                    return {height: 0, width: 0, x: 0, y: 0}
                };
                a.prototype.init = function (b, g) {
                    this.element = "span" === g ? l(g) : f.createElementNS(this.SVG_NS, g);
                    this.renderer = b;
                    d(this, "afterInit")
                };
                a.prototype.invert = function (b) {
                    this.inverted = b;
                    this.updateTransform();
                    return this
                };
                a.prototype.on = function (b, d) {
                    var g = this.onEvents;
                    if (g[b]) g[b]();
                    g[b] = w(this.element,
                        b, d);
                    return this
                };
                a.prototype.opacitySetter = function (b, d, g) {
                    this.opacity = b = Number(Number(b).toFixed(3));
                    g.setAttribute(d, b)
                };
                a.prototype.removeClass = function (b) {
                    return this.attr("class", ("" + this.attr("class")).replace(r(b) ? new RegExp("(^| )" + b + "( |$)") : b, " ").replace(/ +/g, " ").trim())
                };
                a.prototype.removeTextOutline = function () {
                    var b = this.element.querySelector("tspan.highcharts-text-outline");
                    b && this.safeRemoveChild(b)
                };
                a.prototype.safeRemoveChild = function (b) {
                    var d = b.parentNode;
                    d && d.removeChild(b)
                };
                a.prototype.setRadialReference = function (b) {
                    var d = this.element.gradient && this.renderer.gradients[this.element.gradient];
                    this.element.radialReference = b;
                    d && d.radAttr && d.animate(this.renderer.getRadialAttr(b, d.radAttr));
                    return this
                };
                a.prototype.setTextPath = function (b, d) {
                    var k = this.element, Q = this.text ? this.text.element : k, r = {textAnchor: "text-anchor"},
                        a = !1, l = this.textPathWrapper, I = !l;
                    d = F(!0, {enabled: !0, attributes: {dy: -5, startOffset: "50%", textAnchor: "middle"}}, d);
                    var e = u.filterUserAttributes(d.attributes);
                    if (b && d && d.enabled) {
                        l && null === l.element.parentNode ? (I = !0, l = l.destroy()) : l && this.removeTextOutline.call(l.parentGroup);
                        this.options && this.options.padding && (e.dx = -this.options.padding);
                        l || (this.textPathWrapper = l = this.renderer.createElement("textPath"), a = !0);
                        var P = l.element;
                        (d = b.element.getAttribute("id")) || b.element.setAttribute("id", d = S());
                        if (I) for (Q.setAttribute("y", 0), g(e.dx) && Q.setAttribute("x", -e.dx), b = [].slice.call(Q.childNodes), I = 0; I < b.length; I++) {
                            var f = b[I];
                            f.nodeType !== Node.TEXT_NODE && "tspan" !==
                            f.nodeName || P.appendChild(f)
                        }
                        a && l && l.add({element: Q});
                        P.setAttributeNS("http://www.w3.org/1999/xlink", "href", this.renderer.url + "#" + d);
                        K(e.dy) && (P.parentNode.setAttribute("dy", e.dy), delete e.dy);
                        K(e.dx) && (P.parentNode.setAttribute("dx", e.dx), delete e.dx);
                        D(e, function (b, d) {
                            P.setAttribute(r[d] || d, b)
                        });
                        k.removeAttribute("transform");
                        this.removeTextOutline.call(l);
                        this.text && !this.renderer.styledMode && this.attr({fill: "none", "stroke-width": 0});
                        this.applyTextOutline = this.updateTransform = c
                    } else l && (delete this.updateTransform,
                        delete this.applyTextOutline, this.destroyTextPath(k, b), this.updateTransform(), this.options && this.options.rotation && this.applyTextOutline(this.options.style.textOutline));
                    return this
                };
                a.prototype.shadow = function (b, d, g) {
                    var k = [], c = this.element, z = this.oldShadowOptions, r = {
                        color: x.neutralColor100,
                        offsetX: this.parentInverted ? -1 : 1,
                        offsetY: this.parentInverted ? -1 : 1,
                        opacity: .15,
                        width: 3
                    }, a = !1, l;
                    !0 === b ? l = r : "object" === typeof b && (l = p(r, b));
                    l && (l && z && D(l, function (b, d) {
                        b !== z[d] && (a = !0)
                    }), a && this.destroyShadows(),
                        this.oldShadowOptions = l);
                    if (!l) this.destroyShadows(); else if (!this.shadows) {
                        var e = l.opacity / l.width;
                        var F = this.parentInverted ? "translate(" + l.offsetY + ", " + l.offsetX + ")" : "translate(" + l.offsetX + ", " + l.offsetY + ")";
                        for (r = 1; r <= l.width; r++) {
                            var f = c.cloneNode(!1);
                            var C = 2 * l.width + 1 - 2 * r;
                            n(f, {
                                stroke: b.color || x.neutralColor100,
                                "stroke-opacity": e * r,
                                "stroke-width": C,
                                transform: F,
                                fill: "none"
                            });
                            f.setAttribute("class", (f.getAttribute("class") || "") + " highcharts-shadow");
                            g && (n(f, "height", Math.max(n(f, "height") - C, 0)),
                                f.cutHeight = C);
                            d ? d.element.appendChild(f) : c.parentNode && c.parentNode.insertBefore(f, c);
                            k.push(f)
                        }
                        this.shadows = k
                    }
                    return this
                };
                a.prototype.show = function (b) {
                    return this.attr({visibility: b ? "inherit" : "visible"})
                };
                a.prototype.strokeSetter = function (b, d, g) {
                    this[d] = b;
                    this.stroke && this["stroke-width"] ? (a.prototype.fillSetter.call(this, this.stroke, "stroke", g), g.setAttribute("stroke-width", this["stroke-width"]), this.hasStroke = !0) : "stroke-width" === d && 0 === b && this.hasStroke ? (g.removeAttribute("stroke"), this.hasStroke =
                        !1) : this.renderer.styledMode && this["stroke-width"] && (g.setAttribute("stroke-width", this["stroke-width"]), this.hasStroke = !0)
                };
                a.prototype.strokeWidth = function () {
                    if (!this.renderer.styledMode) return this["stroke-width"] || 0;
                    var b = this.getStyle("stroke-width"), d = 0;
                    if (b.indexOf("px") === b.length - 2) d = C(b); else if ("" !== b) {
                        var g = f.createElementNS(t, "rect");
                        n(g, {width: b, "stroke-width": 0});
                        this.element.parentNode.appendChild(g);
                        d = g.getBBox().width;
                        g.parentNode.removeChild(g)
                    }
                    return d
                };
                a.prototype.symbolAttr =
                    function (b) {
                        var d = this;
                        "x y r start end width height innerR anchorX anchorY clockwise".split(" ").forEach(function (g) {
                            d[g] = M(b[g], d[g])
                        });
                        d.attr({d: d.renderer.symbols[d.symbolName](d.x, d.y, d.width, d.height, d)})
                    };
                a.prototype.textSetter = function (b) {
                    b !== this.textStr && (delete this.textPxLength, this.textStr = b, this.added && this.renderer.buildText(this))
                };
                a.prototype.titleSetter = function (b) {
                    var d = this.element,
                        g = d.getElementsByTagName("title")[0] || f.createElementNS(this.SVG_NS, "title");
                    d.insertBefore ? d.insertBefore(g,
                        d.firstChild) : d.appendChild(g);
                    g.textContent = String(M(b, "")).replace(/<[^>]*>/g, "").replace(/&lt;/g, "<").replace(/&gt;/g, ">")
                };
                a.prototype.toFront = function () {
                    var b = this.element;
                    b.parentNode.appendChild(b);
                    return this
                };
                a.prototype.translate = function (b, d) {
                    return this.attr({translateX: b, translateY: d})
                };
                a.prototype.updateShadows = function (b, d, g) {
                    var k = this.shadows;
                    if (k) for (var c = k.length; c--;) g.call(k[c], "height" === b ? Math.max(d - (k[c].cutHeight || 0), 0) : "d" === b ? this.d : d, b, k[c])
                };
                a.prototype.updateTransform =
                    function () {
                        var b = this.scaleX, d = this.scaleY, g = this.inverted, k = this.rotation, c = this.matrix,
                            r = this.element, a = this.translateX || 0, l = this.translateY || 0;
                        g && (a += this.width, l += this.height);
                        a = ["translate(" + a + "," + l + ")"];
                        K(c) && a.push("matrix(" + c.join(",") + ")");
                        g ? a.push("rotate(90) scale(-1,1)") : k && a.push("rotate(" + k + " " + M(this.rotationOriginX, r.getAttribute("x"), 0) + " " + M(this.rotationOriginY, r.getAttribute("y") || 0) + ")");
                        (K(b) || K(d)) && a.push("scale(" + M(b, 1) + " " + M(d, 1) + ")");
                        a.length && r.setAttribute("transform",
                            a.join(" "))
                    };
                a.prototype.visibilitySetter = function (b, d, g) {
                    "inherit" === b ? g.removeAttribute(d) : this[d] !== b && g.setAttribute(d, b);
                    this[d] = b
                };
                a.prototype.xGetter = function (b) {
                    "circle" === this.element.nodeName && ("x" === b ? b = "cx" : "y" === b && (b = "cy"));
                    return this._defaultGetter(b)
                };
                a.prototype.zIndexSetter = function (b, d) {
                    var g = this.renderer, k = this.parentGroup, c = (k || g).element || g.box, r = this.element;
                    g = c === g.box;
                    var a = !1;
                    var l = this.added;
                    var e;
                    K(b) ? (r.setAttribute("data-z-index", b), b = +b, this[d] === b && (l = !1)) : K(this[d]) &&
                        r.removeAttribute("data-z-index");
                    this[d] = b;
                    if (l) {
                        (b = this.zIndex) && k && (k.handleZ = !0);
                        d = c.childNodes;
                        for (e = d.length - 1; 0 <= e && !a; e--) {
                            k = d[e];
                            l = k.getAttribute("data-z-index");
                            var f = !K(l);
                            if (k !== r) if (0 > b && f && !g && !e) c.insertBefore(r, d[e]), a = !0; else if (C(l) <= b || f && (!K(b) || 0 <= b)) c.insertBefore(r, d[e + 1] || null), a = !0
                        }
                        a || (c.insertBefore(r, d[g ? 3 : 0] || null), a = !0)
                    }
                    return a
                };
                return a
            }();
            a.prototype["stroke-widthSetter"] = a.prototype.strokeSetter;
            a.prototype.yGetter = a.prototype.xGetter;
            a.prototype.matrixSetter = a.prototype.rotationOriginXSetter =
                a.prototype.rotationOriginYSetter = a.prototype.rotationSetter = a.prototype.scaleXSetter = a.prototype.scaleYSetter = a.prototype.translateXSetter = a.prototype.translateYSetter = a.prototype.verticalAlignSetter = function (b, d) {
                    this[d] = b;
                    this.doTransform = !0
                };
            "";
            return a
        });
        L(a, "Core/Renderer/RendererRegistry.js", [a["Core/Globals.js"]], function (a) {
            var v;
            (function (v) {
                var u;
                v.rendererTypes = {};
                v.getRendererType = function (a) {
                    void 0 === a && (a = u);
                    return v.rendererTypes[a] || v.rendererTypes[u]
                };
                v.registerRendererType = function (x,
                                                   y, G) {
                    v.rendererTypes[x] = y;
                    if (!u || G) u = x, a.Renderer = y
                }
            })(v || (v = {}));
            return v
        });
        L(a, "Core/Renderer/SVG/SVGLabel.js", [a["Core/Renderer/SVG/SVGElement.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = this && this.__extends || function () {
                var a = function (f, c) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (c, a) {
                        c.__proto__ = a
                    } || function (c, a) {
                        for (var e in a) a.hasOwnProperty(e) && (c[e] = a[e])
                    };
                    return a(f, c)
                };
                return function (f, c) {
                    function e() {
                        this.constructor = f
                    }

                    a(f, c);
                    f.prototype = null === c ? Object.create(c) :
                        (e.prototype = c.prototype, new e)
                }
            }(), H = u.defined, x = u.extend, y = u.isNumber, G = u.merge, B = u.pick, q = u.removeEvent;
            return function (h) {
                function f(c, a, t, m, w, n, l, J, K, A) {
                    var e = h.call(this) || this;
                    e.paddingLeftSetter = e.paddingSetter;
                    e.paddingRightSetter = e.paddingSetter;
                    e.init(c, "g");
                    e.textStr = a;
                    e.x = t;
                    e.y = m;
                    e.anchorX = n;
                    e.anchorY = l;
                    e.baseline = K;
                    e.className = A;
                    e.addClass("button" === A ? "highcharts-no-tooltip" : "highcharts-label");
                    A && e.addClass("highcharts-" + A);
                    e.text = c.text("", 0, 0, J).attr({zIndex: 1});
                    var d;
                    "string" ===
                    typeof w && ((d = /^url\((.*?)\)$/.test(w)) || e.renderer.symbols[w]) && (e.symbolKey = w);
                    e.bBox = f.emptyBBox;
                    e.padding = 3;
                    e.baselineOffset = 0;
                    e.needsBox = c.styledMode || d;
                    e.deferredAttr = {};
                    e.alignFactor = 0;
                    return e
                }

                v(f, h);
                f.prototype.alignSetter = function (c) {
                    c = {left: 0, center: .5, right: 1}[c];
                    c !== this.alignFactor && (this.alignFactor = c, this.bBox && y(this.xSetting) && this.attr({x: this.xSetting}))
                };
                f.prototype.anchorXSetter = function (c, a) {
                    this.anchorX = c;
                    this.boxAttr(a, Math.round(c) - this.getCrispAdjust() - this.xSetting)
                };
                f.prototype.anchorYSetter =
                    function (c, a) {
                        this.anchorY = c;
                        this.boxAttr(a, c - this.ySetting)
                    };
                f.prototype.boxAttr = function (c, a) {
                    this.box ? this.box.attr(c, a) : this.deferredAttr[c] = a
                };
                f.prototype.css = function (c) {
                    if (c) {
                        var e = {};
                        c = G(c);
                        f.textProps.forEach(function (a) {
                            "undefined" !== typeof c[a] && (e[a] = c[a], delete c[a])
                        });
                        this.text.css(e);
                        var h = "width" in e;
                        "fontSize" in e || "fontWeight" in e ? this.updateTextPadding() : h && this.updateBoxSize()
                    }
                    return a.prototype.css.call(this, c)
                };
                f.prototype.destroy = function () {
                    q(this.element, "mouseenter");
                    q(this.element,
                        "mouseleave");
                    this.text && this.text.destroy();
                    this.box && (this.box = this.box.destroy());
                    a.prototype.destroy.call(this)
                };
                f.prototype.fillSetter = function (c, a) {
                    c && (this.needsBox = !0);
                    this.fill = c;
                    this.boxAttr(a, c)
                };
                f.prototype.getBBox = function () {
                    this.textStr && 0 === this.bBox.width && 0 === this.bBox.height && this.updateBoxSize();
                    var c = this.padding, a = B(this.paddingLeft, c);
                    return {width: this.width, height: this.height, x: this.bBox.x - a, y: this.bBox.y - c}
                };
                f.prototype.getCrispAdjust = function () {
                    return this.renderer.styledMode &&
                    this.box ? this.box.strokeWidth() % 2 / 2 : (this["stroke-width"] ? parseInt(this["stroke-width"], 10) : 0) % 2 / 2
                };
                f.prototype.heightSetter = function (c) {
                    this.heightSetting = c
                };
                f.prototype.on = function (c, e) {
                    var f = this, h = f.text, w = h && "SPAN" === h.element.tagName ? h : void 0;
                    if (w) {
                        var n = function (a) {
                            ("mouseenter" === c || "mouseleave" === c) && a.relatedTarget instanceof Element && (f.element.compareDocumentPosition(a.relatedTarget) & Node.DOCUMENT_POSITION_CONTAINED_BY || w.element.compareDocumentPosition(a.relatedTarget) & Node.DOCUMENT_POSITION_CONTAINED_BY) ||
                            e.call(f.element, a)
                        };
                        w.on(c, n)
                    }
                    a.prototype.on.call(f, c, n || e);
                    return f
                };
                f.prototype.onAdd = function () {
                    var c = this.textStr;
                    this.text.add(this);
                    this.attr({text: H(c) ? c : "", x: this.x, y: this.y});
                    this.box && H(this.anchorX) && this.attr({anchorX: this.anchorX, anchorY: this.anchorY})
                };
                f.prototype.paddingSetter = function (c, a) {
                    y(c) ? c !== this[a] && (this[a] = c, this.updateTextPadding()) : this[a] = void 0
                };
                f.prototype.rSetter = function (c, a) {
                    this.boxAttr(a, c)
                };
                f.prototype.shadow = function (c) {
                    c && !this.renderer.styledMode && (this.updateBoxSize(),
                    this.box && this.box.shadow(c));
                    return this
                };
                f.prototype.strokeSetter = function (c, a) {
                    this.stroke = c;
                    this.boxAttr(a, c)
                };
                f.prototype["stroke-widthSetter"] = function (a, e) {
                    a && (this.needsBox = !0);
                    this["stroke-width"] = a;
                    this.boxAttr(e, a)
                };
                f.prototype["text-alignSetter"] = function (a) {
                    this.textAlign = a
                };
                f.prototype.textSetter = function (a) {
                    "undefined" !== typeof a && this.text.attr({text: a});
                    this.updateTextPadding()
                };
                f.prototype.updateBoxSize = function () {
                    var a = this.text.element.style, e = {}, h = this.padding, m = this.bBox = y(this.widthSetting) &&
                    y(this.heightSetting) && !this.textAlign || !H(this.text.textStr) ? f.emptyBBox : this.text.getBBox();
                    this.width = this.getPaddedWidth();
                    this.height = (this.heightSetting || m.height || 0) + 2 * h;
                    a = this.renderer.fontMetrics(a && a.fontSize, this.text);
                    this.baselineOffset = h + Math.min((this.text.firstLineMetrics || a).b, m.height || Infinity);
                    this.heightSetting && (this.baselineOffset += (this.heightSetting - a.h) / 2);
                    this.needsBox && (this.box || (h = this.box = this.symbolKey ? this.renderer.symbol(this.symbolKey) : this.renderer.rect(), h.addClass(("button" ===
                    this.className ? "" : "highcharts-label-box") + (this.className ? " highcharts-" + this.className + "-box" : "")), h.add(this)), h = this.getCrispAdjust(), e.x = h, e.y = (this.baseline ? -this.baselineOffset : 0) + h, e.width = Math.round(this.width), e.height = Math.round(this.height), this.box.attr(x(e, this.deferredAttr)), this.deferredAttr = {})
                };
                f.prototype.updateTextPadding = function () {
                    var a = this.text;
                    this.updateBoxSize();
                    var e = this.baseline ? 0 : this.baselineOffset, f = B(this.paddingLeft, this.padding);
                    H(this.widthSetting) && this.bBox &&
                    ("center" === this.textAlign || "right" === this.textAlign) && (f += {
                        center: .5,
                        right: 1
                    }[this.textAlign] * (this.widthSetting - this.bBox.width));
                    if (f !== a.x || e !== a.y) a.attr("x", f), a.hasBoxWidthChanged && (this.bBox = a.getBBox(!0)), "undefined" !== typeof e && a.attr("y", e);
                    a.x = f;
                    a.y = e
                };
                f.prototype.widthSetter = function (a) {
                    this.widthSetting = y(a) ? a : void 0
                };
                f.prototype.getPaddedWidth = function () {
                    var a = this.padding, e = B(this.paddingLeft, a);
                    a = B(this.paddingRight, a);
                    return (this.widthSetting || this.bBox.width || 0) + e + a
                };
                f.prototype.xSetter =
                    function (a) {
                        this.x = a;
                        this.alignFactor && (a -= this.alignFactor * this.getPaddedWidth(), this["forceAnimate:x"] = !0);
                        this.xSetting = Math.round(a);
                        this.attr("translateX", this.xSetting)
                    };
                f.prototype.ySetter = function (a) {
                    this.ySetting = this.y = Math.round(a);
                    this.attr("translateY", this.ySetting)
                };
                f.emptyBBox = {width: 0, height: 0, x: 0, y: 0};
                f.textProps = "color direction fontFamily fontSize fontStyle fontWeight lineHeight textAlign textDecoration textOutline textOverflow width".split(" ");
                return f
            }(a)
        });
        L(a, "Core/Renderer/SVG/Symbols.js",
            [a["Core/Utilities.js"]], function (a) {
                function v(a, q, h, f, c) {
                    var e = [];
                    if (c) {
                        var t = c.start || 0, m = G(c.r, h);
                        h = G(c.r, f || h);
                        var w = (c.end || 0) - .001;
                        f = c.innerR;
                        var n = G(c.open, .001 > Math.abs((c.end || 0) - t - 2 * Math.PI)), l = Math.cos(t),
                            J = Math.sin(t), K = Math.cos(w), A = Math.sin(w);
                        t = G(c.longArc, .001 > w - t - Math.PI ? 0 : 1);
                        e.push(["M", a + m * l, q + h * J], ["A", m, h, 0, t, G(c.clockwise, 1), a + m * K, q + h * A]);
                        x(f) && e.push(n ? ["M", a + f * K, q + f * A] : ["L", a + f * K, q + f * A], ["A", f, f, 0, t, x(c.clockwise) ? 1 - c.clockwise : 0, a + f * l, q + f * J]);
                        n || e.push(["Z"])
                    }
                    return e
                }

                function E(a,
                           q, h, f, c) {
                    return c && c.r ? H(a, q, h, f, c) : [["M", a, q], ["L", a + h, q], ["L", a + h, q + f], ["L", a, q + f], ["Z"]]
                }

                function H(a, q, h, f, c) {
                    c = c && c.r || 0;
                    return [["M", a + c, q], ["L", a + h - c, q], ["C", a + h, q, a + h, q, a + h, q + c], ["L", a + h, q + f - c], ["C", a + h, q + f, a + h, q + f, a + h - c, q + f], ["L", a + c, q + f], ["C", a, q + f, a, q + f, a, q + f - c], ["L", a, q + c], ["C", a, q, a, q, a + c, q]]
                }

                var x = a.defined, y = a.isNumber, G = a.pick;
                return {
                    arc: v, callout: function (a, q, h, f, c) {
                        var e = Math.min(c && c.r || 0, h, f), t = e + 6, m = c && c.anchorX;
                        c = c && c.anchorY || 0;
                        var w = H(a, q, h, f, {r: e});
                        if (!y(m)) return w;
                        a + m >= h ?
                            c > q + t && c < q + f - t ? w.splice(3, 1, ["L", a + h, c - 6], ["L", a + h + 6, c], ["L", a + h, c + 6], ["L", a + h, q + f - e]) : w.splice(3, 1, ["L", a + h, f / 2], ["L", m, c], ["L", a + h, f / 2], ["L", a + h, q + f - e]) : 0 >= a + m ? c > q + t && c < q + f - t ? w.splice(7, 1, ["L", a, c + 6], ["L", a - 6, c], ["L", a, c - 6], ["L", a, q + e]) : w.splice(7, 1, ["L", a, f / 2], ["L", m, c], ["L", a, f / 2], ["L", a, q + e]) : c && c > f && m > a + t && m < a + h - t ? w.splice(5, 1, ["L", m + 6, q + f], ["L", m, q + f + 6], ["L", m - 6, q + f], ["L", a + e, q + f]) : c && 0 > c && m > a + t && m < a + h - t && w.splice(1, 1, ["L", m - 6, q], ["L", m, q - 6], ["L", m + 6, q], ["L", h - e, q]);
                        return w
                    }, circle: function (a,
                                         q, h, f) {
                        return v(a + h / 2, q + f / 2, h / 2, f / 2, {
                            start: .5 * Math.PI,
                            end: 2.5 * Math.PI,
                            open: !1
                        })
                    }, diamond: function (a, q, h, f) {
                        return [["M", a + h / 2, q], ["L", a + h, q + f / 2], ["L", a + h / 2, q + f], ["L", a, q + f / 2], ["Z"]]
                    }, rect: E, roundedRect: H, square: E, triangle: function (a, q, h, f) {
                        return [["M", a + h / 2, q], ["L", a + h, q + f], ["L", a, q + f], ["Z"]]
                    }, "triangle-down": function (a, q, h, f) {
                        return [["M", a, q], ["L", a + h, q], ["L", a + h / 2, q + f], ["Z"]]
                    }
                }
            });
        L(a, "Core/Renderer/SVG/TextBuilder.js", [a["Core/Renderer/HTML/AST.js"], a["Core/Globals.js"], a["Core/Utilities.js"]], function (a,
                                                                                                                                           u, E) {
            var v = u.doc, x = u.SVG_NS, y = E.attr, G = E.isString, B = E.objectEach, q = E.pick;
            return function () {
                function h(a) {
                    var c = a.styles;
                    this.renderer = a.renderer;
                    this.svgElement = a;
                    this.width = a.textWidth;
                    this.textLineHeight = c && c.lineHeight;
                    this.textOutline = c && c.textOutline;
                    this.ellipsis = !(!c || "ellipsis" !== c.textOverflow);
                    this.noWrap = !(!c || "nowrap" !== c.whiteSpace);
                    this.fontSize = c && c.fontSize
                }

                h.prototype.buildSVG = function () {
                    var f = this.svgElement, c = f.element, e = f.renderer, h = q(f.textStr, "").toString(),
                        m = -1 !== h.indexOf("<"),
                        w = c.childNodes, n = w.length;
                    e = this.width && !f.added && e.box;
                    var l = /<br.*?>/g;
                    var J = [h, this.ellipsis, this.noWrap, this.textLineHeight, this.textOutline, this.fontSize, this.width].join();
                    if (J !== f.textCache) {
                        f.textCache = J;
                        for (delete f.actualWidth; n--;) c.removeChild(w[n]);
                        m || this.ellipsis || this.width || -1 !== h.indexOf(" ") && (!this.noWrap || l.test(h)) ? "" !== h && (e && e.appendChild(c), h = new a(h), this.modifyTree(h.nodes), h.addToDOM(f.element), this.modifyDOM(), this.ellipsis && -1 !== (c.textContent || "").indexOf("\u2026") &&
                        f.attr("title", this.unescapeEntities(f.textStr || "", ["&lt;", "&gt;"])), e && e.removeChild(c)) : c.appendChild(v.createTextNode(this.unescapeEntities(h)));
                        G(this.textOutline) && f.applyTextOutline && f.applyTextOutline(this.textOutline)
                    }
                };
                h.prototype.modifyDOM = function () {
                    var a = this, c = this.svgElement, e = y(c.element, "x");
                    c.firstLineMetrics = void 0;
                    [].forEach.call(c.element.querySelectorAll("tspan.highcharts-br"), function (f, l) {
                        f.nextSibling && f.previousSibling && (0 === l && 1 === f.previousSibling.nodeType && (c.firstLineMetrics =
                            c.renderer.fontMetrics(void 0, f.previousSibling)), y(f, {
                            dy: a.getLineHeight(f.nextSibling),
                            x: e
                        }))
                    });
                    var h = this.width || 0;
                    if (h) {
                        var m = function (f, l) {
                            var n = f.textContent || "", w = n.replace(/([^\^])-/g, "$1- ").split(" "),
                                m = !a.noWrap && (1 < w.length || 1 < c.element.childNodes.length),
                                p = a.getLineHeight(l), d = 0, k = c.actualWidth;
                            if (a.ellipsis) n && a.truncate(f, n, void 0, 0, Math.max(0, h - parseInt(a.fontSize || 12, 10)), function (b, d) {
                                return b.substring(0, d) + "\u2026"
                            }); else if (m) {
                                n = [];
                                for (m = []; l.firstChild && l.firstChild !== f;) m.push(l.firstChild),
                                    l.removeChild(l.firstChild);
                                for (; w.length;) w.length && !a.noWrap && 0 < d && (n.push(f.textContent || ""), f.textContent = w.join(" ").replace(/- /g, "-")), a.truncate(f, void 0, w, 0 === d ? k || 0 : 0, h, function (b, d) {
                                    return w.slice(0, d).join(" ").replace(/- /g, "-")
                                }), k = c.actualWidth, d++;
                                m.forEach(function (b) {
                                    l.insertBefore(b, f)
                                });
                                n.forEach(function (b) {
                                    l.insertBefore(v.createTextNode(b), f);
                                    b = v.createElementNS(x, "tspan");
                                    b.textContent = "\u200b";
                                    y(b, {dy: p, x: e});
                                    l.insertBefore(b, f)
                                })
                            }
                        }, w = function (a) {
                            [].slice.call(a.childNodes).forEach(function (l) {
                                l.nodeType ===
                                Node.TEXT_NODE ? m(l, a) : (-1 !== l.className.baseVal.indexOf("highcharts-br") && (c.actualWidth = 0), w(l))
                            })
                        };
                        w(c.element)
                    }
                };
                h.prototype.getLineHeight = function (a) {
                    var c;
                    a = a.nodeType === Node.TEXT_NODE ? a.parentElement : a;
                    this.renderer.styledMode || (c = a && /(px|em)$/.test(a.style.fontSize) ? a.style.fontSize : this.fontSize || this.renderer.style.fontSize || 12);
                    return this.textLineHeight ? parseInt(this.textLineHeight.toString(), 10) : this.renderer.fontMetrics(c, a || this.svgElement.element).h
                };
                h.prototype.modifyTree = function (a) {
                    var c =
                        this, e = function (f, h) {
                        var w = f.tagName, n = c.renderer.styledMode, l = f.attributes || {};
                        if ("b" === w || "strong" === w) n ? l["class"] = "highcharts-strong" : l.style = "font-weight:bold;" + (l.style || ""); else if ("i" === w || "em" === w) n ? l["class"] = "highcharts-emphasized" : l.style = "font-style:italic;" + (l.style || "");
                        G(l.style) && (l.style = l.style.replace(/(;| |^)color([ :])/, "$1fill$2"));
                        "br" === w && (l["class"] = "highcharts-br", f.textContent = "\u200b", (h = a[h + 1]) && h.textContent && (h.textContent = h.textContent.replace(/^ +/gm, "")));
                        "#text" !==
                        w && "a" !== w && (f.tagName = "tspan");
                        f.attributes = l;
                        f.children && f.children.filter(function (a) {
                            return "#text" !== a.tagName
                        }).forEach(e)
                    };
                    for (a.forEach(e); a[0] && "tspan" === a[0].tagName && !a[0].children;) a.splice(0, 1)
                };
                h.prototype.truncate = function (a, c, e, h, m, w) {
                    var f = this.svgElement, l = f.renderer, t = f.rotation, K = [], A = e ? 1 : 0,
                        p = (c || e || "").length, d = p, k, b = function (b, d) {
                            d = d || b;
                            var g = a.parentNode;
                            if (g && "undefined" === typeof K[d]) if (g.getSubStringLength) try {
                                K[d] = h + g.getSubStringLength(0, e ? d + 1 : d)
                            } catch (M) {
                                ""
                            } else l.getSpanWidth &&
                            (a.textContent = w(c || e, b), K[d] = h + l.getSpanWidth(f, a));
                            return K[d]
                        };
                    f.rotation = 0;
                    var g = b(a.textContent.length);
                    if (h + g > m) {
                        for (; A <= p;) d = Math.ceil((A + p) / 2), e && (k = w(e, d)), g = b(d, k && k.length - 1), A === p ? A = p + 1 : g > m ? p = d - 1 : A = d;
                        0 === p ? a.textContent = "" : c && p === c.length - 1 || (a.textContent = k || w(c || e, d))
                    }
                    e && e.splice(0, d);
                    f.actualWidth = g;
                    f.rotation = t
                };
                h.prototype.unescapeEntities = function (a, c) {
                    B(this.renderer.escapes, function (e, f) {
                        c && -1 !== c.indexOf(e) || (a = a.toString().replace(new RegExp(e, "g"), f))
                    });
                    return a
                };
                return h
            }()
        });
        L(a, "Core/Renderer/SVG/SVGRenderer.js", [a["Core/Renderer/HTML/AST.js"], a["Core/Color/Color.js"], a["Core/Globals.js"], a["Core/Color/Palette.js"], a["Core/Renderer/RendererRegistry.js"], a["Core/Renderer/SVG/SVGElement.js"], a["Core/Renderer/SVG/SVGLabel.js"], a["Core/Renderer/SVG/Symbols.js"], a["Core/Renderer/SVG/TextBuilder.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y, G, B, q, h) {
            var f = E.charts, c = E.deg2rad, e = E.doc, t = E.isFirefox, m = E.isMS, w = E.isWebKit, n = E.noop,
                l = E.SVG_NS, J = E.symbolSizes, K = E.win, A = h.addEvent,
                p = h.attr, d = h.createElement, k = h.css, b = h.defined, g = h.destroyObjectProperties, r = h.extend,
                F = h.isArray, D = h.isNumber, M = h.isObject, C = h.isString, O = h.merge, v = h.pick, W = h.pInt,
                Y = h.uniqueKey, ba;
            E = function () {
                function z(b, d, g, a, k, r, c) {
                    this.width = this.url = this.style = this.isSVG = this.imgCount = this.height = this.gradients = this.globalAnimation = this.defs = this.chartIndex = this.cacheKeys = this.cache = this.boxWrapper = this.box = this.alignedObjects = void 0;
                    this.init(b, d, g, a, k, r, c)
                }

                z.prototype.init = function (b, d, g, a, r, c, z) {
                    var l =
                        this.createElement("svg").attr({version: "1.1", "class": "highcharts-root"}), Q = l.element;
                    z || l.css(this.getStyle(a));
                    b.appendChild(Q);
                    p(b, "dir", "ltr");
                    -1 === b.innerHTML.indexOf("xmlns") && p(Q, "xmlns", this.SVG_NS);
                    this.isSVG = !0;
                    this.box = Q;
                    this.boxWrapper = l;
                    this.alignedObjects = [];
                    this.url = this.getReferenceURL();
                    this.createElement("desc").add().element.appendChild(e.createTextNode("Created with Highcharts 9.1.2"));
                    this.defs = this.createElement("defs").add();
                    this.allowHTML = c;
                    this.forExport = r;
                    this.styledMode =
                        z;
                    this.gradients = {};
                    this.cache = {};
                    this.cacheKeys = [];
                    this.imgCount = 0;
                    this.setSize(d, g, !1);
                    var I;
                    t && b.getBoundingClientRect && (d = function () {
                        k(b, {left: 0, top: 0});
                        I = b.getBoundingClientRect();
                        k(b, {left: Math.ceil(I.left) - I.left + "px", top: Math.ceil(I.top) - I.top + "px"})
                    }, d(), this.unSubPixelFix = A(K, "resize", d))
                };
                z.prototype.definition = function (b) {
                    return (new a([b])).addToDOM(this.defs.element)
                };
                z.prototype.getReferenceURL = function () {
                    if ((t || w) && e.getElementsByTagName("base").length) {
                        if (!b(ba)) {
                            var d = Y();
                            d = (new a([{
                                tagName: "svg",
                                attributes: {width: 8, height: 8},
                                children: [{
                                    tagName: "defs",
                                    children: [{
                                        tagName: "clipPath",
                                        attributes: {id: d},
                                        children: [{tagName: "rect", attributes: {width: 4, height: 4}}]
                                    }]
                                }, {
                                    tagName: "rect",
                                    attributes: {
                                        id: "hitme",
                                        width: 8,
                                        height: 8,
                                        "clip-path": "url(#" + d + ")",
                                        fill: "rgba(0,0,0,0.001)"
                                    }
                                }]
                            }])).addToDOM(e.body);
                            k(d, {position: "fixed", top: 0, left: 0, zIndex: 9E5});
                            var g = e.elementFromPoint(6, 6);
                            ba = "hitme" === (g && g.id);
                            e.body.removeChild(d)
                        }
                        if (ba) return K.location.href.split("#")[0].replace(/<[^>]*>/g, "").replace(/([\('\)])/g,
                            "\\$1").replace(/ /g, "%20")
                    }
                    return ""
                };
                z.prototype.getStyle = function (b) {
                    return this.style = r({
                        fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif',
                        fontSize: "12px"
                    }, b)
                };
                z.prototype.setStyle = function (b) {
                    this.boxWrapper.css(this.getStyle(b))
                };
                z.prototype.isHidden = function () {
                    return !this.boxWrapper.getBBox().width
                };
                z.prototype.destroy = function () {
                    var b = this.defs;
                    this.box = null;
                    this.boxWrapper = this.boxWrapper.destroy();
                    g(this.gradients || {});
                    this.gradients = null;
                    b && (this.defs = b.destroy());
                    this.unSubPixelFix && this.unSubPixelFix();
                    return this.alignedObjects = null
                };
                z.prototype.createElement = function (b) {
                    var d = new this.Element;
                    d.init(this, b);
                    return d
                };
                z.prototype.getRadialAttr = function (b, d) {
                    return {
                        cx: b[0] - b[2] / 2 + (d.cx || 0) * b[2],
                        cy: b[1] - b[2] / 2 + (d.cy || 0) * b[2],
                        r: (d.r || 0) * b[2]
                    }
                };
                z.prototype.buildText = function (b) {
                    (new q(b)).buildSVG()
                };
                z.prototype.getContrast = function (b) {
                    b = u.parse(b).rgba;
                    b[0] *= 1;
                    b[1] *= 1.2;
                    b[2] *= .5;
                    return 459 < b[0] + b[1] + b[2] ? "#000000" : "#FFFFFF"
                };
                z.prototype.button = function (b, d,
                                               g, k, c, z, l, e, f, F) {
                    var I = this.label(b, d, g, f, void 0, void 0, F, void 0, "button"), Q = this.styledMode, P = 0,
                        h = c ? O(c) : {};
                    b = h && h.style || {};
                    h = a.filterUserAttributes(h);
                    I.attr(O({padding: 8, r: 2}, h));
                    if (!Q) {
                        h = O({
                            fill: H.neutralColor3,
                            stroke: H.neutralColor20,
                            "stroke-width": 1,
                            style: {color: H.neutralColor80, cursor: "pointer", fontWeight: "normal"}
                        }, {style: b}, h);
                        var D = h.style;
                        delete h.style;
                        z = O(h, {fill: H.neutralColor10}, a.filterUserAttributes(z || {}));
                        var n = z.style;
                        delete z.style;
                        l = O(h, {
                            fill: H.highlightColor10, style: {
                                color: H.neutralColor100,
                                fontWeight: "bold"
                            }
                        }, a.filterUserAttributes(l || {}));
                        var C = l.style;
                        delete l.style;
                        e = O(h, {style: {color: H.neutralColor20}}, a.filterUserAttributes(e || {}));
                        var N = e.style;
                        delete e.style
                    }
                    A(I.element, m ? "mouseover" : "mouseenter", function () {
                        3 !== P && I.setState(1)
                    });
                    A(I.element, m ? "mouseout" : "mouseleave", function () {
                        3 !== P && I.setState(P)
                    });
                    I.setState = function (b) {
                        1 !== b && (I.state = P = b);
                        I.removeClass(/highcharts-button-(normal|hover|pressed|disabled)/).addClass("highcharts-button-" + ["normal", "hover", "pressed", "disabled"][b ||
                        0]);
                        Q || I.attr([h, z, l, e][b || 0]).css([D, n, C, N][b || 0])
                    };
                    Q || I.attr(h).css(r({cursor: "default"}, D));
                    return I.on("touchstart", function (b) {
                        return b.stopPropagation()
                    }).on("click", function (b) {
                        3 !== P && k.call(I, b)
                    })
                };
                z.prototype.crispLine = function (d, g, a) {
                    void 0 === a && (a = "round");
                    var k = d[0], r = d[1];
                    b(k[1]) && k[1] === r[1] && (k[1] = r[1] = Math[a](k[1]) - g % 2 / 2);
                    b(k[2]) && k[2] === r[2] && (k[2] = r[2] = Math[a](k[2]) + g % 2 / 2);
                    return d
                };
                z.prototype.path = function (b) {
                    var d = this.styledMode ? {} : {fill: "none"};
                    F(b) ? d.d = b : M(b) && r(d, b);
                    return this.createElement("path").attr(d)
                };
                z.prototype.circle = function (b, d, g) {
                    b = M(b) ? b : "undefined" === typeof b ? {} : {x: b, y: d, r: g};
                    d = this.createElement("circle");
                    d.xSetter = d.ySetter = function (b, d, g) {
                        g.setAttribute("c" + d, b)
                    };
                    return d.attr(b)
                };
                z.prototype.arc = function (b, d, g, a, k, r) {
                    M(b) ? (a = b, d = a.y, g = a.r, b = a.x) : a = {innerR: a, start: k, end: r};
                    b = this.symbol("arc", b, d, g, g, a);
                    b.r = g;
                    return b
                };
                z.prototype.rect = function (b, d, g, a, k, r) {
                    k = M(b) ? b.r : k;
                    var c = this.createElement("rect");
                    b = M(b) ? b : "undefined" === typeof b ? {} : {
                        x: b, y: d, width: Math.max(g, 0), height: Math.max(a,
                            0)
                    };
                    this.styledMode || ("undefined" !== typeof r && (b["stroke-width"] = r, b = c.crisp(b)), b.fill = "none");
                    k && (b.r = k);
                    c.rSetter = function (b, d, g) {
                        c.r = b;
                        p(g, {rx: b, ry: b})
                    };
                    c.rGetter = function () {
                        return c.r || 0
                    };
                    return c.attr(b)
                };
                z.prototype.setSize = function (b, d, g) {
                    this.width = b;
                    this.height = d;
                    this.boxWrapper.animate({width: b, height: d}, {
                        step: function () {
                            this.attr({viewBox: "0 0 " + this.attr("width") + " " + this.attr("height")})
                        }, duration: v(g, !0) ? void 0 : 0
                    });
                    this.alignElements()
                };
                z.prototype.g = function (b) {
                    var d = this.createElement("g");
                    return b ? d.attr({"class": "highcharts-" + b}) : d
                };
                z.prototype.image = function (b, d, g, a, k, c) {
                    var z = {preserveAspectRatio: "none"}, l = function (b, d) {
                        b.setAttributeNS ? b.setAttributeNS("http://www.w3.org/1999/xlink", "href", d) : b.setAttribute("hc-svg-href", d)
                    };
                    1 < arguments.length && r(z, {x: d, y: g, width: a, height: k});
                    var I = this.createElement("image").attr(z);
                    z = function (d) {
                        l(I.element, b);
                        c.call(I, d)
                    };
                    if (c) {
                        l(I.element, "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==");
                        var e = new K.Image;
                        A(e, "load",
                            z);
                        e.src = b;
                        e.complete && z({})
                    } else l(I.element, b);
                    return I
                };
                z.prototype.symbol = function (g, a, c, z, l, F) {
                    var I = this, Q = /^url\((.*?)\)$/, h = Q.test(g), D = !h && (this.symbols[g] ? g : "circle"),
                        n = D && this.symbols[D], C;
                    if (n) {
                        "number" === typeof a && (C = n.call(this.symbols, Math.round(a || 0), Math.round(c || 0), z || 0, l || 0, F));
                        var p = this.path(C);
                        I.styledMode || p.attr("fill", "none");
                        r(p, {symbolName: D || void 0, x: a, y: c, width: z, height: l});
                        F && r(p, F)
                    } else if (h) {
                        var N = g.match(Q)[1];
                        var w = p = this.image(N);
                        w.imgwidth = v(J[N] && J[N].width, F &&
                            F.width);
                        w.imgheight = v(J[N] && J[N].height, F && F.height);
                        var m = function (b) {
                            return b.attr({width: b.width, height: b.height})
                        };
                        ["width", "height"].forEach(function (d) {
                            w[d + "Setter"] = function (d, g) {
                                var a = this["img" + g];
                                this[g] = d;
                                b(a) && (F && "within" === F.backgroundSize && this.width && this.height && (a = Math.round(a * Math.min(this.width / this.imgwidth, this.height / this.imgheight))), this.element && this.element.setAttribute(g, a), this.alignByTranslate || (d = ((this[g] || 0) - a) / 2, this.attr("width" === g ? {translateX: d} : {translateY: d})))
                            }
                        });
                        b(a) && w.attr({x: a, y: c});
                        w.isImg = !0;
                        b(w.imgwidth) && b(w.imgheight) ? m(w) : (w.attr({width: 0, height: 0}), d("img", {
                            onload: function () {
                                var b = f[I.chartIndex];
                                0 === this.width && (k(this, {
                                    position: "absolute",
                                    top: "-999em"
                                }), e.body.appendChild(this));
                                J[N] = {width: this.width, height: this.height};
                                w.imgwidth = this.width;
                                w.imgheight = this.height;
                                w.element && m(w);
                                this.parentNode && this.parentNode.removeChild(this);
                                I.imgCount--;
                                if (!I.imgCount && b && !b.hasLoaded) b.onload()
                            }, src: N
                        }), this.imgCount++)
                    }
                    return p
                };
                z.prototype.clipRect =
                    function (b, d, g, a) {
                        var k = Y() + "-", r = this.createElement("clipPath").attr({id: k}).add(this.defs);
                        b = this.rect(b, d, g, a, 0).add(r);
                        b.id = k;
                        b.clipPath = r;
                        b.count = 0;
                        return b
                    };
                z.prototype.text = function (d, g, a, k) {
                    var r = {};
                    if (k && (this.allowHTML || !this.forExport)) return this.html(d, g, a);
                    r.x = Math.round(g || 0);
                    a && (r.y = Math.round(a));
                    b(d) && (r.text = d);
                    d = this.createElement("text").attr(r);
                    k || (d.xSetter = function (b, d, g) {
                        for (var a = g.getElementsByTagName("tspan"), k = g.getAttribute(d), r = 0, c; r < a.length; r++) c = a[r], c.getAttribute(d) ===
                        k && c.setAttribute(d, b);
                        g.setAttribute(d, b)
                    });
                    return d
                };
                z.prototype.fontMetrics = function (b, d) {
                    b = !this.styledMode && /px/.test(b) || !K.getComputedStyle ? b || d && d.style && d.style.fontSize || this.style && this.style.fontSize : d && y.prototype.getStyle.call(d, "font-size");
                    b = /px/.test(b) ? W(b) : 12;
                    d = 24 > b ? b + 3 : Math.round(1.2 * b);
                    return {h: d, b: Math.round(.8 * d), f: b}
                };
                z.prototype.rotCorr = function (b, d, g) {
                    var a = b;
                    d && g && (a = Math.max(a * Math.cos(d * c), 4));
                    return {x: -b / 3 * Math.sin(d * c), y: a}
                };
                z.prototype.pathToSegments = function (b) {
                    for (var d =
                        [], g = [], a = {
                        A: 8,
                        C: 7,
                        H: 2,
                        L: 3,
                        M: 3,
                        Q: 5,
                        S: 5,
                        T: 3,
                        V: 2
                    }, k = 0; k < b.length; k++) C(g[0]) && D(b[k]) && g.length === a[g[0].toUpperCase()] && b.splice(k, 0, g[0].replace("M", "L").replace("m", "l")), "string" === typeof b[k] && (g.length && d.push(g.slice(0)), g.length = 0), g.push(b[k]);
                    d.push(g.slice(0));
                    return d
                };
                z.prototype.label = function (b, d, g, a, k, r, c, z, l) {
                    return new G(this, b, d, g, a, k, r, c, z, l)
                };
                z.prototype.alignElements = function () {
                    this.alignedObjects.forEach(function (b) {
                        return b.align()
                    })
                };
                return z
            }();
            r(E.prototype, {
                Element: y, SVG_NS: l,
                escapes: {"&": "&amp;", "<": "&lt;", ">": "&gt;", "'": "&#39;", '"': "&quot;"}, symbols: B, draw: n
            });
            x.registerRendererType("svg", E, !0);
            "";
            return E
        });
        L(a, "Core/Renderer/HTML/HTMLElement.js", [a["Core/Globals.js"], a["Core/Renderer/SVG/SVGElement.js"], a["Core/Utilities.js"]], function (a, u, E) {
            var v = this && this.__extends || function () {
                    var a = function (c, e) {
                        a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, c) {
                            a.__proto__ = c
                        } || function (a, c) {
                            for (var l in c) c.hasOwnProperty(l) && (a[l] = c[l])
                        };
                        return a(c, e)
                    };
                    return function (c,
                                     e) {
                        function f() {
                            this.constructor = c
                        }

                        a(c, e);
                        c.prototype = null === e ? Object.create(e) : (f.prototype = e.prototype, new f)
                    }
                }(), x = a.isFirefox, y = a.isMS, G = a.isWebKit, B = a.win, q = E.css, h = E.defined, f = E.extend,
                c = E.pick, e = E.pInt;
            return function (a) {
                function m() {
                    return null !== a && a.apply(this, arguments) || this
                }

                v(m, a);
                m.compose = function (a) {
                    a = a.prototype;
                    var c = m.prototype;
                    a.getSpanCorrection = c.getSpanCorrection;
                    a.htmlCss = c.htmlCss;
                    a.htmlGetBBox = c.htmlGetBBox;
                    a.htmlUpdateTransform = c.htmlUpdateTransform;
                    a.setSpanRotation = c.setSpanRotation
                };
                m.prototype.getSpanCorrection = function (a, c, l) {
                    this.xCorr = -a * l;
                    this.yCorr = -c
                };
                m.prototype.htmlCss = function (a) {
                    var e = "SPAN" === this.element.tagName && a && "width" in a, l = c(e && a.width, void 0);
                    if (e) {
                        delete a.width;
                        this.textWidth = l;
                        var h = !0
                    }
                    a && "ellipsis" === a.textOverflow && (a.whiteSpace = "nowrap", a.overflow = "hidden");
                    this.styles = f(this.styles, a);
                    q(this.element, a);
                    h && this.htmlUpdateTransform();
                    return this
                };
                m.prototype.htmlGetBBox = function () {
                    var a = this.element;
                    return {
                        x: a.offsetLeft, y: a.offsetTop, width: a.offsetWidth,
                        height: a.offsetHeight
                    }
                };
                m.prototype.htmlUpdateTransform = function () {
                    if (this.added) {
                        var a = this.renderer, c = this.element, l = this.translateX || 0, f = this.translateY || 0,
                            m = this.x || 0, t = this.y || 0, p = this.textAlign || "left",
                            d = {left: 0, center: .5, right: 1}[p], k = this.styles;
                        k = k && k.whiteSpace;
                        q(c, {marginLeft: l, marginTop: f});
                        !a.styledMode && this.shadows && this.shadows.forEach(function (b) {
                            q(b, {marginLeft: l + 1, marginTop: f + 1})
                        });
                        this.inverted && [].forEach.call(c.childNodes, function (b) {
                            a.invertChild(b, c)
                        });
                        if ("SPAN" === c.tagName) {
                            var b =
                                    this.rotation, g = this.textWidth && e(this.textWidth),
                                r = [b, p, c.innerHTML, this.textWidth, this.textAlign].join(), F = void 0;
                            (F = g !== this.oldTextWidth) && !(F = g > this.oldTextWidth) && ((F = this.textPxLength) || (q(c, {
                                width: "",
                                whiteSpace: k || "nowrap"
                            }), F = c.offsetWidth), F = F > g);
                            F && (/[ \-]/.test(c.textContent || c.innerText) || "ellipsis" === c.style.textOverflow) ? (q(c, {
                                width: g + "px",
                                display: "block",
                                whiteSpace: k || "normal"
                            }), this.oldTextWidth = g, this.hasBoxWidthChanged = !0) : this.hasBoxWidthChanged = !1;
                            r !== this.cTT && (F = a.fontMetrics(c.style.fontSize,
                                c).b, !h(b) || b === (this.oldRotation || 0) && p === this.oldAlign || this.setSpanRotation(b, d, F), this.getSpanCorrection(!h(b) && this.textPxLength || c.offsetWidth, F, d, b, p));
                            q(c, {left: m + (this.xCorr || 0) + "px", top: t + (this.yCorr || 0) + "px"});
                            this.cTT = r;
                            this.oldRotation = b;
                            this.oldAlign = p
                        }
                    } else this.alignOnAdd = !0
                };
                m.prototype.setSpanRotation = function (a, c, l) {
                    var e = {},
                        f = y && !/Edge/.test(B.navigator.userAgent) ? "-ms-transform" : G ? "-webkit-transform" : x ? "MozTransform" : B.opera ? "-o-transform" : void 0;
                    f && (e[f] = e.transform = "rotate(" +
                        a + "deg)", e[f + (x ? "Origin" : "-origin")] = e.transformOrigin = 100 * c + "% " + l + "px", q(this.element, e))
                };
                return m
            }(u)
        });
        L(a, "Core/Renderer/HTML/HTMLRenderer.js", [a["Core/Renderer/HTML/AST.js"], a["Core/Renderer/SVG/SVGElement.js"], a["Core/Renderer/SVG/SVGRenderer.js"], a["Core/Utilities.js"]], function (a, u, E, H) {
            var v = this && this.__extends || function () {
                var a = function (f, c) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, c) {
                        a.__proto__ = c
                    } || function (a, c) {
                        for (var e in c) c.hasOwnProperty(e) && (a[e] = c[e])
                    };
                    return a(f, c)
                };
                return function (f, c) {
                    function e() {
                        this.constructor = f
                    }

                    a(f, c);
                    f.prototype = null === c ? Object.create(c) : (e.prototype = c.prototype, new e)
                }
            }(), y = H.attr, G = H.createElement, B = H.extend, q = H.pick;
            return function (h) {
                function f() {
                    return null !== h && h.apply(this, arguments) || this
                }

                v(f, h);
                f.compose = function (a) {
                    a.prototype.html = f.prototype.html
                };
                f.prototype.html = function (c, e, f) {
                    var h = this.createElement("span"), w = h.element, n = h.renderer, l = n.isSVG,
                        t = function (a, c) {
                            ["opacity", "visibility"].forEach(function (l) {
                                a[l +
                                "Setter"] = function (d, k, b) {
                                    var g = a.div ? a.div.style : c;
                                    u.prototype[l + "Setter"].call(this, d, k, b);
                                    g && (g[k] = d)
                                }
                            });
                            a.addedSetters = !0
                        };
                    h.textSetter = function (c) {
                        c !== this.textStr && (delete this.bBox, delete this.oldTextWidth, a.setElementHTML(this.element, q(c, "")), this.textStr = c, h.doTransform = !0)
                    };
                    l && t(h, h.element.style);
                    h.xSetter = h.ySetter = h.alignSetter = h.rotationSetter = function (a, c) {
                        "align" === c ? h.alignValue = h.textAlign = a : h[c] = a;
                        h.doTransform = !0
                    };
                    h.afterSetters = function () {
                        this.doTransform && (this.htmlUpdateTransform(),
                            this.doTransform = !1)
                    };
                    h.attr({text: c, x: Math.round(e), y: Math.round(f)}).css({position: "absolute"});
                    n.styledMode || h.css({fontFamily: this.style.fontFamily, fontSize: this.style.fontSize});
                    w.style.whiteSpace = "nowrap";
                    h.css = h.htmlCss;
                    l && (h.add = function (a) {
                        var c = n.box.parentNode, l = [];
                        if (this.parentGroup = a) {
                            var d = a.div;
                            if (!d) {
                                for (; a;) l.push(a), a = a.parentGroup;
                                l.reverse().forEach(function (a) {
                                    function b(b, d) {
                                        a[d] = b;
                                        "translateX" === d ? e.left = b + "px" : e.top = b + "px";
                                        a.doTransform = !0
                                    }

                                    var g = y(a.element, "class"), k = a.styles ||
                                        {};
                                    d = a.div = a.div || G("div", g ? {className: g} : void 0, {
                                        position: "absolute",
                                        left: (a.translateX || 0) + "px",
                                        top: (a.translateY || 0) + "px",
                                        display: a.display,
                                        opacity: a.opacity,
                                        cursor: k.cursor,
                                        pointerEvents: k.pointerEvents
                                    }, d || c);
                                    var e = d.style;
                                    B(a, {
                                        classSetter: function (b) {
                                            return function (d) {
                                                this.element.setAttribute("class", d);
                                                b.className = d
                                            }
                                        }(d), on: function () {
                                            l[0].div && h.on.apply({
                                                element: l[0].div,
                                                onEvents: h.onEvents
                                            }, arguments);
                                            return a
                                        }, translateXSetter: b, translateYSetter: b
                                    });
                                    a.addedSetters || t(a)
                                })
                            }
                        } else d = c;
                        d.appendChild(w);
                        h.added = !0;
                        h.alignOnAdd && h.htmlUpdateTransform();
                        return h
                    });
                    return h
                };
                return f
            }(E)
        });
        L(a, "Core/Foundation.js", [a["Core/Utilities.js"]], function (a) {
            var v = a.addEvent, E = a.isFunction, H = a.objectEach, x = a.removeEvent;
            return {
                registerEventOptions: function (a, u) {
                    a.eventOptions = a.eventOptions || {};
                    H(u.events, function (u, q) {
                        E(u) && a.eventOptions[q] !== u && (E(a.eventOptions[q]) && x(a, q, a.eventOptions[q]), a.eventOptions[q] = u, v(a, q, u))
                    })
                }
            }
        });
        L(a, "Core/Axis/AxisDefaults.js", [a["Core/Color/Palette.js"]], function (a) {
            var v;
            (function (v) {
                v.defaultXAxisOptions = {
                    alignTicks: !0,
                    allowDecimals: void 0,
                    panningEnabled: !0,
                    zIndex: 2,
                    zoomEnabled: !0,
                    dateTimeLabelFormats: {
                        millisecond: {main: "%H:%M:%S.%L", range: !1},
                        second: {main: "%H:%M:%S", range: !1},
                        minute: {main: "%H:%M", range: !1},
                        hour: {main: "%H:%M", range: !1},
                        day: {main: "%e. %b"},
                        week: {main: "%e. %b"},
                        month: {main: "%b '%y"},
                        year: {main: "%Y"}
                    },
                    endOnTick: !1,
                    gridLineDashStyle: "Solid",
                    gridZIndex: 1,
                    labels: {
                        autoRotation: void 0,
                        autoRotationLimit: 80,
                        distance: void 0,
                        enabled: !0,
                        indentation: 10,
                        overflow: "justify",
                        padding: 5,
                        reserveSpace: void 0,
                        rotation: void 0,
                        staggerLines: 0,
                        step: 0,
                        useHTML: !1,
                        x: 0,
                        zIndex: 7,
                        style: {color: a.neutralColor60, cursor: "default", fontSize: "11px"}
                    },
                    maxPadding: .01,
                    minorGridLineDashStyle: "Solid",
                    minorTickLength: 2,
                    minorTickPosition: "outside",
                    minPadding: .01,
                    offset: void 0,
                    opposite: !1,
                    reversed: void 0,
                    reversedStacks: !1,
                    showEmpty: !0,
                    showFirstLabel: !0,
                    showLastLabel: !0,
                    startOfWeek: 1,
                    startOnTick: !1,
                    tickLength: 10,
                    tickPixelInterval: 100,
                    tickmarkPlacement: "between",
                    tickPosition: "outside",
                    title: {
                        align: "middle",
                        rotation: 0, useHTML: !1, x: 0, y: 0, style: {color: a.neutralColor60}
                    },
                    type: "linear",
                    uniqueNames: !0,
                    visible: !0,
                    minorGridLineColor: a.neutralColor5,
                    minorGridLineWidth: 1,
                    minorTickColor: a.neutralColor40,
                    lineColor: a.highlightColor20,
                    lineWidth: 1,
                    gridLineColor: a.neutralColor10,
                    gridLineWidth: void 0,
                    tickColor: a.highlightColor20
                };
                v.defaultYAxisOptions = {
                    reversedStacks: !0,
                    endOnTick: !0,
                    maxPadding: .05,
                    minPadding: .05,
                    tickPixelInterval: 72,
                    showLastLabel: !0,
                    labels: {x: -8},
                    startOnTick: !0,
                    title: {rotation: 270, text: "Values"},
                    stackLabels: {
                        animation: {},
                        allowOverlap: !1,
                        enabled: !1,
                        crop: !0,
                        overflow: "justify",
                        formatter: function () {
                            var a = this.axis.chart.numberFormatter;
                            return a(this.total, -1)
                        },
                        style: {
                            color: a.neutralColor100,
                            fontSize: "11px",
                            fontWeight: "bold",
                            textOutline: "1px contrast"
                        }
                    },
                    gridLineWidth: 1,
                    lineWidth: 0
                };
                v.defaultLeftAxisOptions = {labels: {x: -15}, title: {rotation: 270}};
                v.defaultRightAxisOptions = {labels: {x: 15}, title: {rotation: 90}};
                v.defaultBottomAxisOptions = {labels: {autoRotation: [-45], x: 0}, margin: 15, title: {rotation: 0}};
                v.defaultTopAxisOptions = {
                    labels: {
                        autoRotation: [-45],
                        x: 0
                    }, margin: 15, title: {rotation: 0}
                }
            })(v || (v = {}));
            return v
        });
        L(a, "Core/Axis/Tick.js", [a["Core/FormatUtilities.js"], a["Core/Globals.js"], a["Core/Utilities.js"]], function (a, u, E) {
            var v = u.deg2rad, x = E.clamp, y = E.correctFloat, G = E.defined, B = E.destroyObjectProperties,
                q = E.extend, h = E.fireEvent, f = E.isNumber, c = E.merge, e = E.objectEach, t = E.pick;
            u = function () {
                function m(a, c, l, e, f) {
                    this.isNewLabel = this.isNew = !0;
                    this.axis = a;
                    this.pos = c;
                    this.type = l || "";
                    this.parameters = f || {};
                    this.tickmarkOffset = this.parameters.tickmarkOffset;
                    this.options = this.parameters.options;
                    h(this, "init");
                    l || e || this.addLabel()
                }

                m.prototype.addLabel = function () {
                    var c = this, e = c.axis, l = e.options, m = e.chart, K = e.categories, A = e.logarithmic,
                        p = e.names, d = c.pos, k = t(c.options && c.options.labels, l.labels), b = e.tickPositions,
                        g = d === b[0], r = d === b[b.length - 1],
                        F = (!k.step || 1 === k.step) && 1 === e.tickInterval;
                    b = b.info;
                    var D = c.label, M;
                    K = this.parameters.category || (K ? t(K[d], p[d], d) : d);
                    A && f(K) && (K = y(A.lin2log(K)));
                    if (e.dateTime && b) {
                        var C = m.time.resolveDTLFormat(l.dateTimeLabelFormats[!l.grid &&
                        b.higherRanks[d] || b.unitName]);
                        var O = C.main
                    }
                    c.isFirst = g;
                    c.isLast = r;
                    var v = {
                        axis: e,
                        chart: m,
                        dateTimeLabelFormat: O,
                        isFirst: g,
                        isLast: r,
                        pos: d,
                        tick: c,
                        tickPositionInfo: b,
                        value: K
                    };
                    h(this, "labelFormat", v);
                    var W = function (b) {
                        return k.formatter ? k.formatter.call(b, b) : k.format ? (b.text = e.defaultLabelFormatter.call(b), a.format(k.format, b, m)) : e.defaultLabelFormatter.call(b, b)
                    };
                    l = W.call(v, v);
                    var u = C && C.list;
                    c.shortenLabel = u ? function () {
                        for (M = 0; M < u.length; M++) if (q(v, {dateTimeLabelFormat: u[M]}), D.attr({text: W.call(v, v)}),
                        D.getBBox().width < e.getSlotWidth(c) - 2 * k.padding) return;
                        D.attr({text: ""})
                    } : void 0;
                    F && e._addedPlotLB && c.moveLabel(l, k);
                    G(D) || c.movedLabel ? D && D.textStr !== l && !F && (!D.textWidth || k.style.width || D.styles.width || D.css({width: null}), D.attr({text: l}), D.textPxLength = D.getBBox().width) : (c.label = D = c.createLabel({
                        x: 0,
                        y: 0
                    }, l, k), c.rotation = 0)
                };
                m.prototype.createLabel = function (a, e, l) {
                    var f = this.axis, h = f.chart;
                    if (a = G(e) && l.enabled ? h.renderer.text(e, a.x, a.y, l.useHTML).add(f.labelGroup) : null) h.styledMode || a.css(c(l.style)),
                        a.textPxLength = a.getBBox().width;
                    return a
                };
                m.prototype.destroy = function () {
                    B(this, this.axis)
                };
                m.prototype.getPosition = function (a, c, l, e) {
                    var f = this.axis, n = f.chart, p = e && n.oldChartHeight || n.chartHeight;
                    a = {
                        x: a ? y(f.translate(c + l, null, null, e) + f.transB) : f.left + f.offset + (f.opposite ? (e && n.oldChartWidth || n.chartWidth) - f.right - f.left : 0),
                        y: a ? p - f.bottom + f.offset - (f.opposite ? f.height : 0) : y(p - f.translate(c + l, null, null, e) - f.transB)
                    };
                    a.y = x(a.y, -1E5, 1E5);
                    h(this, "afterGetPosition", {pos: a});
                    return a
                };
                m.prototype.getLabelPosition =
                    function (a, c, l, e, f, m, p, d) {
                        var k = this.axis, b = k.transA,
                            g = k.isLinked && k.linkedParent ? k.linkedParent.reversed : k.reversed, r = k.staggerLines,
                            F = k.tickRotCorr || {x: 0, y: 0},
                            D = e || k.reserveSpaceDefault ? 0 : -k.labelOffset * ("center" === k.labelAlign ? .5 : 1),
                            n = {}, C = f.y;
                        G(C) || (C = 0 === k.side ? l.rotation ? -8 : -l.getBBox().height : 2 === k.side ? F.y + 8 : Math.cos(l.rotation * v) * (F.y - l.getBBox(!1, 0).height / 2));
                        a = a + f.x + D + F.x - (m && e ? m * b * (g ? -1 : 1) : 0);
                        c = c + C - (m && !e ? m * b * (g ? 1 : -1) : 0);
                        r && (l = p / (d || 1) % r, k.opposite && (l = r - l - 1), c += k.labelOffset / r * l);
                        n.x =
                            a;
                        n.y = Math.round(c);
                        h(this, "afterGetLabelPosition", {pos: n, tickmarkOffset: m, index: p});
                        return n
                    };
                m.prototype.getLabelSize = function () {
                    return this.label ? this.label.getBBox()[this.axis.horiz ? "height" : "width"] : 0
                };
                m.prototype.getMarkPath = function (a, c, l, e, f, h) {
                    return h.crispLine([["M", a, c], ["L", a + (f ? 0 : -l), c + (f ? l : 0)]], e)
                };
                m.prototype.handleOverflow = function (a) {
                    var c = this.axis, l = c.options.labels, e = a.x, f = c.chart.chartWidth, h = c.chart.spacing,
                        p = t(c.labelLeft, Math.min(c.pos, h[3]));
                    h = t(c.labelRight, Math.max(c.isRadial ?
                        0 : c.pos + c.len, f - h[1]));
                    var d = this.label, k = this.rotation,
                        b = {left: 0, center: .5, right: 1}[c.labelAlign || d.attr("align")], g = d.getBBox().width,
                        r = c.getSlotWidth(this), F = {}, D = r, M = 1, C;
                    if (k || "justify" !== l.overflow) 0 > k && e - b * g < p ? C = Math.round(e / Math.cos(k * v) - p) : 0 < k && e + b * g > h && (C = Math.round((f - e) / Math.cos(k * v))); else if (f = e + (1 - b) * g, e - b * g < p ? D = a.x + D * (1 - b) - p : f > h && (D = h - a.x + D * b, M = -1), D = Math.min(r, D), D < r && "center" === c.labelAlign && (a.x += M * (r - D - b * (r - Math.min(g, D)))), g > D || c.autoRotation && (d.styles || {}).width) C = D;
                    C && (this.shortenLabel ?
                        this.shortenLabel() : (F.width = Math.floor(C) + "px", (l.style || {}).textOverflow || (F.textOverflow = "ellipsis"), d.css(F)))
                };
                m.prototype.moveLabel = function (a, c) {
                    var l = this, f = l.label, h = l.axis, n = h.reversed, p = !1;
                    f && f.textStr === a ? (l.movedLabel = f, p = !0, delete l.label) : e(h.ticks, function (d) {
                        p || d.isNew || d === l || !d.label || d.label.textStr !== a || (l.movedLabel = d.label, p = !0, d.labelPos = l.movedLabel.xy, delete d.label)
                    });
                    if (!p && (l.labelPos || f)) {
                        var d = l.labelPos || f.xy;
                        f = h.horiz ? n ? 0 : h.width + h.left : d.x;
                        h = h.horiz ? d.y : n ? h.width +
                            h.left : 0;
                        l.movedLabel = l.createLabel({x: f, y: h}, a, c);
                        l.movedLabel && l.movedLabel.attr({opacity: 0})
                    }
                };
                m.prototype.render = function (a, c, l) {
                    var e = this.axis, f = e.horiz, n = this.pos, p = t(this.tickmarkOffset, e.tickmarkOffset);
                    n = this.getPosition(f, n, p, c);
                    p = n.x;
                    var d = n.y;
                    e = f && p === e.pos + e.len || !f && d === e.pos ? -1 : 1;
                    f = t(l, this.label && this.label.newOpacity, 1);
                    l = t(l, 1);
                    this.isActive = !0;
                    this.renderGridLine(c, l, e);
                    this.renderMark(n, l, e);
                    this.renderLabel(n, c, f, a);
                    this.isNew = !1;
                    h(this, "afterRender")
                };
                m.prototype.renderGridLine =
                    function (a, c, e) {
                        var l = this.axis, f = l.options, h = {}, p = this.pos, d = this.type,
                            k = t(this.tickmarkOffset, l.tickmarkOffset), b = l.chart.renderer, g = this.gridLine,
                            r = f.gridLineWidth, F = f.gridLineColor, D = f.gridLineDashStyle;
                        "minor" === this.type && (r = f.minorGridLineWidth, F = f.minorGridLineColor, D = f.minorGridLineDashStyle);
                        g || (l.chart.styledMode || (h.stroke = F, h["stroke-width"] = r || 0, h.dashstyle = D), d || (h.zIndex = 1), a && (c = 0), this.gridLine = g = b.path().attr(h).addClass("highcharts-" + (d ? d + "-" : "") + "grid-line").add(l.gridGroup));
                        if (g && (e = l.getPlotLinePath({
                            value: p + k,
                            lineWidth: g.strokeWidth() * e,
                            force: "pass",
                            old: a
                        }))) g[a || this.isNew ? "attr" : "animate"]({d: e, opacity: c})
                    };
                m.prototype.renderMark = function (a, c, e) {
                    var l = this.axis, f = l.options, h = l.chart.renderer, p = this.type,
                        d = l.tickSize(p ? p + "Tick" : "tick"), k = a.x;
                    a = a.y;
                    var b = t(f["minor" !== p ? "tickWidth" : "minorTickWidth"], !p && l.isXAxis ? 1 : 0);
                    f = f["minor" !== p ? "tickColor" : "minorTickColor"];
                    var g = this.mark, r = !g;
                    d && (l.opposite && (d[0] = -d[0]), g || (this.mark = g = h.path().addClass("highcharts-" + (p ? p +
                        "-" : "") + "tick").add(l.axisGroup), l.chart.styledMode || g.attr({
                        stroke: f,
                        "stroke-width": b
                    })), g[r ? "attr" : "animate"]({
                        d: this.getMarkPath(k, a, d[0], g.strokeWidth() * e, l.horiz, h),
                        opacity: c
                    }))
                };
                m.prototype.renderLabel = function (a, c, e, h) {
                    var l = this.axis, n = l.horiz, p = l.options, d = this.label, k = p.labels, b = k.step;
                    l = t(this.tickmarkOffset, l.tickmarkOffset);
                    var g = a.x;
                    a = a.y;
                    var r = !0;
                    d && f(g) && (d.xy = a = this.getLabelPosition(g, a, d, n, k, l, h, b), this.isFirst && !this.isLast && !p.showFirstLabel || this.isLast && !this.isFirst && !p.showLastLabel ?
                        r = !1 : !n || k.step || k.rotation || c || 0 === e || this.handleOverflow(a), b && h % b && (r = !1), r && f(a.y) ? (a.opacity = e, d[this.isNewLabel ? "attr" : "animate"](a), this.isNewLabel = !1) : (d.attr("y", -9999), this.isNewLabel = !0))
                };
                m.prototype.replaceMovedLabel = function () {
                    var a = this.label, c = this.axis, e = c.reversed;
                    if (a && !this.isNew) {
                        var f = c.horiz ? e ? c.left : c.width + c.left : a.xy.x;
                        e = c.horiz ? a.xy.y : e ? c.width + c.top : c.top;
                        a.animate({x: f, y: e, opacity: 0}, void 0, a.destroy);
                        delete this.label
                    }
                    c.isDirty = !0;
                    this.label = this.movedLabel;
                    delete this.movedLabel
                };
                return m
            }();
            "";
            return u
        });
        L(a, "Core/Axis/Axis.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/Color/Color.js"], a["Core/Color/Palette.js"], a["Core/DefaultOptions.js"], a["Core/Foundation.js"], a["Core/Globals.js"], a["Core/Utilities.js"], a["Core/Axis/AxisDefaults.js"], a["Core/Axis/Tick.js"]], function (a, u, E, H, x, y, G, B, q) {
            var h = a.animObject, f = x.registerEventOptions, c = y.deg2rad, e = H.defaultOptions, t = G.arrayMax,
                m = G.arrayMin, w = G.clamp, n = G.correctFloat, l = G.defined, J = G.destroyObjectProperties,
                v = G.erase,
                A = G.error, p = G.extend, d = G.fireEvent, k = G.getMagnitude, b = G.isArray, g = G.isNumber,
                r = G.isString, F = G.merge, D = G.normalizeTickInterval, M = G.objectEach, C = G.pick,
                O = G.relativeLength, S = G.removeEvent, W = G.splat, Y = G.syncTimeout;
            a = function () {
                function a(b, a) {
                    this.zoomEnabled = this.width = this.visible = this.userOptions = this.translationSlope = this.transB = this.transA = this.top = this.ticks = this.tickRotCorr = this.tickPositions = this.tickmarkOffset = this.tickInterval = this.tickAmount = this.side = this.series = this.right = this.positiveValuesOnly =
                        this.pos = this.pointRangePadding = this.pointRange = this.plotLinesAndBandsGroups = this.plotLinesAndBands = this.paddedTicks = this.overlap = this.options = this.offset = this.names = this.minPixelPadding = this.minorTicks = this.minorTickInterval = this.min = this.maxLabelLength = this.max = this.len = this.left = this.labelFormatter = this.labelEdge = this.isLinked = this.height = this.hasVisibleSeries = this.hasNames = this.eventOptions = this.coll = this.closestPointRange = this.chart = this.categories = this.bottom = this.alternateBands = void 0;
                    this.init(b,
                        a)
                }

                a.prototype.init = function (b, a) {
                    var c = a.isX;
                    this.chart = b;
                    this.horiz = b.inverted && !this.isZAxis ? !c : c;
                    this.isXAxis = c;
                    this.coll = this.coll || (c ? "xAxis" : "yAxis");
                    d(this, "init", {userOptions: a});
                    this.opposite = C(a.opposite, this.opposite);
                    this.side = C(a.side, this.side, this.horiz ? this.opposite ? 0 : 2 : this.opposite ? 1 : 3);
                    this.setOptions(a);
                    var k = this.options, r = k.labels, e = k.type;
                    this.userOptions = a;
                    this.minPixelPadding = 0;
                    this.reversed = C(k.reversed, this.reversed);
                    this.visible = k.visible;
                    this.zoomEnabled = k.zoomEnabled;
                    this.hasNames = "category" === e || !0 === k.categories;
                    this.categories = k.categories || this.hasNames;
                    this.names || (this.names = [], this.names.keys = {});
                    this.plotLinesAndBandsGroups = {};
                    this.positiveValuesOnly = !!this.logarithmic;
                    this.isLinked = l(k.linkedTo);
                    this.ticks = {};
                    this.labelEdge = [];
                    this.minorTicks = {};
                    this.plotLinesAndBands = [];
                    this.alternateBands = {};
                    this.len = 0;
                    this.minRange = this.userMinRange = k.minRange || k.maxZoom;
                    this.range = k.range;
                    this.offset = k.offset || 0;
                    this.min = this.max = null;
                    a = C(k.crosshair, W(b.options.tooltip.crosshairs)[c ?
                        0 : 1]);
                    this.crosshair = !0 === a ? {} : a;
                    -1 === b.axes.indexOf(this) && (c ? b.axes.splice(b.xAxis.length, 0, this) : b.axes.push(this), b[this.coll].push(this));
                    this.series = this.series || [];
                    b.inverted && !this.isZAxis && c && "undefined" === typeof this.reversed && (this.reversed = !0);
                    this.labelRotation = g(r.rotation) ? r.rotation : void 0;
                    f(this, k);
                    d(this, "afterInit")
                };
                a.prototype.setOptions = function (b) {
                    this.options = F(B.defaultXAxisOptions, "yAxis" === this.coll && B.defaultYAxisOptions, [B.defaultTopAxisOptions, B.defaultRightAxisOptions,
                        B.defaultBottomAxisOptions, B.defaultLeftAxisOptions][this.side], F(e[this.coll], b));
                    d(this, "afterSetOptions", {userOptions: b})
                };
                a.prototype.defaultLabelFormatter = function (b) {
                    var a = this.axis;
                    b = this.chart.numberFormatter;
                    var d = g(this.value) ? this.value : NaN, c = a.chart.time, k = this.dateTimeLabelFormat,
                        r = e.lang, l = r.numericSymbols;
                    r = r.numericSymbolMagnitude || 1E3;
                    var z = a.logarithmic ? Math.abs(d) : a.tickInterval, f = l && l.length;
                    if (a.categories) var h = "" + this.value; else if (k) h = c.dateFormat(k, d); else if (f && 1E3 <= z) for (; f-- &&
                                                                                                                                  "undefined" === typeof h;) a = Math.pow(r, f + 1), z >= a && 0 === 10 * d % a && null !== l[f] && 0 !== d && (h = b(d / a, -1) + l[f]);
                    "undefined" === typeof h && (h = 1E4 <= Math.abs(d) ? b(d, -1) : b(d, -1, void 0, ""));
                    return h
                };
                a.prototype.getSeriesExtremes = function () {
                    var b = this, a = b.chart, k;
                    d(this, "getSeriesExtremes", null, function () {
                        b.hasVisibleSeries = !1;
                        b.dataMin = b.dataMax = b.threshold = null;
                        b.softThreshold = !b.isXAxis;
                        b.stacking && b.stacking.buildStacks();
                        b.series.forEach(function (d) {
                            if (d.visible || !a.options.chart.ignoreHiddenSeries) {
                                var c = d.options,
                                    r = c.threshold;
                                b.hasVisibleSeries = !0;
                                b.positiveValuesOnly && 0 >= r && (r = null);
                                if (b.isXAxis) {
                                    if (c = d.xData, c.length) {
                                        c = b.logarithmic ? c.filter(b.validatePositiveValue) : c;
                                        k = d.getXExtremes(c);
                                        var e = k.min;
                                        var z = k.max;
                                        g(e) || e instanceof Date || (c = c.filter(g), k = d.getXExtremes(c), e = k.min, z = k.max);
                                        c.length && (b.dataMin = Math.min(C(b.dataMin, e), e), b.dataMax = Math.max(C(b.dataMax, z), z))
                                    }
                                } else if (d = d.applyExtremes(), g(d.dataMin) && (e = d.dataMin, b.dataMin = Math.min(C(b.dataMin, e), e)), g(d.dataMax) && (z = d.dataMax, b.dataMax = Math.max(C(b.dataMax,
                                    z), z)), l(r) && (b.threshold = r), !c.softThreshold || b.positiveValuesOnly) b.softThreshold = !1
                            }
                        })
                    });
                    d(this, "afterGetSeriesExtremes")
                };
                a.prototype.translate = function (b, a, d, c, k, r) {
                    var e = this.linkedParent || this, l = c && e.old ? e.old.min : e.min, z = e.minPixelPadding;
                    k = (e.isOrdinal || e.brokenAxis && e.brokenAxis.hasBreaks || e.logarithmic && k) && e.lin2val;
                    var f = 1, I = 0;
                    c = c && e.old ? e.old.transA : e.transA;
                    c || (c = e.transA);
                    d && (f *= -1, I = e.len);
                    e.reversed && (f *= -1, I -= f * (e.sector || e.len));
                    a ? (b = (b * f + I - z) / c + l, k && (b = e.lin2val(b))) : (k && (b = e.val2lin(b)),
                        b = g(l) ? f * (b - l) * c + I + f * z + (g(r) ? c * r : 0) : void 0);
                    return b
                };
                a.prototype.toPixels = function (b, a) {
                    return this.translate(b, !1, !this.horiz, null, !0) + (a ? 0 : this.pos)
                };
                a.prototype.toValue = function (b, a) {
                    return this.translate(b - (a ? 0 : this.pos), !0, !this.horiz, null, !0)
                };
                a.prototype.getPlotLinePath = function (b) {
                    function a(b, a, d) {
                        if ("pass" !== M && b < a || b > d) M ? b = w(b, a, d) : Z = !0;
                        return b
                    }

                    var c = this, k = c.chart, r = c.left, e = c.top, l = b.old, f = b.value, z = b.lineWidth,
                        h = l && k.oldChartHeight || k.chartHeight, F = l && k.oldChartWidth || k.chartWidth,
                        D = c.transB, p = b.translatedValue, M = b.force, n, m, t, q, Z;
                    b = {value: f, lineWidth: z, old: l, force: M, acrossPanes: b.acrossPanes, translatedValue: p};
                    d(this, "getPlotLinePath", b, function (b) {
                        p = C(p, c.translate(f, null, null, l));
                        p = w(p, -1E5, 1E5);
                        n = t = Math.round(p + D);
                        m = q = Math.round(h - p - D);
                        g(p) ? c.horiz ? (m = e, q = h - c.bottom, n = t = a(n, r, r + c.width)) : (n = r, t = F - c.right, m = q = a(m, e, e + c.height)) : (Z = !0, M = !1);
                        b.path = Z && !M ? null : k.renderer.crispLine([["M", n, m], ["L", t, q]], z || 1)
                    });
                    return b.path
                };
                a.prototype.getLinearTickPositions = function (b, a,
                                                               d) {
                    var g = n(Math.floor(a / b) * b);
                    d = n(Math.ceil(d / b) * b);
                    var c = [], k;
                    n(g + b) === g && (k = 20);
                    if (this.single) return [a];
                    for (a = g; a <= d;) {
                        c.push(a);
                        a = n(a + b, k);
                        if (a === r) break;
                        var r = a
                    }
                    return c
                };
                a.prototype.getMinorTickInterval = function () {
                    var b = this.options;
                    return !0 === b.minorTicks ? C(b.minorTickInterval, "auto") : !1 === b.minorTicks ? null : b.minorTickInterval
                };
                a.prototype.getMinorTickPositions = function () {
                    var b = this.options, a = this.tickPositions, d = this.minorTickInterval,
                        g = this.pointRangePadding || 0, c = this.min - g;
                    g = this.max + g;
                    var k = g - c, r = [];
                    if (k && k / d < this.len / 3) {
                        var e = this.logarithmic;
                        if (e) this.paddedTicks.forEach(function (b, a, g) {
                            a && r.push.apply(r, e.getLogTickPositions(d, g[a - 1], g[a], !0))
                        }); else if (this.dateTime && "auto" === this.getMinorTickInterval()) r = r.concat(this.getTimeTicks(this.dateTime.normalizeTimeTickInterval(d), c, g, b.startOfWeek)); else for (b = c + (a[0] - c) % d; b <= g && b !== r[0]; b += d) r.push(b)
                    }
                    0 !== r.length && this.trimTicks(r);
                    return r
                };
                a.prototype.adjustForMinRange = function () {
                    var b = this.options, a = this.logarithmic, d = this.min,
                        g = this.max, c = 0, k, r, e, f;
                    this.isXAxis && "undefined" === typeof this.minRange && !a && (l(b.min) || l(b.max) ? this.minRange = null : (this.series.forEach(function (b) {
                        e = b.xData;
                        f = b.xIncrement ? 1 : e.length - 1;
                        if (1 < e.length) for (k = f; 0 < k; k--) if (r = e[k] - e[k - 1], !c || r < c) c = r
                    }), this.minRange = Math.min(5 * c, this.dataMax - this.dataMin)));
                    if (g - d < this.minRange) {
                        var h = this.dataMax - this.dataMin >= this.minRange;
                        var F = this.minRange;
                        var D = (F - g + d) / 2;
                        D = [d - D, C(b.min, d - D)];
                        h && (D[2] = this.logarithmic ? this.logarithmic.log2lin(this.dataMin) : this.dataMin);
                        d = t(D);
                        g = [d + F, C(b.max, d + F)];
                        h && (g[2] = a ? a.log2lin(this.dataMax) : this.dataMax);
                        g = m(g);
                        g - d < F && (D[0] = g - F, D[1] = C(b.min, g - F), d = t(D))
                    }
                    this.min = d;
                    this.max = g
                };
                a.prototype.getClosest = function () {
                    var b;
                    this.categories ? b = 1 : this.series.forEach(function (a) {
                        var d = a.closestPointRange, g = a.visible || !a.chart.options.chart.ignoreHiddenSeries;
                        !a.noSharedTooltip && l(d) && g && (b = l(b) ? Math.min(b, d) : d)
                    });
                    return b
                };
                a.prototype.nameToX = function (a) {
                    var d = b(this.categories), g = d ? this.categories : this.names, c = a.options.x;
                    a.series.requireSorting =
                        !1;
                    l(c) || (c = this.options.uniqueNames ? d ? g.indexOf(a.name) : C(g.keys[a.name], -1) : a.series.autoIncrement());
                    if (-1 === c) {
                        if (!d) var k = g.length
                    } else k = c;
                    "undefined" !== typeof k && (this.names[k] = a.name, this.names.keys[a.name] = k);
                    return k
                };
                a.prototype.updateNames = function () {
                    var b = this, a = this.names;
                    0 < a.length && (Object.keys(a.keys).forEach(function (b) {
                        delete a.keys[b]
                    }), a.length = 0, this.minRange = this.userMinRange, (this.series || []).forEach(function (a) {
                        a.xIncrement = null;
                        if (!a.points || a.isDirtyData) b.max = Math.max(b.max,
                            a.xData.length - 1), a.processData(), a.generatePoints();
                        a.data.forEach(function (d, g) {
                            if (d && d.options && "undefined" !== typeof d.name) {
                                var c = b.nameToX(d);
                                "undefined" !== typeof c && c !== d.x && (d.x = c, a.xData[g] = c)
                            }
                        })
                    }))
                };
                a.prototype.setAxisTranslation = function () {
                    var b = this, a = b.max - b.min, g = b.linkedParent, c = !!b.categories, k = b.isXAxis,
                        e = b.axisPointRange || 0, l = 0, f = 0, h = b.transA;
                    if (k || c || e) {
                        var F = b.getClosest();
                        g ? (l = g.minPointOffset, f = g.pointRangePadding) : b.series.forEach(function (a) {
                            var d = c ? 1 : k ? C(a.options.pointRange,
                                F, 0) : b.axisPointRange || 0, g = a.options.pointPlacement;
                            e = Math.max(e, d);
                            if (!b.single || c) a = a.is("xrange") ? !k : k, l = Math.max(l, a && r(g) ? 0 : d / 2), f = Math.max(f, a && "on" === g ? 0 : d)
                        });
                        g = b.ordinal && b.ordinal.slope && F ? b.ordinal.slope / F : 1;
                        b.minPointOffset = l *= g;
                        b.pointRangePadding = f *= g;
                        b.pointRange = Math.min(e, b.single && c ? 1 : a);
                        k && (b.closestPointRange = F)
                    }
                    b.translationSlope = b.transA = h = b.staticScale || b.len / (a + f || 1);
                    b.transB = b.horiz ? b.left : b.bottom;
                    b.minPixelPadding = h * l;
                    d(this, "afterSetAxisTranslation")
                };
                a.prototype.minFromRange =
                    function () {
                        return this.max - this.range
                    };
                a.prototype.setTickInterval = function (b) {
                    var a = this, c = a.chart, r = a.logarithmic, e = a.options, f = a.isXAxis, h = a.isLinked,
                        F = e.tickPixelInterval, z = a.categories, p = a.softThreshold, M = e.maxPadding,
                        m = e.minPadding, t = e.tickInterval, q = g(a.threshold) ? a.threshold : null;
                    a.dateTime || z || h || this.getTickAmount();
                    var w = C(a.userMin, e.min);
                    var O = C(a.userMax, e.max);
                    if (h) {
                        a.linkedParent = c[a.coll][e.linkedTo];
                        var J = a.linkedParent.getExtremes();
                        a.min = C(J.min, J.dataMin);
                        a.max = C(J.max, J.dataMax);
                        e.type !== a.linkedParent.options.type && A(11, 1, c)
                    } else {
                        if (p && l(q)) if (a.dataMin >= q) J = q, m = 0; else if (a.dataMax <= q) {
                            var v = q;
                            M = 0
                        }
                        a.min = C(w, J, a.dataMin);
                        a.max = C(O, v, a.dataMax)
                    }
                    r && (a.positiveValuesOnly && !b && 0 >= Math.min(a.min, C(a.dataMin, a.min)) && A(10, 1, c), a.min = n(r.log2lin(a.min), 16), a.max = n(r.log2lin(a.max), 16));
                    a.range && l(a.max) && (a.userMin = a.min = w = Math.max(a.dataMin, a.minFromRange()), a.userMax = O = a.max, a.range = null);
                    d(a, "foundExtremes");
                    a.beforePadding && a.beforePadding();
                    a.adjustForMinRange();
                    !(z || a.axisPointRange ||
                        a.stacking && a.stacking.usePercentage || h) && l(a.min) && l(a.max) && (c = a.max - a.min) && (!l(w) && m && (a.min -= c * m), !l(O) && M && (a.max += c * M));
                    g(a.userMin) || (g(e.softMin) && e.softMin < a.min && (a.min = w = e.softMin), g(e.floor) && (a.min = Math.max(a.min, e.floor)));
                    g(a.userMax) || (g(e.softMax) && e.softMax > a.max && (a.max = O = e.softMax), g(e.ceiling) && (a.max = Math.min(a.max, e.ceiling)));
                    p && l(a.dataMin) && (q = q || 0, !l(w) && a.min < q && a.dataMin >= q ? a.min = a.options.minRange ? Math.min(q, a.max - a.minRange) : q : !l(O) && a.max > q && a.dataMax <= q && (a.max = a.options.minRange ?
                        Math.max(q, a.min + a.minRange) : q));
                    g(a.min) && g(a.max) && !this.chart.polar && a.min > a.max && (l(a.options.min) ? a.max = a.min : l(a.options.max) && (a.min = a.max));
                    a.tickInterval = a.min === a.max || "undefined" === typeof a.min || "undefined" === typeof a.max ? 1 : h && a.linkedParent && !t && F === a.linkedParent.options.tickPixelInterval ? t = a.linkedParent.tickInterval : C(t, this.tickAmount ? (a.max - a.min) / Math.max(this.tickAmount - 1, 1) : void 0, z ? 1 : (a.max - a.min) * F / Math.max(a.len, F));
                    f && !b && a.series.forEach(function (b) {
                        b.processData(a.min !==
                            (a.old && a.old.min) || a.max !== (a.old && a.old.max))
                    });
                    a.setAxisTranslation();
                    d(this, "initialAxisTranslation");
                    a.pointRange && !t && (a.tickInterval = Math.max(a.pointRange, a.tickInterval));
                    b = C(e.minTickInterval, a.dateTime && !a.series.some(function (b) {
                        return b.noSharedTooltip
                    }) ? a.closestPointRange : 0);
                    !t && a.tickInterval < b && (a.tickInterval = b);
                    a.dateTime || a.logarithmic || t || (a.tickInterval = D(a.tickInterval, void 0, k(a.tickInterval), C(e.allowDecimals, .5 > a.tickInterval || void 0 !== this.tickAmount), !!this.tickAmount));
                    this.tickAmount || (a.tickInterval = a.unsquish());
                    this.setTickPositions()
                };
                a.prototype.setTickPositions = function () {
                    var b = this.options, a = b.tickPositions, g = this.getMinorTickInterval(),
                        c = this.hasVerticalPanning(), k = "colorAxis" === this.coll, e = (k || !c) && b.startOnTick;
                    c = (k || !c) && b.endOnTick;
                    k = b.tickPositioner;
                    this.tickmarkOffset = this.categories && "between" === b.tickmarkPlacement && 1 === this.tickInterval ? .5 : 0;
                    this.minorTickInterval = "auto" === g && this.tickInterval ? this.tickInterval / 5 : g;
                    this.single = this.min === this.max &&
                        l(this.min) && !this.tickAmount && (parseInt(this.min, 10) === this.min || !1 !== b.allowDecimals);
                    this.tickPositions = g = a && a.slice();
                    !g && (this.ordinal && this.ordinal.positions || !((this.max - this.min) / this.tickInterval > Math.max(2 * this.len, 200)) ? g = this.dateTime ? this.getTimeTicks(this.dateTime.normalizeTimeTickInterval(this.tickInterval, b.units), this.min, this.max, b.startOfWeek, this.ordinal && this.ordinal.positions, this.closestPointRange, !0) : this.logarithmic ? this.logarithmic.getLogTickPositions(this.tickInterval, this.min,
                        this.max) : this.getLinearTickPositions(this.tickInterval, this.min, this.max) : (g = [this.min, this.max], A(19, !1, this.chart)), g.length > this.len && (g = [g[0], g.pop()], g[0] === g[1] && (g.length = 1)), this.tickPositions = g, k && (k = k.apply(this, [this.min, this.max]))) && (this.tickPositions = g = k);
                    this.paddedTicks = g.slice(0);
                    this.trimTicks(g, e, c);
                    this.isLinked || (this.single && 2 > g.length && !this.categories && !this.series.some(function (b) {
                        return b.is("heatmap") && "between" === b.options.pointPlacement
                    }) && (this.min -= .5, this.max += .5),
                    a || k || this.adjustTickAmount());
                    d(this, "afterSetTickPositions")
                };
                a.prototype.trimTicks = function (b, a, g) {
                    var c = b[0], k = b[b.length - 1], e = !this.isOrdinal && this.minPointOffset || 0;
                    d(this, "trimTicks");
                    if (!this.isLinked) {
                        if (a && -Infinity !== c) this.min = c; else for (; this.min - e > b[0];) b.shift();
                        if (g) this.max = k; else for (; this.max + e < b[b.length - 1];) b.pop();
                        0 === b.length && l(c) && !this.options.tickPositions && b.push((k + c) / 2)
                    }
                };
                a.prototype.alignToOthers = function () {
                    var b = {}, a = this.options, d;
                    !1 !== this.chart.options.chart.alignTicks &&
                    a.alignTicks && !1 !== a.startOnTick && !1 !== a.endOnTick && !this.logarithmic && this.chart[this.coll].forEach(function (a) {
                        var g = a.options;
                        g = [a.horiz ? g.left : g.top, g.width, g.height, g.pane].join();
                        a.series.length && (b[g] ? d = !0 : b[g] = 1)
                    });
                    return d
                };
                a.prototype.getTickAmount = function () {
                    var b = this.options, a = b.tickPixelInterval, d = b.tickAmount;
                    !l(b.tickInterval) && !d && this.len < a && !this.isRadial && !this.logarithmic && b.startOnTick && b.endOnTick && (d = 2);
                    !d && this.alignToOthers() && (d = Math.ceil(this.len / a) + 1);
                    4 > d && (this.finalTickAmt =
                        d, d = 5);
                    this.tickAmount = d
                };
                a.prototype.adjustTickAmount = function () {
                    var b = this.options, a = this.tickInterval, d = this.tickPositions, c = this.tickAmount,
                        k = this.finalTickAmt, e = d && d.length, r = C(this.threshold, this.softThreshold ? 0 : null);
                    if (this.hasData() && g(this.min) && g(this.max)) {
                        if (e < c) {
                            for (; d.length < c;) d.length % 2 || this.min === r ? d.push(n(d[d.length - 1] + a)) : d.unshift(n(d[0] - a));
                            this.transA *= (e - 1) / (c - 1);
                            this.min = b.startOnTick ? d[0] : Math.min(this.min, d[0]);
                            this.max = b.endOnTick ? d[d.length - 1] : Math.max(this.max, d[d.length -
                            1])
                        } else e > c && (this.tickInterval *= 2, this.setTickPositions());
                        if (l(k)) {
                            for (a = b = d.length; a--;) (3 === k && 1 === a % 2 || 2 >= k && 0 < a && a < b - 1) && d.splice(a, 1);
                            this.finalTickAmt = void 0
                        }
                    }
                };
                a.prototype.setScale = function () {
                    var b = !1, a = !1;
                    this.series.forEach(function (d) {
                        b = b || d.isDirtyData || d.isDirty;
                        a = a || d.xAxis && d.xAxis.isDirty || !1
                    });
                    this.setAxisSize();
                    var g = this.len !== (this.old && this.old.len);
                    g || b || a || this.isLinked || this.forceRedraw || this.userMin !== (this.old && this.old.userMin) || this.userMax !== (this.old && this.old.userMax) ||
                    this.alignToOthers() ? (this.stacking && this.stacking.resetStacks(), this.forceRedraw = !1, this.getSeriesExtremes(), this.setTickInterval(), this.isDirty || (this.isDirty = g || this.min !== (this.old && this.old.min) || this.max !== (this.old && this.old.max))) : this.stacking && this.stacking.cleanStacks();
                    b && this.panningState && (this.panningState.isDirty = !0);
                    d(this, "afterSetScale")
                };
                a.prototype.setExtremes = function (b, a, g, c, k) {
                    var e = this, r = e.chart;
                    g = C(g, !0);
                    e.series.forEach(function (b) {
                        delete b.kdTree
                    });
                    k = p(k, {min: b, max: a});
                    d(e, "setExtremes", k, function () {
                        e.userMin = b;
                        e.userMax = a;
                        e.eventArgs = k;
                        g && r.redraw(c)
                    })
                };
                a.prototype.zoom = function (b, a) {
                    var g = this, c = this.dataMin, k = this.dataMax, e = this.options, r = Math.min(c, C(e.min, c)),
                        f = Math.max(k, C(e.max, k));
                    b = {newMin: b, newMax: a};
                    d(this, "zoom", b, function (b) {
                        var a = b.newMin, d = b.newMax;
                        if (a !== g.min || d !== g.max) g.allowZoomOutside || (l(c) && (a < r && (a = r), a > f && (a = f)), l(k) && (d < r && (d = r), d > f && (d = f))), g.displayBtn = "undefined" !== typeof a || "undefined" !== typeof d, g.setExtremes(a, d, !1, void 0, {trigger: "zoom"});
                        b.zoomed = !0
                    });
                    return b.zoomed
                };
                a.prototype.setAxisSize = function () {
                    var b = this.chart, a = this.options, d = a.offsets || [0, 0, 0, 0], g = this.horiz,
                        c = this.width = Math.round(O(C(a.width, b.plotWidth - d[3] + d[1]), b.plotWidth)),
                        k = this.height = Math.round(O(C(a.height, b.plotHeight - d[0] + d[2]), b.plotHeight)),
                        e = this.top = Math.round(O(C(a.top, b.plotTop + d[0]), b.plotHeight, b.plotTop));
                    a = this.left = Math.round(O(C(a.left, b.plotLeft + d[3]), b.plotWidth, b.plotLeft));
                    this.bottom = b.chartHeight - k - e;
                    this.right = b.chartWidth - c - a;
                    this.len = Math.max(g ?
                        c : k, 0);
                    this.pos = g ? a : e
                };
                a.prototype.getExtremes = function () {
                    var b = this.logarithmic;
                    return {
                        min: b ? n(b.lin2log(this.min)) : this.min,
                        max: b ? n(b.lin2log(this.max)) : this.max,
                        dataMin: this.dataMin,
                        dataMax: this.dataMax,
                        userMin: this.userMin,
                        userMax: this.userMax
                    }
                };
                a.prototype.getThreshold = function (b) {
                    var a = this.logarithmic, d = a ? a.lin2log(this.min) : this.min;
                    a = a ? a.lin2log(this.max) : this.max;
                    null === b || -Infinity === b ? b = d : Infinity === b ? b = a : d > b ? b = d : a < b && (b = a);
                    return this.translate(b, 0, 1, 0, 1)
                };
                a.prototype.autoLabelAlign =
                    function (b) {
                        var a = (C(b, 0) - 90 * this.side + 720) % 360;
                        b = {align: "center"};
                        d(this, "autoLabelAlign", b, function (b) {
                            15 < a && 165 > a ? b.align = "right" : 195 < a && 345 > a && (b.align = "left")
                        });
                        return b.align
                    };
                a.prototype.tickSize = function (b) {
                    var a = this.options,
                        g = C(a["tick" === b ? "tickWidth" : "minorTickWidth"], "tick" === b && this.isXAxis && !this.categories ? 1 : 0),
                        c = a["tick" === b ? "tickLength" : "minorTickLength"];
                    if (g && c) {
                        "inside" === a[b + "Position"] && (c = -c);
                        var k = [c, g]
                    }
                    b = {tickSize: k};
                    d(this, "afterTickSize", b);
                    return b.tickSize
                };
                a.prototype.labelMetrics =
                    function () {
                        var b = this.tickPositions && this.tickPositions[0] || 0;
                        return this.chart.renderer.fontMetrics(this.options.labels.style.fontSize, this.ticks[b] && this.ticks[b].label)
                    };
                a.prototype.unsquish = function () {
                    var b = this.options.labels, a = this.horiz, d = this.tickInterval,
                        k = this.len / (((this.categories ? 1 : 0) + this.max - this.min) / d), e = b.rotation,
                        r = this.labelMetrics(), l = Math.max(this.max - this.min, 0), f = function (b) {
                            var a = b / (k || 1);
                            a = 1 < a ? Math.ceil(a) : 1;
                            a * d > l && Infinity !== b && Infinity !== k && l && (a = Math.ceil(l / d));
                            return n(a *
                                d)
                        }, h = d, F, D, p = Number.MAX_VALUE;
                    if (a) {
                        if (!b.staggerLines && !b.step) if (g(e)) var M = [e]; else k < b.autoRotationLimit && (M = b.autoRotation);
                        M && M.forEach(function (b) {
                            if (b === e || b && -90 <= b && 90 >= b) {
                                D = f(Math.abs(r.h / Math.sin(c * b)));
                                var a = D + Math.abs(b / 360);
                                a < p && (p = a, F = b, h = D)
                            }
                        })
                    } else b.step || (h = f(r.h));
                    this.autoRotation = M;
                    this.labelRotation = C(F, g(e) ? e : 0);
                    return h
                };
                a.prototype.getSlotWidth = function (b) {
                    var a = this.chart, d = this.horiz, c = this.options.labels,
                        k = Math.max(this.tickPositions.length - (this.categories ? 0 : 1), 1), e =
                            a.margin[3];
                    if (b && g(b.slotWidth)) return b.slotWidth;
                    if (d && 2 > c.step) return c.rotation ? 0 : (this.staggerLines || 1) * this.len / k;
                    if (!d) {
                        b = c.style.width;
                        if (void 0 !== b) return parseInt(String(b), 10);
                        if (e) return e - a.spacing[3]
                    }
                    return .33 * a.chartWidth
                };
                a.prototype.renderUnsquish = function () {
                    var b = this.chart, a = b.renderer, d = this.tickPositions, g = this.ticks, c = this.options.labels,
                        k = c.style, e = this.horiz, l = this.getSlotWidth(),
                        f = Math.max(1, Math.round(l - 2 * c.padding)), h = {}, F = this.labelMetrics(),
                        D = k.textOverflow, C = 0;
                    r(c.rotation) ||
                    (h.rotation = c.rotation || 0);
                    d.forEach(function (b) {
                        b = g[b];
                        b.movedLabel && b.replaceMovedLabel();
                        b && b.label && b.label.textPxLength > C && (C = b.label.textPxLength)
                    });
                    this.maxLabelLength = C;
                    if (this.autoRotation) C > f && C > F.h ? h.rotation = this.labelRotation : this.labelRotation = 0; else if (l) {
                        var p = f;
                        if (!D) {
                            var M = "clip";
                            for (f = d.length; !e && f--;) {
                                var n = d[f];
                                if (n = g[n].label) n.styles && "ellipsis" === n.styles.textOverflow ? n.css({textOverflow: "clip"}) : n.textPxLength > l && n.css({width: l + "px"}), n.getBBox().height > this.len / d.length -
                                (F.h - F.f) && (n.specificTextOverflow = "ellipsis")
                            }
                        }
                    }
                    h.rotation && (p = C > .5 * b.chartHeight ? .33 * b.chartHeight : C, D || (M = "ellipsis"));
                    if (this.labelAlign = c.align || this.autoLabelAlign(this.labelRotation)) h.align = this.labelAlign;
                    d.forEach(function (b) {
                        var a = (b = g[b]) && b.label, d = k.width, c = {};
                        a && (a.attr(h), b.shortenLabel ? b.shortenLabel() : p && !d && "nowrap" !== k.whiteSpace && (p < a.textPxLength || "SPAN" === a.element.tagName) ? (c.width = p + "px", D || (c.textOverflow = a.specificTextOverflow || M), a.css(c)) : a.styles && a.styles.width && !c.width &&
                            !d && a.css({width: null}), delete a.specificTextOverflow, b.rotation = h.rotation)
                    }, this);
                    this.tickRotCorr = a.rotCorr(F.b, this.labelRotation || 0, 0 !== this.side)
                };
                a.prototype.hasData = function () {
                    return this.series.some(function (b) {
                        return b.hasData()
                    }) || this.options.showEmpty && l(this.min) && l(this.max)
                };
                a.prototype.addTitle = function (b) {
                    var a = this.chart.renderer, d = this.horiz, g = this.opposite, c = this.options.title,
                        k = this.chart.styledMode, e;
                    this.axisTitle || ((e = c.textAlign) || (e = (d ? {low: "left", middle: "center", high: "right"} :
                        {
                            low: g ? "right" : "left",
                            middle: "center",
                            high: g ? "left" : "right"
                        })[c.align]), this.axisTitle = a.text(c.text || "", 0, 0, c.useHTML).attr({
                        zIndex: 7,
                        rotation: c.rotation,
                        align: e
                    }).addClass("highcharts-axis-title"), k || this.axisTitle.css(F(c.style)), this.axisTitle.add(this.axisGroup), this.axisTitle.isNew = !0);
                    k || c.style.width || this.isRadial || this.axisTitle.css({width: this.len + "px"});
                    this.axisTitle[b ? "show" : "hide"](b)
                };
                a.prototype.generateTick = function (b) {
                    var a = this.ticks;
                    a[b] ? a[b].addLabel() : a[b] = new q(this, b)
                };
                a.prototype.getOffset =
                    function () {
                        var b = this, a = this, g = a.chart, c = g.renderer, k = a.options, e = a.tickPositions,
                            r = a.ticks, f = a.horiz, h = a.side, F = g.inverted && !a.isZAxis ? [1, 0, 3, 2][h] : h,
                            D = a.hasData(), p = k.title, n = k.labels, m = g.axisOffset;
                        g = g.clipOffset;
                        var t = [-1, 1, 1, -1][h], q = k.className, w = a.axisParent, O, Z = 0, ha = 0, A = 0;
                        a.showAxis = O = D || k.showEmpty;
                        a.staggerLines = a.horiz && n.staggerLines || void 0;
                        if (!a.axisGroup) {
                            var J = function (a, d, g) {
                                return c.g(a).attr({zIndex: g}).addClass("highcharts-" + b.coll.toLowerCase() + d + " " + (b.isRadial ? "highcharts-radial-axis" +
                                    d + " " : "") + (q || "")).add(w)
                            };
                            a.gridGroup = J("grid", "-grid", k.gridZIndex);
                            a.axisGroup = J("axis", "", k.zIndex);
                            a.labelGroup = J("axis-labels", "-labels", n.zIndex)
                        }
                        D || a.isLinked ? (e.forEach(function (b) {
                            a.generateTick(b)
                        }), a.renderUnsquish(), a.reserveSpaceDefault = 0 === h || 2 === h || {
                            1: "left",
                            3: "right"
                        }[h] === a.labelAlign, C(n.reserveSpace, "center" === a.labelAlign ? !0 : null, a.reserveSpaceDefault) && e.forEach(function (b) {
                            A = Math.max(r[b].getLabelSize(), A)
                        }), a.staggerLines && (A *= a.staggerLines), a.labelOffset = A * (a.opposite ? -1 :
                            1)) : M(r, function (b, a) {
                            b.destroy();
                            delete r[a]
                        });
                        if (p && p.text && !1 !== p.enabled && (a.addTitle(O), O && !1 !== p.reserveSpace)) {
                            a.titleOffset = Z = a.axisTitle.getBBox()[f ? "height" : "width"];
                            var v = p.offset;
                            ha = l(v) ? 0 : C(p.margin, f ? 5 : 10)
                        }
                        a.renderLine();
                        a.offset = t * C(k.offset, m[h] ? m[h] + (k.margin || 0) : 0);
                        a.tickRotCorr = a.tickRotCorr || {x: 0, y: 0};
                        p = 0 === h ? -a.labelMetrics().h : 2 === h ? a.tickRotCorr.y : 0;
                        D = Math.abs(A) + ha;
                        A && (D = D - p + t * (f ? C(n.y, a.tickRotCorr.y + 8 * t) : n.x));
                        a.axisTitleMargin = C(v, D);
                        a.getMaxLabelDimensions && (a.maxLabelDimensions =
                            a.getMaxLabelDimensions(r, e));
                        f = this.tickSize("tick");
                        m[h] = Math.max(m[h], (a.axisTitleMargin || 0) + Z + t * a.offset, D, e && e.length && f ? f[0] + t * a.offset : 0);
                        k = k.offset ? 0 : 2 * Math.floor(a.axisLine.strokeWidth() / 2);
                        g[F] = Math.max(g[F], k);
                        d(this, "afterGetOffset")
                    };
                a.prototype.getLinePath = function (b) {
                    var a = this.chart, d = this.opposite, g = this.offset, c = this.horiz,
                        k = this.left + (d ? this.width : 0) + g;
                    g = a.chartHeight - this.bottom - (d ? this.height : 0) + g;
                    d && (b *= -1);
                    return a.renderer.crispLine([["M", c ? this.left : k, c ? g : this.top], ["L", c ?
                        a.chartWidth - this.right : k, c ? g : a.chartHeight - this.bottom]], b)
                };
                a.prototype.renderLine = function () {
                    this.axisLine || (this.axisLine = this.chart.renderer.path().addClass("highcharts-axis-line").add(this.axisGroup), this.chart.styledMode || this.axisLine.attr({
                        stroke: this.options.lineColor,
                        "stroke-width": this.options.lineWidth,
                        zIndex: 7
                    }))
                };
                a.prototype.getTitlePosition = function () {
                    var b = this.horiz, a = this.left, g = this.top, c = this.len, k = this.options.title,
                        e = b ? a : g, r = this.opposite, l = this.offset, f = k.x, h = k.y, F = this.axisTitle,
                        D = this.chart.renderer.fontMetrics(k.style.fontSize, F);
                    F = Math.max(F.getBBox(null, 0).height - D.h - 1, 0);
                    c = {low: e + (b ? 0 : c), middle: e + c / 2, high: e + (b ? c : 0)}[k.align];
                    a = (b ? g + this.height : a) + (b ? 1 : -1) * (r ? -1 : 1) * this.axisTitleMargin + [-F, F, D.f, -F][this.side];
                    b = {
                        x: b ? c + f : a + (r ? this.width : 0) + l + f,
                        y: b ? a + h - (r ? this.height : 0) + l : c + h
                    };
                    d(this, "afterGetTitlePosition", {titlePosition: b});
                    return b
                };
                a.prototype.renderMinorTick = function (b, a) {
                    var d = this.minorTicks;
                    d[b] || (d[b] = new q(this, b, "minor"));
                    a && d[b].isNew && d[b].render(null, !0);
                    d[b].render(null, !1, 1)
                };
                a.prototype.renderTick = function (b, a, d) {
                    var g = this.ticks;
                    if (!this.isLinked || b >= this.min && b <= this.max || this.grid && this.grid.isColumn) g[b] || (g[b] = new q(this, b)), d && g[b].isNew && g[b].render(a, !0, -1), g[b].render(a)
                };
                a.prototype.render = function () {
                    var b = this, a = b.chart, c = b.logarithmic, k = b.options, e = b.isLinked, r = b.tickPositions,
                        l = b.axisTitle, f = b.ticks, F = b.minorTicks, D = b.alternateBands, p = k.stackLabels,
                        C = k.alternateGridColor, n = b.tickmarkOffset, m = b.axisLine, t = b.showAxis,
                        w = h(a.renderer.globalAnimation),
                        O, A;
                    b.labelEdge.length = 0;
                    b.overlap = !1;
                    [f, F, D].forEach(function (b) {
                        M(b, function (b) {
                            b.isActive = !1
                        })
                    });
                    if (b.hasData() || e) {
                        var Z = b.chart.hasRendered && b.old && g(b.old.min);
                        b.minorTickInterval && !b.categories && b.getMinorTickPositions().forEach(function (a) {
                            b.renderMinorTick(a, Z)
                        });
                        r.length && (r.forEach(function (a, d) {
                            b.renderTick(a, d, Z)
                        }), n && (0 === b.min || b.single) && (f[-1] || (f[-1] = new q(b, -1, null, !0)), f[-1].render(-1)));
                        C && r.forEach(function (d, g) {
                            A = "undefined" !== typeof r[g + 1] ? r[g + 1] + n : b.max - n;
                            0 === g % 2 && d < b.max &&
                            A <= b.max + (a.polar ? -n : n) && (D[d] || (D[d] = new y.PlotLineOrBand(b)), O = d + n, D[d].options = {
                                from: c ? c.lin2log(O) : O,
                                to: c ? c.lin2log(A) : A,
                                color: C,
                                className: "highcharts-alternate-grid"
                            }, D[d].render(), D[d].isActive = !0)
                        });
                        b._addedPlotLB || (b._addedPlotLB = !0, (k.plotLines || []).concat(k.plotBands || []).forEach(function (a) {
                            b.addPlotBandOrLine(a)
                        }))
                    }
                    [f, F, D].forEach(function (b) {
                        var d = [], g = w.duration;
                        M(b, function (b, a) {
                            b.isActive || (b.render(a, !1, 0), b.isActive = !1, d.push(a))
                        });
                        Y(function () {
                            for (var a = d.length; a--;) b[d[a]] && !b[d[a]].isActive &&
                            (b[d[a]].destroy(), delete b[d[a]])
                        }, b !== D && a.hasRendered && g ? g : 0)
                    });
                    m && (m[m.isPlaced ? "animate" : "attr"]({d: this.getLinePath(m.strokeWidth())}), m.isPlaced = !0, m[t ? "show" : "hide"](t));
                    l && t && (k = b.getTitlePosition(), g(k.y) ? (l[l.isNew ? "attr" : "animate"](k), l.isNew = !1) : (l.attr("y", -9999), l.isNew = !0));
                    p && p.enabled && b.stacking && b.stacking.renderStackTotals();
                    b.old = {
                        len: b.len,
                        max: b.max,
                        min: b.min,
                        transA: b.transA,
                        userMax: b.userMax,
                        userMin: b.userMin
                    };
                    b.isDirty = !1;
                    d(this, "afterRender")
                };
                a.prototype.redraw = function () {
                    this.visible &&
                    (this.render(), this.plotLinesAndBands.forEach(function (b) {
                        b.render()
                    }));
                    this.series.forEach(function (b) {
                        b.isDirty = !0
                    })
                };
                a.prototype.getKeepProps = function () {
                    return this.keepProps || a.keepProps
                };
                a.prototype.destroy = function (b) {
                    var a = this, g = a.plotLinesAndBands, c = this.eventOptions;
                    d(this, "destroy", {keepEvents: b});
                    b || S(a);
                    [a.ticks, a.minorTicks, a.alternateBands].forEach(function (b) {
                        J(b)
                    });
                    if (g) for (b = g.length; b--;) g[b].destroy();
                    "axisLine axisTitle axisGroup gridGroup labelGroup cross scrollbar".split(" ").forEach(function (b) {
                        a[b] &&
                        (a[b] = a[b].destroy())
                    });
                    for (var k in a.plotLinesAndBandsGroups) a.plotLinesAndBandsGroups[k] = a.plotLinesAndBandsGroups[k].destroy();
                    M(a, function (b, d) {
                        -1 === a.getKeepProps().indexOf(d) && delete a[d]
                    });
                    this.eventOptions = c
                };
                a.prototype.drawCrosshair = function (b, a) {
                    var g = this.crosshair, c = C(g && g.snap, !0), k = this.chart, e, r = this.cross;
                    d(this, "drawCrosshair", {e: b, point: a});
                    b || (b = this.cross && this.cross.e);
                    if (g && !1 !== (l(a) || !c)) {
                        c ? l(a) && (e = C("colorAxis" !== this.coll ? a.crosshairPos : null, this.isXAxis ? a.plotX : this.len -
                            a.plotY)) : e = b && (this.horiz ? b.chartX - this.pos : this.len - b.chartY + this.pos);
                        if (l(e)) {
                            var f = {value: a && (this.isXAxis ? a.x : C(a.stackY, a.y)), translatedValue: e};
                            k.polar && p(f, {isCrosshair: !0, chartX: b && b.chartX, chartY: b && b.chartY, point: a});
                            f = this.getPlotLinePath(f) || null
                        }
                        if (!l(f)) {
                            this.hideCrosshair();
                            return
                        }
                        c = this.categories && !this.isRadial;
                        r || (this.cross = r = k.renderer.path().addClass("highcharts-crosshair highcharts-crosshair-" + (c ? "category " : "thin ") + (g.className || "")).attr({zIndex: C(g.zIndex, 2)}).add(), k.styledMode ||
                        (r.attr({
                            stroke: g.color || (c ? u.parse(E.highlightColor20).setOpacity(.25).get() : E.neutralColor20),
                            "stroke-width": C(g.width, 1)
                        }).css({"pointer-events": "none"}), g.dashStyle && r.attr({dashstyle: g.dashStyle})));
                        r.show().attr({d: f});
                        c && !g.width && r.attr({"stroke-width": this.transA});
                        this.cross.e = b
                    } else this.hideCrosshair();
                    d(this, "afterDrawCrosshair", {e: b, point: a})
                };
                a.prototype.hideCrosshair = function () {
                    this.cross && this.cross.hide();
                    d(this, "afterHideCrosshair")
                };
                a.prototype.hasVerticalPanning = function () {
                    var b =
                        this.chart.options.chart.panning;
                    return !!(b && b.enabled && /y/.test(b.type))
                };
                a.prototype.validatePositiveValue = function (b) {
                    return g(b) && 0 < b
                };
                a.prototype.update = function (b, a) {
                    var d = this.chart;
                    b = F(this.userOptions, b);
                    this.destroy(!0);
                    this.init(d, b);
                    d.isDirtyBox = !0;
                    C(a, !0) && d.redraw()
                };
                a.prototype.remove = function (b) {
                    for (var a = this.chart, d = this.coll, g = this.series, c = g.length; c--;) g[c] && g[c].remove(!1);
                    v(a.axes, this);
                    v(a[d], this);
                    a[d].forEach(function (b, a) {
                        b.options.index = b.userOptions.index = a
                    });
                    this.destroy();
                    a.isDirtyBox = !0;
                    C(b, !0) && a.redraw()
                };
                a.prototype.setTitle = function (b, a) {
                    this.update({title: b}, a)
                };
                a.prototype.setCategories = function (b, a) {
                    this.update({categories: b}, a)
                };
                a.defaultOptions = B.defaultXAxisOptions;
                a.keepProps = "extKey hcEvents names series userMax userMin".split(" ");
                return a
            }();
            "";
            return a
        });
        L(a, "Core/Axis/DateTimeAxis.js", [a["Core/Axis/Axis.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = u.addEvent, H = u.getMagnitude, x = u.normalizeTickInterval, y = u.timeUnits, G = function () {
                function a(a) {
                    this.axis =
                        a
                }

                a.prototype.normalizeTimeTickInterval = function (a, h) {
                    var f = h || [["millisecond", [1, 2, 5, 10, 20, 25, 50, 100, 200, 500]], ["second", [1, 2, 5, 10, 15, 30]], ["minute", [1, 2, 5, 10, 15, 30]], ["hour", [1, 2, 3, 4, 6, 8, 12]], ["day", [1, 2]], ["week", [1, 2]], ["month", [1, 2, 3, 4, 6]], ["year", null]];
                    h = f[f.length - 1];
                    var c = y[h[0]], e = h[1], t;
                    for (t = 0; t < f.length && !(h = f[t], c = y[h[0]], e = h[1], f[t + 1] && a <= (c * e[e.length - 1] + y[f[t + 1][0]]) / 2); t++) ;
                    c === y.year && a < 5 * c && (e = [1, 2, 5]);
                    a = x(a / c, e, "year" === h[0] ? Math.max(H(a / c), 1) : 1);
                    return {unitRange: c, count: a, unitName: h[0]}
                };
                return a
            }();
            u = function () {
                function a() {
                }

                a.compose = function (a) {
                    a.keepProps.push("dateTime");
                    a.prototype.getTimeTicks = function () {
                        return this.chart.time.getTimeTicks.apply(this.chart.time, arguments)
                    };
                    v(a, "init", function (a) {
                        "datetime" !== a.userOptions.type ? this.dateTime = void 0 : this.dateTime || (this.dateTime = new G(this))
                    })
                };
                a.AdditionsClass = G;
                return a
            }();
            u.compose(a);
            return u
        });
        L(a, "Core/Axis/LogarithmicAxis.js", [a["Core/Axis/Axis.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = u.addEvent, H = u.getMagnitude,
                x = u.normalizeTickInterval, y = u.pick, G = function () {
                    function a(a) {
                        this.axis = a
                    }

                    a.prototype.getLogTickPositions = function (a, h, f, c) {
                        var e = this.axis, t = e.len, m = e.options, w = [];
                        c || (this.minorAutoInterval = void 0);
                        if (.5 <= a) a = Math.round(a), w = e.getLinearTickPositions(a, h, f); else if (.08 <= a) {
                            var n = Math.floor(h), l, q = m = void 0;
                            for (t = .3 < a ? [1, 2, 4] : .15 < a ? [1, 2, 4, 6, 8] : [1, 2, 3, 4, 5, 6, 7, 8, 9]; n < f + 1 && !q; n++) {
                                var v = t.length;
                                for (l = 0; l < v && !q; l++) {
                                    var A = this.log2lin(this.lin2log(n) * t[l]);
                                    A > h && (!c || m <= f) && "undefined" !== typeof m && w.push(m);
                                    m > f && (q = !0);
                                    m = A
                                }
                            }
                        } else h = this.lin2log(h), f = this.lin2log(f), a = c ? e.getMinorTickInterval() : m.tickInterval, a = y("auto" === a ? null : a, this.minorAutoInterval, m.tickPixelInterval / (c ? 5 : 1) * (f - h) / ((c ? t / e.tickPositions.length : t) || 1)), a = x(a, void 0, H(a)), w = e.getLinearTickPositions(a, h, f).map(this.log2lin), c || (this.minorAutoInterval = a / 5);
                        c || (e.tickInterval = a);
                        return w
                    };
                    a.prototype.lin2log = function (a) {
                        return Math.pow(10, a)
                    };
                    a.prototype.log2lin = function (a) {
                        return Math.log(a) / Math.LN10
                    };
                    return a
                }();
            u = function () {
                function a() {
                }

                a.compose = function (a) {
                    a.keepProps.push("logarithmic");
                    v(a, "init", function (a) {
                        var f = this.logarithmic;
                        "logarithmic" !== a.userOptions.type ? this.logarithmic = void 0 : f || (this.logarithmic = new G(this))
                    });
                    v(a, "afterInit", function () {
                        var a = this.logarithmic;
                        a && (this.lin2val = function (f) {
                            return a.lin2log(f)
                        }, this.val2lin = function (f) {
                            return a.log2lin(f)
                        })
                    })
                };
                return a
            }();
            u.compose(a);
            return u
        });
        L(a, "Core/Axis/PlotLineOrBand.js", [a["Core/Axis/Axis.js"], a["Core/Color/Palette.js"], a["Core/Utilities.js"]], function (a,
                                                                                                                                    u, E) {
            var v = E.arrayMax, x = E.arrayMin, y = E.defined, G = E.destroyObjectProperties, B = E.erase, q = E.extend,
                h = E.fireEvent, f = E.isNumber, c = E.merge, e = E.objectEach, t = E.pick, m = function () {
                    function a(a, c) {
                        this.axis = a;
                        c && (this.options = c, this.id = c.id)
                    }

                    a.prototype.render = function () {
                        h(this, "render");
                        var a = this, l = a.axis, f = l.horiz, m = l.logarithmic, w = a.options, p = w.label, d = a.label,
                            k = w.to, b = w.from, g = w.value, r = y(b) && y(k), F = y(g), D = a.svgElem, M = !D, C = [],
                            q = w.color, v = t(w.zIndex, 0), W = w.events;
                        C = {
                            "class": "highcharts-plot-" + (r ? "band " :
                                "line ") + (w.className || "")
                        };
                        var B = {}, x = l.chart.renderer, z = r ? "bands" : "lines";
                        m && (b = m.log2lin(b), k = m.log2lin(k), g = m.log2lin(g));
                        l.chart.styledMode || (F ? (C.stroke = q || u.neutralColor40, C["stroke-width"] = t(w.width, 1), w.dashStyle && (C.dashstyle = w.dashStyle)) : r && (C.fill = q || u.highlightColor10, w.borderWidth && (C.stroke = w.borderColor, C["stroke-width"] = w.borderWidth)));
                        B.zIndex = v;
                        z += "-" + v;
                        (m = l.plotLinesAndBandsGroups[z]) || (l.plotLinesAndBandsGroups[z] = m = x.g("plot-" + z).attr(B).add());
                        M && (a.svgElem = D = x.path().attr(C).add(m));
                        if (F) C = l.getPlotLinePath({
                            value: g,
                            lineWidth: D.strokeWidth(),
                            acrossPanes: w.acrossPanes
                        }); else if (r) C = l.getPlotBandPath(b, k, w); else return;
                        !a.eventsAdded && W && (e(W, function (b, d) {
                            D.on(d, function (b) {
                                W[d].apply(a, [b])
                            })
                        }), a.eventsAdded = !0);
                        (M || !D.d) && C && C.length ? D.attr({d: C}) : D && (C ? (D.show(!0), D.animate({d: C})) : D.d && (D.hide(), d && (a.label = d = d.destroy())));
                        p && (y(p.text) || y(p.formatter)) && C && C.length && 0 < l.width && 0 < l.height && !C.isFlat ? (p = c({
                            align: f && r && "center", x: f ? !r && 4 : 10, verticalAlign: !f && r && "middle", y: f ?
                                r ? 16 : 10 : r ? 6 : -4, rotation: f && !r && 90
                        }, p), this.renderLabel(p, C, r, v)) : d && d.hide();
                        return a
                    };
                    a.prototype.renderLabel = function (a, c, e, f) {
                        var l = this.label, h = this.axis.chart.renderer;
                        l || (l = {
                            align: a.textAlign || a.align,
                            rotation: a.rotation,
                            "class": "highcharts-plot-" + (e ? "band" : "line") + "-label " + (a.className || "")
                        }, l.zIndex = f, f = this.getLabelText(a), this.label = l = h.text(f, 0, 0, a.useHTML).attr(l).add(), this.axis.chart.styledMode || l.css(a.style));
                        h = c.xBounds || [c[0][1], c[1][1], e ? c[2][1] : c[0][1]];
                        c = c.yBounds || [c[0][2],
                            c[1][2], e ? c[2][2] : c[0][2]];
                        e = x(h);
                        f = x(c);
                        l.align(a, !1, {x: e, y: f, width: v(h) - e, height: v(c) - f});
                        l.show(!0)
                    };
                    a.prototype.getLabelText = function (a) {
                        return y(a.formatter) ? a.formatter.call(this) : a.text
                    };
                    a.prototype.destroy = function () {
                        B(this.axis.plotLinesAndBands, this);
                        delete this.axis;
                        G(this)
                    };
                    return a
                }();
            q(a.prototype, {
                getPlotBandPath: function (a, c, e) {
                    void 0 === e && (e = this.options);
                    var l = this.getPlotLinePath({value: c, force: !0, acrossPanes: e.acrossPanes});
                    e = this.getPlotLinePath({value: a, force: !0, acrossPanes: e.acrossPanes});
                    var h = [], m = this.horiz, p = 1;
                    a = !f(this.min) || !f(this.max) || a < this.min && c < this.min || a > this.max && c > this.max;
                    if (e && l) {
                        if (a) {
                            var d = e.toString() === l.toString();
                            p = 0
                        }
                        for (a = 0; a < e.length; a += 2) {
                            c = e[a];
                            var k = e[a + 1], b = l[a], g = l[a + 1];
                            "M" !== c[0] && "L" !== c[0] || "M" !== k[0] && "L" !== k[0] || "M" !== b[0] && "L" !== b[0] || "M" !== g[0] && "L" !== g[0] || (m && b[1] === c[1] ? (b[1] += p, g[1] += p) : m || b[2] !== c[2] || (b[2] += p, g[2] += p), h.push(["M", c[1], c[2]], ["L", k[1], k[2]], ["L", g[1], g[2]], ["L", b[1], b[2]], ["Z"]));
                            h.isFlat = d
                        }
                    }
                    return h
                }, addPlotBand: function (a) {
                    return this.addPlotBandOrLine(a,
                        "plotBands")
                }, addPlotLine: function (a) {
                    return this.addPlotBandOrLine(a, "plotLines")
                }, addPlotBandOrLine: function (a, c) {
                    var e = this, f = new m(this, a), h = this.userOptions;
                    this.visible && (f = f.render());
                    if (f) {
                        this._addedPlotLB || (this._addedPlotLB = !0, (h.plotLines || []).concat(h.plotBands || []).forEach(function (a) {
                            e.addPlotBandOrLine(a)
                        }));
                        if (c) {
                            var t = h[c] || [];
                            t.push(a);
                            h[c] = t
                        }
                        this.plotLinesAndBands.push(f)
                    }
                    return f
                }, removePlotBandOrLine: function (a) {
                    var c = this.plotLinesAndBands, e = this.options, f = this.userOptions;
                    if (c) {
                        for (var h = c.length; h--;) c[h].id === a && c[h].destroy();
                        [e.plotLines || [], f.plotLines || [], e.plotBands || [], f.plotBands || []].forEach(function (c) {
                            for (h = c.length; h--;) (c[h] || {}).id === a && B(c, c[h])
                        })
                    }
                }, removePlotBand: function (a) {
                    this.removePlotBandOrLine(a)
                }, removePlotLine: function (a) {
                    this.removePlotBandOrLine(a)
                }
            });
            return m
        });
        L(a, "Core/Tooltip.js", [a["Core/FormatUtilities.js"], a["Core/Globals.js"], a["Core/Color/Palette.js"], a["Core/Renderer/RendererRegistry.js"], a["Core/Utilities.js"]], function (a, u, E,
                                                                                                                                                                                            H, x) {
            var v = a.format, G = u.doc, B = x.clamp, q = x.css, h = x.defined, f = x.discardElement, c = x.extend,
                e = x.fireEvent, t = x.isArray, m = x.isNumber, w = x.isString, n = x.merge, l = x.pick, J = x.splat,
                K = x.syncTimeout, A = x.timeUnits;
            "";
            a = function () {
                function a(a, c) {
                    this.container = void 0;
                    this.crosshairs = [];
                    this.distance = 0;
                    this.isHidden = !0;
                    this.isSticky = !1;
                    this.now = {};
                    this.options = {};
                    this.outside = !1;
                    this.chart = a;
                    this.init(a, c)
                }

                a.prototype.applyFilter = function () {
                    var a = this.chart;
                    a.renderer.definition({
                        tagName: "filter",
                        attributes: {
                            id: "drop-shadow-" +
                                a.index, opacity: .5
                        },
                        children: [{
                            tagName: "feGaussianBlur",
                            attributes: {"in": "SourceAlpha", stdDeviation: 1}
                        }, {tagName: "feOffset", attributes: {dx: 1, dy: 1}}, {
                            tagName: "feComponentTransfer",
                            children: [{tagName: "feFuncA", attributes: {type: "linear", slope: .3}}]
                        }, {
                            tagName: "feMerge",
                            children: [{tagName: "feMergeNode"}, {
                                tagName: "feMergeNode",
                                attributes: {"in": "SourceGraphic"}
                            }]
                        }]
                    })
                };
                a.prototype.bodyFormatter = function (a) {
                    return a.map(function (a) {
                        var b = a.series.tooltipOptions;
                        return (b[(a.point.formatPrefix || "point") + "Formatter"] ||
                            a.point.tooltipFormatter).call(a.point, b[(a.point.formatPrefix || "point") + "Format"] || "")
                    })
                };
                a.prototype.cleanSplit = function (a) {
                    this.chart.series.forEach(function (d) {
                        var b = d && d.tt;
                        b && (!b.isActive || a ? d.tt = b.destroy() : b.isActive = !1)
                    })
                };
                a.prototype.defaultFormatter = function (a) {
                    var d = this.points || J(this);
                    var b = [a.tooltipFooterHeaderFormatter(d[0])];
                    b = b.concat(a.bodyFormatter(d));
                    b.push(a.tooltipFooterHeaderFormatter(d[0], !0));
                    return b
                };
                a.prototype.destroy = function () {
                    this.label && (this.label = this.label.destroy());
                    this.split && this.tt && (this.cleanSplit(this.chart, !0), this.tt = this.tt.destroy());
                    this.renderer && (this.renderer = this.renderer.destroy(), f(this.container));
                    x.clearTimeout(this.hideTimer);
                    x.clearTimeout(this.tooltipTimeout)
                };
                a.prototype.getAnchor = function (a, c) {
                    var b = this.chart;
                    var d = b.pointer;
                    var k = b.inverted, e = b.plotTop, f = b.plotLeft, l = 0, h = 0, p, m;
                    a = J(a);
                    this.followPointer && c ? ("undefined" === typeof c.chartX && (c = d.normalize(c)), d = [c.chartX - f, c.chartY - e]) : a[0].tooltipPos ? d = a[0].tooltipPos : (a.forEach(function (a) {
                        p =
                            a.series.yAxis;
                        m = a.series.xAxis;
                        l += a.plotX || 0;
                        h += a.plotLow ? (a.plotLow + (a.plotHigh || 0)) / 2 : a.plotY || 0;
                        m && p && (k ? (l += e + b.plotHeight - m.len - m.pos, h += f + b.plotWidth - p.len - p.pos) : (l += m.pos - f, h += p.pos - e))
                    }), l /= a.length, h /= a.length, d = [k ? b.plotWidth - h : l, k ? b.plotHeight - l : h], this.shared && 1 < a.length && c && (k ? d[0] = c.chartX - f : d[1] = c.chartY - e));
                    return d.map(Math.round)
                };
                a.prototype.getDateFormat = function (a, c, b, g) {
                    var d = this.chart.time, k = d.dateFormat("%m-%d %H:%M:%S.%L", c), e = {
                        millisecond: 15, second: 12, minute: 9, hour: 6,
                        day: 3
                    }, l = "millisecond";
                    for (f in A) {
                        if (a === A.week && +d.dateFormat("%w", c) === b && "00:00:00.000" === k.substr(6)) {
                            var f = "week";
                            break
                        }
                        if (A[f] > a) {
                            f = l;
                            break
                        }
                        if (e[f] && k.substr(e[f]) !== "01-01 00:00:00.000".substr(e[f])) break;
                        "week" !== f && (l = f)
                    }
                    if (f) var h = d.resolveDTLFormat(g[f]).main;
                    return h
                };
                a.prototype.getLabel = function () {
                    var a = this, c = this.chart.renderer, b = this.chart.styledMode, g = this.options,
                        e = "tooltip" + (h(g.className) ? " " + g.className : ""),
                        f = g.style && g.style.pointerEvents || (!this.followPointer && g.stickOnContact ?
                            "auto" : "none"), l, p = function () {
                            a.inContact = !0
                        }, C = function () {
                            var b = a.chart.hoverSeries;
                            a.inContact = !1;
                            if (b && b.onMouseOut) b.onMouseOut()
                        };
                    if (!this.label) {
                        if (this.outside) {
                            var m = this.chart.options.chart.style, t = H.getRendererType();
                            this.container = l = u.doc.createElement("div");
                            l.className = "highcharts-tooltip-container";
                            q(l, {
                                position: "absolute",
                                top: "1px",
                                pointerEvents: f,
                                zIndex: Math.max(this.options.style && this.options.style.zIndex || 0, (m && m.zIndex || 0) + 3)
                            });
                            u.doc.body.appendChild(l);
                            this.renderer = c = new t(l,
                                0, 0, m, void 0, void 0, c.styledMode)
                        }
                        this.split ? this.label = c.g(e) : (this.label = c.label("", 0, 0, g.shape || "callout", null, null, g.useHTML, null, e).attr({
                            padding: g.padding,
                            r: g.borderRadius
                        }), b || this.label.attr({
                            fill: g.backgroundColor,
                            "stroke-width": g.borderWidth
                        }).css(g.style).css({pointerEvents: f}).shadow(g.shadow));
                        b && g.shadow && (this.applyFilter(), this.label.attr({filter: "url(#drop-shadow-" + this.chart.index + ")"}));
                        if (a.outside && !a.split) {
                            var n = this.label, w = n.xSetter, v = n.ySetter;
                            n.xSetter = function (b) {
                                w.call(n,
                                    a.distance);
                                l.style.left = b + "px"
                            };
                            n.ySetter = function (b) {
                                v.call(n, a.distance);
                                l.style.top = b + "px"
                            }
                        }
                        this.label.on("mouseenter", p).on("mouseleave", C).attr({zIndex: 8}).add()
                    }
                    return this.label
                };
                a.prototype.getPosition = function (a, c, b) {
                    var d = this.chart, k = this.distance, e = {}, f = d.inverted && b.h || 0, h, C = this.outside,
                        p = C ? G.documentElement.clientWidth - 2 * k : d.chartWidth,
                        m = C ? Math.max(G.body.scrollHeight, G.documentElement.scrollHeight, G.body.offsetHeight, G.documentElement.offsetHeight, G.documentElement.clientHeight) :
                            d.chartHeight, t = d.pointer.getChartPosition(), n = function (g) {
                            var e = "x" === g;
                            return [g, e ? p : m, e ? a : c].concat(C ? [e ? a * t.scaleX : c * t.scaleY, e ? t.left - k + (b.plotX + d.plotLeft) * t.scaleX : t.top - k + (b.plotY + d.plotTop) * t.scaleY, 0, e ? p : m] : [e ? a : c, e ? b.plotX + d.plotLeft : b.plotY + d.plotTop, e ? d.plotLeft : d.plotTop, e ? d.plotLeft + d.plotWidth : d.plotTop + d.plotHeight])
                        }, q = n("y"), w = n("x"), v = !this.followPointer && l(b.ttBelow, !d.inverted === !!b.negative),
                        A = function (b, a, d, g, c, r, l) {
                            var h = C ? "y" === b ? k * t.scaleY : k * t.scaleX : k, F = (d - g) / 2, I = g < c - k,
                                D = c + k + g < a, p = c - h - d + F;
                            c = c + h - F;
                            if (v && D) e[b] = c; else if (!v && I) e[b] = p; else if (I) e[b] = Math.min(l - g, 0 > p - f ? p : p - f); else if (D) e[b] = Math.max(r, c + f + d > a ? c : c + f); else return !1
                        }, J = function (b, a, d, g, c) {
                            var r;
                            c < k || c > a - k ? r = !1 : e[b] = c < d / 2 ? 1 : c > a - g / 2 ? a - g - 2 : c - d / 2;
                            return r
                        }, u = function (b) {
                            var a = q;
                            q = w;
                            w = a;
                            h = b
                        }, I = function () {
                            !1 !== A.apply(0, q) ? !1 !== J.apply(0, w) || h || (u(!0), I()) : h ? e.x = e.y = 0 : (u(!0), I())
                        };
                    (d.inverted || 1 < this.len) && u();
                    I();
                    return e
                };
                a.prototype.getXDateFormat = function (a, c, b) {
                    c = c.dateTimeLabelFormats;
                    var d = b && b.closestPointRange;
                    return (d ? this.getDateFormat(d, a.x, b.options.startOfWeek, c) : c.day) || c.year
                };
                a.prototype.hide = function (a) {
                    var d = this;
                    x.clearTimeout(this.hideTimer);
                    a = l(a, this.options.hideDelay, 500);
                    this.isHidden || (this.hideTimer = K(function () {
                        d.getLabel().fadeOut(a ? void 0 : a);
                        d.isHidden = !0
                    }, a))
                };
                a.prototype.init = function (a, c) {
                    this.chart = a;
                    this.options = c;
                    this.crosshairs = [];
                    this.now = {x: 0, y: 0};
                    this.isHidden = !0;
                    this.split = c.split && !a.inverted && !a.polar;
                    this.shared = c.shared || this.split;
                    this.outside = l(c.outside, !(!a.scrollablePixelsX &&
                        !a.scrollablePixelsY))
                };
                a.prototype.isStickyOnContact = function () {
                    return !(this.followPointer || !this.options.stickOnContact || !this.inContact)
                };
                a.prototype.move = function (a, k, b, g) {
                    var d = this, e = d.now,
                        f = !1 !== d.options.animation && !d.isHidden && (1 < Math.abs(a - e.x) || 1 < Math.abs(k - e.y)),
                        l = d.followPointer || 1 < d.len;
                    c(e, {
                        x: f ? (2 * e.x + a) / 3 : a,
                        y: f ? (e.y + k) / 2 : k,
                        anchorX: l ? void 0 : f ? (2 * e.anchorX + b) / 3 : b,
                        anchorY: l ? void 0 : f ? (e.anchorY + g) / 2 : g
                    });
                    d.getLabel().attr(e);
                    d.drawTracker();
                    f && (x.clearTimeout(this.tooltipTimeout), this.tooltipTimeout =
                        setTimeout(function () {
                            d && d.move(a, k, b, g)
                        }, 32))
                };
                a.prototype.refresh = function (a, c) {
                    var b = this.chart, d = this.options, k = J(a), f = k[0], h = {}, p = [],
                        C = d.formatter || this.defaultFormatter;
                    h = this.shared;
                    var m = b.styledMode;
                    if (d.enabled) {
                        x.clearTimeout(this.hideTimer);
                        this.followPointer = !this.split && f.series.tooltipOptions.followPointer;
                        var n = this.getAnchor(a, c);
                        var q = n[0];
                        var w = n[1];
                        !h || !t(a) && a.series && a.series.noSharedTooltip ? h = f.getLabelConfig() : (b.pointer.applyInactiveState(k), k.forEach(function (b) {
                            b.setState("hover");
                            p.push(b.getLabelConfig())
                        }), h = {x: f.category, y: f.y}, h.points = p);
                        this.len = p.length;
                        a = C.call(h, this);
                        C = f.series;
                        this.distance = l(C.tooltipOptions.distance, 16);
                        if (!1 === a) this.hide(); else {
                            if (this.split) this.renderSplit(a, k); else if (k = q, h = w, c && b.pointer.isDirectTouch && (k = c.chartX - b.plotLeft, h = c.chartY - b.plotTop), b.polar || !1 === C.options.clip || C.shouldShowTooltip(k, h)) c = this.getLabel(), d.style.width && !m || c.css({width: this.chart.spacingBox.width + "px"}), c.attr({text: a && a.join ? a.join("") : a}), c.removeClass(/highcharts-color-[\d]+/g).addClass("highcharts-color-" +
                                l(f.colorIndex, C.colorIndex)), m || c.attr({stroke: d.borderColor || f.color || C.color || E.neutralColor60}), this.updatePosition({
                                plotX: q,
                                plotY: w,
                                negative: f.negative,
                                ttBelow: f.ttBelow,
                                h: n[2] || 0
                            }); else {
                                this.hide();
                                return
                            }
                            this.isHidden && this.label && this.label.attr({opacity: 1}).show();
                            this.isHidden = !1
                        }
                        e(this, "refresh")
                    }
                };
                a.prototype.renderSplit = function (a, k) {
                    function b(b, a, g, c, k) {
                        void 0 === k && (k = !0);
                        g ? (a = T ? 0 : da, b = B(b - c / 2, N.left, N.right - c - (d.outside ? R : 0))) : (a -= V, b = k ? b - c - x : b + x, b = B(b, k ? b : N.left, N.right));
                        return {
                            x: b,
                            y: a
                        }
                    }

                    var d = this, e = d.chart, f = d.chart, h = f.chartWidth, p = f.chartHeight, C = f.plotHeight,
                        m = f.plotLeft, t = f.plotTop, n = f.pointer, q = f.scrollablePixelsY;
                    q = void 0 === q ? 0 : q;
                    var v = f.scrollablePixelsX, A = f.scrollingContainer;
                    A = void 0 === A ? {scrollLeft: 0, scrollTop: 0} : A;
                    var J = A.scrollLeft;
                    A = A.scrollTop;
                    var K = f.styledMode, x = d.distance, y = d.options, I = d.options.positioner,
                        N = d.outside && "number" !== typeof v ? G.documentElement.getBoundingClientRect() : {
                            left: J,
                            right: J + h,
                            top: A,
                            bottom: A + p
                        }, P = d.getLabel(), U = this.renderer || e.renderer,
                        T = !(!e.xAxis[0] || !e.xAxis[0].opposite);
                    e = n.getChartPosition();
                    var R = e.left;
                    e = e.top;
                    var V = t + A, ca = 0, da = C - q;
                    w(a) && (a = [!1, a]);
                    a = a.slice(0, k.length + 1).reduce(function (a, g, c) {
                        if (!1 !== g && "" !== g) {
                            c = k[c - 1] || {isHeader: !0, plotX: k[0].plotX, plotY: C, series: {}};
                            var e = c.isHeader, f = e ? d : c.series;
                            g = g.toString();
                            var r = f.tt, h = c.isHeader;
                            var F = c.series;
                            var p = "highcharts-color-" + l(c.colorIndex, F.colorIndex, "none");
                            r || (r = {
                                padding: y.padding,
                                r: y.borderRadius
                            }, K || (r.fill = y.backgroundColor, r["stroke-width"] = y.borderWidth), r =
                                U.label("", 0, 0, y[h ? "headerShape" : "shape"] || "callout", void 0, void 0, y.useHTML).addClass((h ? "highcharts-tooltip-header " : "") + "highcharts-tooltip-box " + p).attr(r).add(P));
                            r.isActive = !0;
                            r.attr({text: g});
                            K || r.css(y.style).shadow(y.shadow).attr({stroke: y.borderColor || c.color || F.color || E.neutralColor80});
                            f = f.tt = r;
                            h = f.getBBox();
                            g = h.width + f.strokeWidth();
                            e && (ca = h.height, da += ca, T && (V -= ca));
                            F = c.plotX;
                            F = void 0 === F ? 0 : F;
                            p = c.plotY;
                            p = void 0 === p ? 0 : p;
                            r = c.series;
                            if (c.isHeader) {
                                F = m + F;
                                var D = t + C / 2
                            } else {
                                var n = r.xAxis, M =
                                    r.yAxis;
                                F = n.pos + B(F, -x, n.len + x);
                                r.shouldShowTooltip(0, M.pos - t + p, {ignoreX: !0}) && (D = M.pos + p)
                            }
                            F = B(F, N.left - x, N.right + x);
                            "number" === typeof D ? (h = h.height + 1, p = I ? I.call(d, g, h, c) : b(F, D, e, g), a.push({
                                align: I ? 0 : void 0,
                                anchorX: F,
                                anchorY: D,
                                boxWidth: g,
                                point: c,
                                rank: l(p.rank, e ? 1 : 0),
                                size: h,
                                target: p.y,
                                tt: f,
                                x: p.x
                            })) : f.isActive = !1
                        }
                        return a
                    }, []);
                    !I && a.some(function (b) {
                        var a = (d.outside ? R : 0) + b.anchorX;
                        return a < N.left && a + b.boxWidth < N.right ? !0 : a < R - N.left + b.boxWidth && N.right - a > a
                    }) && (a = a.map(function (a) {
                        var d = b(a.anchorX, a.anchorY,
                            a.point.isHeader, a.boxWidth, !1);
                        return c(a, {target: d.y, x: d.x})
                    }));
                    d.cleanSplit();
                    u.distribute(a, da);
                    var H = R, ea = R;
                    a.forEach(function (b) {
                        var a = b.x, g = b.boxWidth;
                        b = b.isHeader;
                        b || (d.outside && R + a < H && (H = R + a), !b && d.outside && H + g > ea && (ea = R + a))
                    });
                    a.forEach(function (b) {
                        var a = b.x, g = b.anchorX, c = b.pos, k = b.point.isHeader;
                        c = {
                            visibility: "undefined" === typeof c ? "hidden" : "inherit",
                            x: a,
                            y: c + V,
                            anchorX: g,
                            anchorY: b.anchorY
                        };
                        if (d.outside && a < g) {
                            var e = R - H;
                            0 < e && (k || (c.x = a + e, c.anchorX = g + e), k && (c.x = (ea - H) / 2, c.anchorX = g + e))
                        }
                        b.tt.attr(c)
                    });
                    a = d.container;
                    q = d.renderer;
                    d.outside && a && q && (f = P.getBBox(), q.setSize(f.width + f.x, f.height + f.y, !1), a.style.left = H + "px", a.style.top = e + "px")
                };
                a.prototype.drawTracker = function () {
                    if (this.followPointer || !this.options.stickOnContact) this.tracker && this.tracker.destroy(); else {
                        var a = this.chart, c = this.label, b = this.shared ? a.hoverPoints : a.hoverPoint;
                        if (c && b) {
                            var g = {x: 0, y: 0, width: 0, height: 0};
                            b = this.getAnchor(b);
                            var e = c.getBBox();
                            b[0] += a.plotLeft - c.translateX;
                            b[1] += a.plotTop - c.translateY;
                            g.x = Math.min(0, b[0]);
                            g.y =
                                Math.min(0, b[1]);
                            g.width = 0 > b[0] ? Math.max(Math.abs(b[0]), e.width - b[0]) : Math.max(Math.abs(b[0]), e.width);
                            g.height = 0 > b[1] ? Math.max(Math.abs(b[1]), e.height - Math.abs(b[1])) : Math.max(Math.abs(b[1]), e.height);
                            this.tracker ? this.tracker.attr(g) : (this.tracker = c.renderer.rect(g).addClass("highcharts-tracker").add(c), a.styledMode || this.tracker.attr({fill: "rgba(0,0,0,0)"}))
                        }
                    }
                };
                a.prototype.styledModeFormat = function (a) {
                    return a.replace('style="font-size: 10px"', 'class="highcharts-header"').replace(/style="color:{(point|series)\.color}"/g,
                        'class="highcharts-color-{$1.colorIndex}"')
                };
                a.prototype.tooltipFooterHeaderFormatter = function (a, c) {
                    var b = c ? "footer" : "header", d = a.series, k = d.tooltipOptions, f = k.xDateFormat, l = d.xAxis,
                        h = l && "datetime" === l.options.type && m(a.key), p = k[b + "Format"];
                    c = {isFooter: c, labelConfig: a};
                    e(this, "headerFormatter", c, function (b) {
                        h && !f && (f = this.getXDateFormat(a, k, l));
                        h && f && (a.point && a.point.tooltipDateKeys || ["key"]).forEach(function (b) {
                            p = p.replace("{point." + b + "}", "{point." + b + ":" + f + "}")
                        });
                        d.chart.styledMode && (p = this.styledModeFormat(p));
                        b.text = v(p, {point: a, series: d}, this.chart)
                    });
                    return c.text
                };
                a.prototype.update = function (a) {
                    this.destroy();
                    n(!0, this.chart.options.tooltip.userOptions, a);
                    this.init(this.chart, n(!0, this.options, a))
                };
                a.prototype.updatePosition = function (a) {
                    var d = this.chart, b = d.pointer, c = this.getLabel(), e = a.plotX + d.plotLeft;
                    d = a.plotY + d.plotTop;
                    b = b.getChartPosition();
                    a = (this.options.positioner || this.getPosition).call(this, c.width, c.height, a);
                    if (this.outside) {
                        var f = (this.options.borderWidth || 0) + 2 * this.distance;
                        this.renderer.setSize(c.width +
                            f, c.height + f, !1);
                        if (1 !== b.scaleX || 1 !== b.scaleY) q(this.container, {transform: "scale(" + b.scaleX + ", " + b.scaleY + ")"}), e *= b.scaleX, d *= b.scaleY;
                        e += b.left - a.x;
                        d += b.top - a.y
                    }
                    this.move(Math.round(a.x), Math.round(a.y || 0), e, d)
                };
                return a
            }();
            u.Tooltip = a;
            return u.Tooltip
        });
        L(a, "Core/Pointer.js", [a["Core/Color/Color.js"], a["Core/Globals.js"], a["Core/Color/Palette.js"], a["Core/Tooltip.js"], a["Core/Utilities.js"]], function (a, u, E, H, x) {
            var v = a.parse, G = u.charts, B = u.noop, q = x.addEvent, h = x.attr, f = x.css, c = x.defined,
                e = x.extend,
                t = x.find, m = x.fireEvent, w = x.isNumber, n = x.isObject, l = x.objectEach, J = x.offset, K = x.pick,
                A = x.splat;
            a = function () {
                function a(a, c) {
                    this.lastValidTouch = {};
                    this.pinchDown = [];
                    this.runChartClick = !1;
                    this.eventsToUnbind = [];
                    this.chart = a;
                    this.hasDragged = !1;
                    this.options = c;
                    this.init(a, c)
                }

                a.prototype.applyInactiveState = function (a) {
                    var d = [], b;
                    (a || []).forEach(function (a) {
                        b = a.series;
                        d.push(b);
                        b.linkedParent && d.push(b.linkedParent);
                        b.linkedSeries && (d = d.concat(b.linkedSeries));
                        b.navigatorSeries && d.push(b.navigatorSeries)
                    });
                    this.chart.series.forEach(function (b) {
                        -1 === d.indexOf(b) ? b.setState("inactive", !0) : b.options.inactiveOtherPoints && b.setAllPointsToState("inactive")
                    })
                };
                a.prototype.destroy = function () {
                    var d = this;
                    this.eventsToUnbind.forEach(function (a) {
                        return a()
                    });
                    this.eventsToUnbind = [];
                    u.chartCount || (a.unbindDocumentMouseUp && (a.unbindDocumentMouseUp = a.unbindDocumentMouseUp()), a.unbindDocumentTouchEnd && (a.unbindDocumentTouchEnd = a.unbindDocumentTouchEnd()));
                    clearInterval(d.tooltipTimeout);
                    l(d, function (a, b) {
                        d[b] = void 0
                    })
                };
                a.prototype.drag = function (a) {
                    var d = this.chart, b = d.options.chart, c = this.zoomHor, e = this.zoomVert, f = d.plotLeft,
                        l = d.plotTop, h = d.plotWidth, C = d.plotHeight, p = this.mouseDownX || 0,
                        m = this.mouseDownY || 0, t = n(b.panning) ? b.panning && b.panning.enabled : b.panning,
                        q = b.panKey && a[b.panKey + "Key"], w = a.chartX, A = a.chartY,
                        J = this.selectionMarker;
                    if (!J || !J.touch) if (w < f ? w = f : w > f + h && (w = f + h), A < l ? A = l : A > l + C && (A = l + C), this.hasDragged = Math.sqrt(Math.pow(p - w, 2) + Math.pow(m - A, 2)), 10 < this.hasDragged) {
                        var u = d.isInsidePlot(p - f, m - l, {visiblePlotOnly: !0});
                        d.hasCartesianSeries && (this.zoomX || this.zoomY) && u && !q && !J && (this.selectionMarker = J = d.renderer.rect(f, l, c ? 1 : h, e ? 1 : C, 0).attr({
                            "class": "highcharts-selection-marker",
                            zIndex: 7
                        }).add(), d.styledMode || J.attr({fill: b.selectionMarkerFill || v(E.highlightColor80).setOpacity(.25).get()}));
                        J && c && (c = w - p, J.attr({width: Math.abs(c), x: (0 < c ? 0 : c) + p}));
                        J && e && (c = A - m, J.attr({height: Math.abs(c), y: (0 < c ? 0 : c) + m}));
                        u && !J && t && d.pan(a, b.panning)
                    }
                };
                a.prototype.dragStart = function (a) {
                    var d = this.chart;
                    d.mouseIsDown = a.type;
                    d.cancelClick =
                        !1;
                    d.mouseDownX = this.mouseDownX = a.chartX;
                    d.mouseDownY = this.mouseDownY = a.chartY
                };
                a.prototype.drop = function (a) {
                    var d = this, b = this.chart, g = this.hasPinched;
                    if (this.selectionMarker) {
                        var r = {originalEvent: a, xAxis: [], yAxis: []}, l = this.selectionMarker,
                            h = l.attr ? l.attr("x") : l.x, p = l.attr ? l.attr("y") : l.y,
                            C = l.attr ? l.attr("width") : l.width, t = l.attr ? l.attr("height") : l.height, n;
                        if (this.hasDragged || g) b.axes.forEach(function (b) {
                            if (b.zoomEnabled && c(b.min) && (g || d[{
                                xAxis: "zoomX",
                                yAxis: "zoomY"
                            }[b.coll]]) && w(h) && w(p)) {
                                var e =
                                        b.horiz, k = "touchend" === a.type ? b.minPixelPadding : 0,
                                    f = b.toValue((e ? h : p) + k);
                                e = b.toValue((e ? h + C : p + t) - k);
                                r[b.coll].push({axis: b, min: Math.min(f, e), max: Math.max(f, e)});
                                n = !0
                            }
                        }), n && m(b, "selection", r, function (a) {
                            b.zoom(e(a, g ? {animation: !1} : null))
                        });
                        w(b.index) && (this.selectionMarker = this.selectionMarker.destroy());
                        g && this.scaleGroups()
                    }
                    b && w(b.index) && (f(b.container, {cursor: b._cursor}), b.cancelClick = 10 < this.hasDragged, b.mouseIsDown = this.hasDragged = this.hasPinched = !1, this.pinchDown = [])
                };
                a.prototype.findNearestKDPoint =
                    function (a, c, b) {
                        var d = this.chart, e = d.hoverPoint;
                        d = d.tooltip;
                        if (e && d && d.isStickyOnContact()) return e;
                        var k;
                        a.forEach(function (a) {
                            var d = !(a.noSharedTooltip && c) && 0 > a.options.findNearestPointBy.indexOf("y");
                            a = a.searchPoint(b, d);
                            if ((d = n(a, !0) && a.series) && !(d = !n(k, !0))) {
                                d = k.distX - a.distX;
                                var g = k.dist - a.dist,
                                    e = (a.series.group && a.series.group.zIndex) - (k.series.group && k.series.group.zIndex);
                                d = 0 < (0 !== d && c ? d : 0 !== g ? g : 0 !== e ? e : k.series.index > a.series.index ? -1 : 1)
                            }
                            d && (k = a)
                        });
                        return k
                    };
                a.prototype.getChartCoordinatesFromPoint =
                    function (a, c) {
                        var b = a.series, d = b.xAxis;
                        b = b.yAxis;
                        var e = a.shapeArgs;
                        if (d && b) {
                            var k = K(a.clientX, a.plotX), f = a.plotY || 0;
                            a.isNode && e && w(e.x) && w(e.y) && (k = e.x, f = e.y);
                            return c ? {chartX: b.len + b.pos - f, chartY: d.len + d.pos - k} : {
                                chartX: k + d.pos,
                                chartY: f + b.pos
                            }
                        }
                        if (e && e.x && e.y) return {chartX: e.x, chartY: e.y}
                    };
                a.prototype.getChartPosition = function () {
                    if (this.chartPosition) return this.chartPosition;
                    var a = this.chart.container, c = J(a);
                    this.chartPosition = {left: c.left, top: c.top, scaleX: 1, scaleY: 1};
                    var b = a.offsetWidth;
                    a = a.offsetHeight;
                    2 < b && 2 < a && (this.chartPosition.scaleX = c.width / b, this.chartPosition.scaleY = c.height / a);
                    return this.chartPosition
                };
                a.prototype.getCoordinates = function (a) {
                    var d = {xAxis: [], yAxis: []};
                    this.chart.axes.forEach(function (b) {
                        d[b.isXAxis ? "xAxis" : "yAxis"].push({
                            axis: b,
                            value: b.toValue(a[b.horiz ? "chartX" : "chartY"])
                        })
                    });
                    return d
                };
                a.prototype.getHoverData = function (a, c, b, g, e, f) {
                    var d = [];
                    g = !(!g || !a);
                    var k = {chartX: f ? f.chartX : void 0, chartY: f ? f.chartY : void 0, shared: e};
                    m(this, "beforeGetHoverData", k);
                    var l = c && !c.stickyTracking ?
                        [c] : b.filter(function (b) {
                            return k.filter ? k.filter(b) : b.visible && !(!e && b.directTouch) && K(b.options.enableMouseTracking, !0) && b.stickyTracking
                        });
                    var r = g || !f ? a : this.findNearestKDPoint(l, e, f);
                    c = r && r.series;
                    r && (e && !c.noSharedTooltip ? (l = b.filter(function (b) {
                            return k.filter ? k.filter(b) : b.visible && !(!e && b.directTouch) && K(b.options.enableMouseTracking, !0) && !b.noSharedTooltip
                        }), l.forEach(function (b) {
                            var a = t(b.points, function (b) {
                                return b.x === r.x && !b.isNull
                            });
                            n(a) && (b.chart.isBoosting && (a = b.getPoint(a)), d.push(a))
                        })) :
                        d.push(r));
                    k = {hoverPoint: r};
                    m(this, "afterGetHoverData", k);
                    return {hoverPoint: k.hoverPoint, hoverSeries: c, hoverPoints: d}
                };
                a.prototype.getPointFromEvent = function (a) {
                    a = a.target;
                    for (var d; a && !d;) d = a.point, a = a.parentNode;
                    return d
                };
                a.prototype.onTrackerMouseOut = function (a) {
                    a = a.relatedTarget || a.toElement;
                    var d = this.chart.hoverSeries;
                    this.isDirectTouch = !1;
                    if (!(!d || !a || d.stickyTracking || this.inClass(a, "highcharts-tooltip") || this.inClass(a, "highcharts-series-" + d.index) && this.inClass(a, "highcharts-tracker"))) d.onMouseOut()
                };
                a.prototype.inClass = function (a, c) {
                    for (var b; a;) {
                        if (b = h(a, "class")) {
                            if (-1 !== b.indexOf(c)) return !0;
                            if (-1 !== b.indexOf("highcharts-container")) return !1
                        }
                        a = a.parentNode
                    }
                };
                a.prototype.init = function (a, c) {
                    this.options = c;
                    this.chart = a;
                    this.runChartClick = !(!c.chart.events || !c.chart.events.click);
                    this.pinchDown = [];
                    this.lastValidTouch = {};
                    H && (a.tooltip = new H(a, c.tooltip), this.followTouchMove = K(c.tooltip.followTouchMove, !0));
                    this.setDOMEvents()
                };
                a.prototype.normalize = function (a, c) {
                    var b = a.touches, d = b ? b.length ? b.item(0) :
                        K(b.changedTouches, a.changedTouches)[0] : a;
                    c || (c = this.getChartPosition());
                    b = d.pageX - c.left;
                    d = d.pageY - c.top;
                    b /= c.scaleX;
                    d /= c.scaleY;
                    return e(a, {chartX: Math.round(b), chartY: Math.round(d)})
                };
                a.prototype.onContainerClick = function (a) {
                    var d = this.chart, b = d.hoverPoint;
                    a = this.normalize(a);
                    var c = d.plotLeft, f = d.plotTop;
                    d.cancelClick || (b && this.inClass(a.target, "highcharts-tracker") ? (m(b.series, "click", e(a, {point: b})), d.hoverPoint && b.firePointEvent("click", a)) : (e(a, this.getCoordinates(a)), d.isInsidePlot(a.chartX -
                        c, a.chartY - f, {visiblePlotOnly: !0}) && m(d, "click", a)))
                };
                a.prototype.onContainerMouseDown = function (a) {
                    var d = 1 === ((a.buttons || a.button) & 1);
                    a = this.normalize(a);
                    if (u.isFirefox && 0 !== a.button) this.onContainerMouseMove(a);
                    if ("undefined" === typeof a.button || d) this.zoomOption(a), d && a.preventDefault && a.preventDefault(), this.dragStart(a)
                };
                a.prototype.onContainerMouseLeave = function (d) {
                    var c = G[K(a.hoverChartIndex, -1)], b = this.chart.tooltip;
                    d = this.normalize(d);
                    c && (d.relatedTarget || d.toElement) && (c.pointer.reset(),
                        c.pointer.chartPosition = void 0);
                    b && !b.isHidden && this.reset()
                };
                a.prototype.onContainerMouseEnter = function (a) {
                    delete this.chartPosition
                };
                a.prototype.onContainerMouseMove = function (a) {
                    var d = this.chart;
                    a = this.normalize(a);
                    this.setHoverChartIndex();
                    a.preventDefault || (a.returnValue = !1);
                    ("mousedown" === d.mouseIsDown || this.touchSelect(a)) && this.drag(a);
                    d.openMenu || !this.inClass(a.target, "highcharts-tracker") && !d.isInsidePlot(a.chartX - d.plotLeft, a.chartY - d.plotTop, {visiblePlotOnly: !0}) || (this.inClass(a.target,
                        "highcharts-no-tooltip") ? this.reset(!1, 0) : this.runPointActions(a))
                };
                a.prototype.onDocumentTouchEnd = function (d) {
                    var c = G[K(a.hoverChartIndex, -1)];
                    c && c.pointer.drop(d)
                };
                a.prototype.onContainerTouchMove = function (a) {
                    if (this.touchSelect(a)) this.onContainerMouseMove(a); else this.touch(a)
                };
                a.prototype.onContainerTouchStart = function (a) {
                    if (this.touchSelect(a)) this.onContainerMouseDown(a); else this.zoomOption(a), this.touch(a, !0)
                };
                a.prototype.onDocumentMouseMove = function (a) {
                    var d = this.chart, b = this.chartPosition;
                    a = this.normalize(a, b);
                    var c = d.tooltip;
                    !b || c && c.isStickyOnContact() || d.isInsidePlot(a.chartX - d.plotLeft, a.chartY - d.plotTop, {visiblePlotOnly: !0}) || this.inClass(a.target, "highcharts-tracker") || this.reset()
                };
                a.prototype.onDocumentMouseUp = function (d) {
                    var c = G[K(a.hoverChartIndex, -1)];
                    c && c.pointer.drop(d)
                };
                a.prototype.pinch = function (a) {
                    var d = this, b = d.chart, c = d.pinchDown, f = a.touches || [], l = f.length, h = d.lastValidTouch,
                        p = d.hasZoom, C = {},
                        m = 1 === l && (d.inClass(a.target, "highcharts-tracker") && b.runTrackerClick || d.runChartClick),
                        t = {}, n = d.selectionMarker;
                    1 < l && (d.initiated = !0);
                    p && d.initiated && !m && !1 !== a.cancelable && a.preventDefault();
                    [].map.call(f, function (a) {
                        return d.normalize(a)
                    });
                    "touchstart" === a.type ? ([].forEach.call(f, function (a, b) {
                        c[b] = {chartX: a.chartX, chartY: a.chartY}
                    }), h.x = [c[0].chartX, c[1] && c[1].chartX], h.y = [c[0].chartY, c[1] && c[1].chartY], b.axes.forEach(function (a) {
                        if (a.zoomEnabled) {
                            var d = b.bounds[a.horiz ? "h" : "v"], c = a.minPixelPadding,
                                g = a.toPixels(Math.min(K(a.options.min, a.dataMin), a.dataMin)),
                                e = a.toPixels(Math.max(K(a.options.max,
                                    a.dataMax), a.dataMax)), k = Math.max(g, e);
                            d.min = Math.min(a.pos, Math.min(g, e) - c);
                            d.max = Math.max(a.pos + a.len, k + c)
                        }
                    }), d.res = !0) : d.followTouchMove && 1 === l ? this.runPointActions(d.normalize(a)) : c.length && (n || (d.selectionMarker = n = e({
                        destroy: B,
                        touch: !0
                    }, b.plotBox)), d.pinchTranslate(c, f, C, n, t, h), d.hasPinched = p, d.scaleGroups(C, t), d.res && (d.res = !1, this.reset(!1, 0)))
                };
                a.prototype.pinchTranslate = function (a, c, b, g, e, f) {
                    this.zoomHor && this.pinchTranslateDirection(!0, a, c, b, g, e, f);
                    this.zoomVert && this.pinchTranslateDirection(!1,
                        a, c, b, g, e, f)
                };
                a.prototype.pinchTranslateDirection = function (a, c, b, g, e, f, l, h) {
                    var d = this.chart, k = a ? "x" : "y", r = a ? "X" : "Y", F = "chart" + r,
                        p = a ? "width" : "height", m = d["plot" + (a ? "Left" : "Top")], D = d.inverted,
                        t = d.bounds[a ? "h" : "v"], n = 1 === c.length, M = c[0][F], q = !n && c[1][F];
                    c = function () {
                        "number" === typeof v && 20 < Math.abs(M - q) && (P = h || Math.abs(A - v) / Math.abs(M - q));
                        w = (m - A) / P + M;
                        I = d["plot" + (a ? "Width" : "Height")] / P
                    };
                    var I, w, P = h || 1, A = b[0][F], v = !n && b[1][F];
                    c();
                    b = w;
                    if (b < t.min) {
                        b = t.min;
                        var J = !0
                    } else b + I > t.max && (b = t.max - I, J = !0);
                    J ? (A -=
                        .8 * (A - l[k][0]), "number" === typeof v && (v -= .8 * (v - l[k][1])), c()) : l[k] = [A, v];
                    D || (f[k] = w - m, f[p] = I);
                    f = D ? 1 / P : P;
                    e[p] = I;
                    e[k] = b;
                    g[D ? a ? "scaleY" : "scaleX" : "scale" + r] = P;
                    g["translate" + r] = f * m + (A - f * M)
                };
                a.prototype.reset = function (a, c) {
                    var b = this.chart, d = b.hoverSeries, e = b.hoverPoint, k = b.hoverPoints, f = b.tooltip,
                        l = f && f.shared ? k : e;
                    a && l && A(l).forEach(function (b) {
                        b.series.isCartesian && "undefined" === typeof b.plotX && (a = !1)
                    });
                    if (a) f && l && A(l).length && (f.refresh(l), f.shared && k ? k.forEach(function (a) {
                        a.setState(a.state, !0);
                        a.series.isCartesian &&
                        (a.series.xAxis.crosshair && a.series.xAxis.drawCrosshair(null, a), a.series.yAxis.crosshair && a.series.yAxis.drawCrosshair(null, a))
                    }) : e && (e.setState(e.state, !0), b.axes.forEach(function (a) {
                        a.crosshair && e.series[a.coll] === a && a.drawCrosshair(null, e)
                    }))); else {
                        if (e) e.onMouseOut();
                        k && k.forEach(function (a) {
                            a.setState()
                        });
                        if (d) d.onMouseOut();
                        f && f.hide(c);
                        this.unDocMouseMove && (this.unDocMouseMove = this.unDocMouseMove());
                        b.axes.forEach(function (a) {
                            a.hideCrosshair()
                        });
                        this.hoverX = b.hoverPoints = b.hoverPoint = null
                    }
                };
                a.prototype.runPointActions = function (d, c) {
                    var b = this.chart, g = b.tooltip && b.tooltip.options.enabled ? b.tooltip : void 0,
                        e = g ? g.shared : !1, f = c || b.hoverPoint, k = f && f.series || b.hoverSeries;
                    c = this.getHoverData(f, k, b.series, (!d || "touchmove" !== d.type) && (!!c || k && k.directTouch && this.isDirectTouch), e, d);
                    f = c.hoverPoint;
                    k = c.hoverSeries;
                    var l = c.hoverPoints;
                    c = k && k.tooltipOptions.followPointer && !k.tooltipOptions.split;
                    e = e && k && !k.noSharedTooltip;
                    if (f && (f !== b.hoverPoint || g && g.isHidden)) {
                        (b.hoverPoints || []).forEach(function (a) {
                            -1 ===
                            l.indexOf(a) && a.setState()
                        });
                        if (b.hoverSeries !== k) k.onMouseOver();
                        this.applyInactiveState(l);
                        (l || []).forEach(function (a) {
                            a.setState("hover")
                        });
                        b.hoverPoint && b.hoverPoint.firePointEvent("mouseOut");
                        if (!f.series) return;
                        b.hoverPoints = l;
                        b.hoverPoint = f;
                        f.firePointEvent("mouseOver");
                        g && g.refresh(e ? l : f, d)
                    } else c && g && !g.isHidden && (f = g.getAnchor([{}], d), b.isInsidePlot(f[0], f[1], {visiblePlotOnly: !0}) && g.updatePosition({
                        plotX: f[0],
                        plotY: f[1]
                    }));
                    this.unDocMouseMove || (this.unDocMouseMove = q(b.container.ownerDocument,
                        "mousemove", function (b) {
                            var d = G[a.hoverChartIndex];
                            if (d) d.pointer.onDocumentMouseMove(b)
                        }), this.eventsToUnbind.push(this.unDocMouseMove));
                    b.axes.forEach(function (a) {
                        var c = K((a.crosshair || {}).snap, !0), g;
                        c && ((g = b.hoverPoint) && g.series[a.coll] === a || (g = t(l, function (b) {
                            return b.series[a.coll] === a
                        })));
                        g || !c ? a.drawCrosshair(d, g) : a.hideCrosshair()
                    })
                };
                a.prototype.scaleGroups = function (a, c) {
                    var b = this.chart;
                    b.series.forEach(function (d) {
                        var g = a || d.getPlotBox();
                        d.xAxis && d.xAxis.zoomEnabled && d.group && (d.group.attr(g),
                        d.markerGroup && (d.markerGroup.attr(g), d.markerGroup.clip(c ? b.clipRect : null)), d.dataLabelsGroup && d.dataLabelsGroup.attr(g))
                    });
                    b.clipRect.attr(c || b.clipBox)
                };
                a.prototype.setDOMEvents = function () {
                    var d = this, c = this.chart.container, b = c.ownerDocument;
                    c.onmousedown = this.onContainerMouseDown.bind(this);
                    c.onmousemove = this.onContainerMouseMove.bind(this);
                    c.onclick = this.onContainerClick.bind(this);
                    this.eventsToUnbind.push(q(c, "mouseenter", this.onContainerMouseEnter.bind(this)));
                    this.eventsToUnbind.push(q(c, "mouseleave",
                        this.onContainerMouseLeave.bind(this)));
                    a.unbindDocumentMouseUp || (a.unbindDocumentMouseUp = q(b, "mouseup", this.onDocumentMouseUp.bind(this)));
                    for (var g = this.chart.renderTo.parentElement; g && "BODY" !== g.tagName;) this.eventsToUnbind.push(q(g, "scroll", function () {
                        delete d.chartPosition
                    })), g = g.parentElement;
                    u.hasTouch && (this.eventsToUnbind.push(q(c, "touchstart", this.onContainerTouchStart.bind(this), {passive: !1})), this.eventsToUnbind.push(q(c, "touchmove", this.onContainerTouchMove.bind(this), {passive: !1})),
                    a.unbindDocumentTouchEnd || (a.unbindDocumentTouchEnd = q(b, "touchend", this.onDocumentTouchEnd.bind(this), {passive: !1})))
                };
                a.prototype.setHoverChartIndex = function () {
                    var d = this.chart, c = u.charts[K(a.hoverChartIndex, -1)];
                    if (c && c !== d) c.pointer.onContainerMouseLeave({relatedTarget: !0});
                    c && c.mouseIsDown || (a.hoverChartIndex = d.index)
                };
                a.prototype.touch = function (a, c) {
                    var b = this.chart, d;
                    this.setHoverChartIndex();
                    if (1 === a.touches.length) if (a = this.normalize(a), (d = b.isInsidePlot(a.chartX - b.plotLeft, a.chartY - b.plotTop,
                        {visiblePlotOnly: !0})) && !b.openMenu) {
                        c && this.runPointActions(a);
                        if ("touchmove" === a.type) {
                            c = this.pinchDown;
                            var e = c[0] ? 4 <= Math.sqrt(Math.pow(c[0].chartX - a.chartX, 2) + Math.pow(c[0].chartY - a.chartY, 2)) : !1
                        }
                        K(e, !0) && this.pinch(a)
                    } else c && this.reset(); else 2 === a.touches.length && this.pinch(a)
                };
                a.prototype.touchSelect = function (a) {
                    return !(!this.chart.options.chart.zoomBySingleTouch || !a.touches || 1 !== a.touches.length)
                };
                a.prototype.zoomOption = function (a) {
                    var d = this.chart, b = d.options.chart;
                    d = d.inverted;
                    var c = b.zoomType ||
                        "";
                    /touch/.test(a.type) && (c = K(b.pinchType, c));
                    this.zoomX = a = /x/.test(c);
                    this.zoomY = b = /y/.test(c);
                    this.zoomHor = a && !d || b && d;
                    this.zoomVert = b && !d || a && d;
                    this.hasZoom = a || b
                };
                return a
            }();
            "";
            return a
        });
        L(a, "Core/MSPointer.js", [a["Core/Globals.js"], a["Core/Pointer.js"], a["Core/Utilities.js"]], function (a, u, E) {
            function v() {
                var a = [];
                a.item = function (a) {
                    return this[a]
                };
                e(m, function (c) {
                    a.push({pageX: c.pageX, pageY: c.pageY, target: c.target})
                });
                return a
            }

            function x(a, c, e, f) {
                var l = G[u.hoverChartIndex || NaN];
                "touch" !== a.pointerType &&
                a.pointerType !== a.MSPOINTER_TYPE_TOUCH || !l || (l = l.pointer, f(a), l[c]({
                    type: e,
                    target: a.currentTarget,
                    preventDefault: q,
                    touches: v()
                }))
            }

            var y = this && this.__extends || function () {
                    var a = function (c, e) {
                        a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, c) {
                            a.__proto__ = c
                        } || function (a, c) {
                            for (var e in c) c.hasOwnProperty(e) && (a[e] = c[e])
                        };
                        return a(c, e)
                    };
                    return function (c, e) {
                        function f() {
                            this.constructor = c
                        }

                        a(c, e);
                        c.prototype = null === e ? Object.create(e) : (f.prototype = e.prototype, new f)
                    }
                }(), G = a.charts, B =
                    a.doc, q = a.noop, h = a.win, f = E.addEvent, c = E.css, e = E.objectEach, t = E.removeEvent, m = {},
                w = !!h.PointerEvent;
            return function (e) {
                function l() {
                    return null !== e && e.apply(this, arguments) || this
                }

                y(l, e);
                l.isRequired = function () {
                    return !(a.hasTouch || !h.PointerEvent && !h.MSPointerEvent)
                };
                l.prototype.batchMSEvents = function (a) {
                    a(this.chart.container, w ? "pointerdown" : "MSPointerDown", this.onContainerPointerDown);
                    a(this.chart.container, w ? "pointermove" : "MSPointerMove", this.onContainerPointerMove);
                    a(B, w ? "pointerup" : "MSPointerUp",
                        this.onDocumentPointerUp)
                };
                l.prototype.destroy = function () {
                    this.batchMSEvents(t);
                    e.prototype.destroy.call(this)
                };
                l.prototype.init = function (a, f) {
                    e.prototype.init.call(this, a, f);
                    this.hasZoom && c(a.container, {"-ms-touch-action": "none", "touch-action": "none"})
                };
                l.prototype.onContainerPointerDown = function (a) {
                    x(a, "onContainerTouchStart", "touchstart", function (a) {
                        m[a.pointerId] = {pageX: a.pageX, pageY: a.pageY, target: a.currentTarget}
                    })
                };
                l.prototype.onContainerPointerMove = function (a) {
                    x(a, "onContainerTouchMove", "touchmove",
                        function (a) {
                            m[a.pointerId] = {pageX: a.pageX, pageY: a.pageY};
                            m[a.pointerId].target || (m[a.pointerId].target = a.currentTarget)
                        })
                };
                l.prototype.onDocumentPointerUp = function (a) {
                    x(a, "onDocumentTouchEnd", "touchend", function (a) {
                        delete m[a.pointerId]
                    })
                };
                l.prototype.setDOMEvents = function () {
                    e.prototype.setDOMEvents.call(this);
                    (this.hasZoom || this.followTouchMove) && this.batchMSEvents(f)
                };
                return l
            }(u)
        });
        L(a, "Core/Series/Point.js", [a["Core/Renderer/HTML/AST.js"], a["Core/Animation/AnimationUtilities.js"], a["Core/FormatUtilities.js"],
            a["Core/Globals.js"], a["Core/DefaultOptions.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y) {
            var v = u.animObject, B = E.format, q = x.defaultOptions, h = y.addEvent, f = y.defined, c = y.erase,
                e = y.extend, t = y.fireEvent, m = y.getNestedProperty, w = y.isArray, n = y.isFunction, l = y.isNumber,
                J = y.isObject, K = y.merge, A = y.objectEach, p = y.pick, d = y.syncTimeout, k = y.removeEvent,
                b = y.uniqueKey;
            "";
            u = function () {
                function g() {
                    this.colorIndex = this.category = void 0;
                    this.formatPrefix = "point";
                    this.id = void 0;
                    this.isNull = !1;
                    this.percentage = this.options =
                        this.name = void 0;
                    this.selected = !1;
                    this.total = this.series = void 0;
                    this.visible = !0;
                    this.x = void 0
                }

                g.prototype.animateBeforeDestroy = function () {
                    var a = this, b = {x: a.startXPos, opacity: 0}, d, c = a.getGraphicalProps();
                    c.singular.forEach(function (c) {
                        d = "dataLabel" === c;
                        a[c] = a[c].animate(d ? {x: a[c].startXPos, y: a[c].startYPos, opacity: 0} : b)
                    });
                    c.plural.forEach(function (b) {
                        a[b].forEach(function (b) {
                            b.element && b.animate(e({x: a.startXPos}, b.startYPos ? {
                                x: b.startXPos,
                                y: b.startYPos
                            } : {}))
                        })
                    })
                };
                g.prototype.applyOptions = function (a,
                                                     b) {
                    var d = this.series, c = d.options.pointValKey || d.pointValKey;
                    a = g.prototype.optionsToObject.call(this, a);
                    e(this, a);
                    this.options = this.options ? e(this.options, a) : a;
                    a.group && delete this.group;
                    a.dataLabels && delete this.dataLabels;
                    c && (this.y = g.prototype.getNestedProperty.call(this, c));
                    this.formatPrefix = (this.isNull = p(this.isValid && !this.isValid(), null === this.x || !l(this.y))) ? "null" : "point";
                    this.selected && (this.state = "select");
                    "name" in this && "undefined" === typeof b && d.xAxis && d.xAxis.hasNames && (this.x = d.xAxis.nameToX(this));
                    "undefined" === typeof this.x && d && (this.x = "undefined" === typeof b ? d.autoIncrement(this) : b);
                    return this
                };
                g.prototype.destroy = function () {
                    function a() {
                        if (b.graphic || b.dataLabel || b.dataLabels) k(b), b.destroyElements();
                        for (h in b) b[h] = null
                    }

                    var b = this, g = b.series, e = g.chart;
                    g = g.options.dataSorting;
                    var f = e.hoverPoints, l = v(b.series.chart.renderer.globalAnimation), h;
                    b.legendItem && e.legend.destroyItem(b);
                    f && (b.setState(), c(f, b), f.length || (e.hoverPoints = null));
                    if (b === e.hoverPoint) b.onMouseOut();
                    g && g.enabled ? (this.animateBeforeDestroy(),
                        d(a, l.duration)) : a();
                    e.pointCount--
                };
                g.prototype.destroyElements = function (a) {
                    var b = this;
                    a = b.getGraphicalProps(a);
                    a.singular.forEach(function (a) {
                        b[a] = b[a].destroy()
                    });
                    a.plural.forEach(function (a) {
                        b[a].forEach(function (a) {
                            a.element && a.destroy()
                        });
                        delete b[a]
                    })
                };
                g.prototype.firePointEvent = function (a, b, d) {
                    var c = this, g = this.series.options;
                    (g.point.events[a] || c.options && c.options.events && c.options.events[a]) && c.importEvents();
                    "click" === a && g.allowPointSelect && (d = function (a) {
                        c.select && c.select(null, a.ctrlKey ||
                            a.metaKey || a.shiftKey)
                    });
                    t(c, a, b, d)
                };
                g.prototype.getClassName = function () {
                    return "highcharts-point" + (this.selected ? " highcharts-point-select" : "") + (this.negative ? " highcharts-negative" : "") + (this.isNull ? " highcharts-null-point" : "") + ("undefined" !== typeof this.colorIndex ? " highcharts-color-" + this.colorIndex : "") + (this.options.className ? " " + this.options.className : "") + (this.zone && this.zone.className ? " " + this.zone.className.replace("highcharts-negative", "") : "")
                };
                g.prototype.getGraphicalProps = function (a) {
                    var b =
                        this, d = [], c, g = {singular: [], plural: []};
                    a = a || {graphic: 1, dataLabel: 1};
                    a.graphic && d.push("graphic", "upperGraphic", "shadowGroup");
                    a.dataLabel && d.push("dataLabel", "dataLabelUpper", "connector");
                    for (c = d.length; c--;) {
                        var e = d[c];
                        b[e] && g.singular.push(e)
                    }
                    ["dataLabel", "connector"].forEach(function (d) {
                        var c = d + "s";
                        a[d] && b[c] && g.plural.push(c)
                    });
                    return g
                };
                g.prototype.getLabelConfig = function () {
                    return {
                        x: this.category,
                        y: this.y,
                        color: this.color,
                        colorIndex: this.colorIndex,
                        key: this.name || this.category,
                        series: this.series,
                        point: this,
                        percentage: this.percentage,
                        total: this.total || this.stackTotal
                    }
                };
                g.prototype.getNestedProperty = function (a) {
                    if (a) return 0 === a.indexOf("custom.") ? m(a, this.options) : this[a]
                };
                g.prototype.getZone = function () {
                    var a = this.series, b = a.zones;
                    a = a.zoneAxis || "y";
                    var d = 0, c;
                    for (c = b[d]; this[a] >= c.value;) c = b[++d];
                    this.nonZonedColor || (this.nonZonedColor = this.color);
                    this.color = c && c.color && !this.options.color ? c.color : this.nonZonedColor;
                    return c
                };
                g.prototype.hasNewShapeType = function () {
                    return (this.graphic && (this.graphic.symbolName ||
                        this.graphic.element.nodeName)) !== this.shapeType
                };
                g.prototype.init = function (a, d, c) {
                    this.series = a;
                    this.applyOptions(d, c);
                    this.id = f(this.id) ? this.id : b();
                    this.resolveColor();
                    a.chart.pointCount++;
                    t(this, "afterInit");
                    return this
                };
                g.prototype.optionsToObject = function (a) {
                    var b = {}, d = this.series, c = d.options.keys, e = c || d.pointArrayMap || ["y"], f = e.length,
                        k = 0, h = 0;
                    if (l(a) || null === a) b[e[0]] = a; else if (w(a)) for (!c && a.length > f && (d = typeof a[0], "string" === d ? b.name = a[0] : "number" === d && (b.x = a[0]), k++); h < f;) c && "undefined" ===
                    typeof a[k] || (0 < e[h].indexOf(".") ? g.prototype.setNestedProperty(b, a[k], e[h]) : b[e[h]] = a[k]), k++, h++; else "object" === typeof a && (b = a, a.dataLabels && (d._hasPointLabels = !0), a.marker && (d._hasPointMarkers = !0));
                    return b
                };
                g.prototype.resolveColor = function () {
                    var a = this.series;
                    var b = a.chart.options.chart.colorCount;
                    var d = a.chart.styledMode;
                    delete this.nonZonedColor;
                    if (a.options.colorByPoint) {
                        if (!d) {
                            b = a.options.colors || a.chart.options.colors;
                            var c = b[a.colorCounter];
                            b = b.length
                        }
                        d = a.colorCounter;
                        a.colorCounter++;
                        a.colorCounter === b && (a.colorCounter = 0)
                    } else d || (c = a.color), d = a.colorIndex;
                    this.colorIndex = p(this.options.colorIndex, d);
                    this.color = p(this.options.color, c)
                };
                g.prototype.setNestedProperty = function (a, b, d) {
                    d.split(".").reduce(function (a, d, c, g) {
                        a[d] = g.length - 1 === c ? b : J(a[d], !0) ? a[d] : {};
                        return a[d]
                    }, a);
                    return a
                };
                g.prototype.tooltipFormatter = function (a) {
                    var b = this.series, d = b.tooltipOptions, c = p(d.valueDecimals, ""), g = d.valuePrefix || "",
                        e = d.valueSuffix || "";
                    b.chart.styledMode && (a = b.chart.tooltip.styledModeFormat(a));
                    (b.pointArrayMap || ["y"]).forEach(function (b) {
                        b = "{point." + b;
                        if (g || e) a = a.replace(RegExp(b + "}", "g"), g + b + "}" + e);
                        a = a.replace(RegExp(b + "}", "g"), b + ":,." + c + "f}")
                    });
                    return B(a, {point: this, series: this.series}, b.chart)
                };
                g.prototype.update = function (a, b, d, c) {
                    function g() {
                        e.applyOptions(a);
                        var c = k && e.hasDummyGraphic;
                        c = null === e.y ? !c : c;
                        k && c && (e.graphic = k.destroy(), delete e.hasDummyGraphic);
                        J(a, !0) && (k && k.element && a && a.marker && "undefined" !== typeof a.marker.symbol && (e.graphic = k.destroy()), a && a.dataLabels && e.dataLabel &&
                        (e.dataLabel = e.dataLabel.destroy()), e.connector && (e.connector = e.connector.destroy()));
                        l = e.index;
                        f.updateParallelArrays(e, l);
                        r.data[l] = J(r.data[l], !0) || J(a, !0) ? e.options : p(a, r.data[l]);
                        f.isDirty = f.isDirtyData = !0;
                        !f.fixedBox && f.hasCartesianSeries && (h.isDirtyBox = !0);
                        "point" === r.legendType && (h.isDirtyLegend = !0);
                        b && h.redraw(d)
                    }

                    var e = this, f = e.series, k = e.graphic, l, h = f.chart, r = f.options;
                    b = p(b, !0);
                    !1 === c ? g() : e.firePointEvent("update", {options: a}, g)
                };
                g.prototype.remove = function (a, b) {
                    this.series.removePoint(this.series.data.indexOf(this),
                        a, b)
                };
                g.prototype.select = function (a, b) {
                    var d = this, c = d.series, g = c.chart;
                    this.selectedStaging = a = p(a, !d.selected);
                    d.firePointEvent(a ? "select" : "unselect", {accumulate: b}, function () {
                        d.selected = d.options.selected = a;
                        c.options.data[c.data.indexOf(d)] = d.options;
                        d.setState(a && "select");
                        b || g.getSelectedPoints().forEach(function (a) {
                            var b = a.series;
                            a.selected && a !== d && (a.selected = a.options.selected = !1, b.options.data[b.data.indexOf(a)] = a.options, a.setState(g.hoverPoints && b.options.inactiveOtherPoints ? "inactive" : ""),
                                a.firePointEvent("unselect"))
                        })
                    });
                    delete this.selectedStaging
                };
                g.prototype.onMouseOver = function (a) {
                    var b = this.series.chart, d = b.pointer;
                    a = a ? d.normalize(a) : d.getChartCoordinatesFromPoint(this, b.inverted);
                    d.runPointActions(a, this)
                };
                g.prototype.onMouseOut = function () {
                    var a = this.series.chart;
                    this.firePointEvent("mouseOut");
                    this.series.options.inactiveOtherPoints || (a.hoverPoints || []).forEach(function (a) {
                        a.setState()
                    });
                    a.hoverPoints = a.hoverPoint = null
                };
                g.prototype.importEvents = function () {
                    if (!this.hasImportedEvents) {
                        var a =
                            this, b = K(a.series.options.point, a.options).events;
                        a.events = b;
                        A(b, function (b, d) {
                            n(b) && h(a, d, b)
                        });
                        this.hasImportedEvents = !0
                    }
                };
                g.prototype.setState = function (b, d) {
                    var c = this.series, g = this.state, f = c.options.states[b || "normal"] || {},
                        k = q.plotOptions[c.type].marker && c.options.marker, h = k && !1 === k.enabled,
                        r = k && k.states && k.states[b || "normal"] || {}, m = !1 === r.enabled,
                        n = c.stateMarkerGraphic, F = this.marker || {}, w = c.chart, v = c.halo, A,
                        J = k && c.markerAttribs;
                    b = b || "";
                    if (!(b === this.state && !d || this.selected && "select" !== b || !1 ===
                        f.enabled || b && (m || h && !1 === r.enabled) || b && F.states && F.states[b] && !1 === F.states[b].enabled)) {
                        this.state = b;
                        J && (A = c.markerAttribs(this, b));
                        if (this.graphic && !this.hasDummyGraphic) {
                            g && this.graphic.removeClass("highcharts-point-" + g);
                            b && this.graphic.addClass("highcharts-point-" + b);
                            if (!w.styledMode) {
                                var I = c.pointAttribs(this, b);
                                var N = p(w.options.chart.animation, f.animation);
                                c.options.inactiveOtherPoints && l(I.opacity) && ((this.dataLabels || []).forEach(function (a) {
                                    a && a.animate({opacity: I.opacity}, N)
                                }), this.connector &&
                                this.connector.animate({opacity: I.opacity}, N));
                                this.graphic.animate(I, N)
                            }
                            A && this.graphic.animate(A, p(w.options.chart.animation, r.animation, k.animation));
                            n && n.hide()
                        } else {
                            if (b && r) {
                                g = F.symbol || c.symbol;
                                n && n.currentSymbol !== g && (n = n.destroy());
                                if (A) if (n) n[d ? "animate" : "attr"]({
                                    x: A.x,
                                    y: A.y
                                }); else g && (c.stateMarkerGraphic = n = w.renderer.symbol(g, A.x, A.y, A.width, A.height).add(c.markerGroup), n.currentSymbol = g);
                                !w.styledMode && n && n.attr(c.pointAttribs(this, b))
                            }
                            n && (n[b && this.isInside ? "show" : "hide"](), n.element.point =
                                this)
                        }
                        f = f.halo;
                        A = (n = this.graphic || n) && n.visibility || "inherit";
                        f && f.size && n && "hidden" !== A && !this.isCluster ? (v || (c.halo = v = w.renderer.path().add(n.parentGroup)), v.show()[d ? "animate" : "attr"]({d: this.haloPath(f.size)}), v.attr({
                            "class": "highcharts-halo highcharts-color-" + p(this.colorIndex, c.colorIndex) + (this.className ? " " + this.className : ""),
                            visibility: A,
                            zIndex: -1
                        }), v.point = this, w.styledMode || v.attr(e({
                            fill: this.color || c.color,
                            "fill-opacity": f.opacity
                        }, a.filterUserAttributes(f.attributes || {})))) : v && v.point &&
                            v.point.haloPath && v.animate({d: v.point.haloPath(0)}, null, v.hide);
                        t(this, "afterSetState", {state: b})
                    }
                };
                g.prototype.haloPath = function (a) {
                    return this.series.chart.renderer.symbols.circle(Math.floor(this.plotX) - a, this.plotY - a, 2 * a, 2 * a)
                };
                return g
            }();
            return H.Point = u
        });
        L(a, "Core/Legend.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/FormatUtilities.js"], a["Core/Globals.js"], a["Core/Series/Point.js"], a["Core/Utilities.js"]], function (a, u, E, H, x) {
            var v = a.animObject, G = a.setAnimation, B = u.format;
            a = E.isFirefox;
            var q = E.marginNames;
            u = E.win;
            var h = x.addEvent, f = x.createElement, c = x.css, e = x.defined, t = x.discardElement, m = x.find,
                w = x.fireEvent, n = x.isNumber, l = x.merge, J = x.pick, K = x.relativeLength, A = x.stableSort,
                p = x.syncTimeout;
            x = x.wrap;
            var d = function () {
                function a(a, d) {
                    this.allItems = [];
                    this.contentGroup = this.box = void 0;
                    this.display = !1;
                    this.group = void 0;
                    this.offsetWidth = this.maxLegendWidth = this.maxItemWidth = this.legendWidth = this.legendHeight = this.lastLineHeight = this.lastItemY = this.itemY = this.itemX = this.itemMarginTop = this.itemMarginBottom =
                        this.itemHeight = this.initialItemY = 0;
                    this.options = {};
                    this.padding = 0;
                    this.pages = [];
                    this.proximate = !1;
                    this.scrollGroup = void 0;
                    this.widthOption = this.totalItemWidth = this.titleHeight = this.symbolWidth = this.symbolHeight = 0;
                    this.chart = a;
                    this.init(a, d)
                }

                a.prototype.init = function (a, d) {
                    this.chart = a;
                    this.setOptions(d);
                    d.enabled && (this.render(), h(this.chart, "endResize", function () {
                        this.legend.positionCheckboxes()
                    }), this.proximate ? this.unchartrender = h(this.chart, "render", function () {
                        this.legend.proximatePositions();
                        this.legend.positionItems()
                    }) : this.unchartrender && this.unchartrender())
                };
                a.prototype.setOptions = function (a) {
                    var b = J(a.padding, 8);
                    this.options = a;
                    this.chart.styledMode || (this.itemStyle = a.itemStyle, this.itemHiddenStyle = l(this.itemStyle, a.itemHiddenStyle));
                    this.itemMarginTop = a.itemMarginTop || 0;
                    this.itemMarginBottom = a.itemMarginBottom || 0;
                    this.padding = b;
                    this.initialItemY = b - 5;
                    this.symbolWidth = J(a.symbolWidth, 16);
                    this.pages = [];
                    this.proximate = "proximate" === a.layout && !this.chart.inverted;
                    this.baseline = void 0
                };
                a.prototype.update = function (a, d) {
                    var b = this.chart;
                    this.setOptions(l(!0, this.options, a));
                    this.destroy();
                    b.isDirtyLegend = b.isDirtyBox = !0;
                    J(d, !0) && b.redraw();
                    w(this, "afterUpdate")
                };
                a.prototype.colorizeItem = function (a, d) {
                    a.legendGroup[d ? "removeClass" : "addClass"]("highcharts-legend-item-hidden");
                    if (!this.chart.styledMode) {
                        var b = this.options, c = a.legendItem, g = a.legendLine, e = a.legendSymbol,
                            f = this.itemHiddenStyle.color;
                        b = d ? b.itemStyle.color : f;
                        var k = d ? a.color || f : f, l = a.options && a.options.marker, h = {fill: k};
                        c &&
                        c.css({fill: b, color: b});
                        g && g.attr({stroke: k});
                        e && (l && e.isMarker && (h = a.pointAttribs(), d || (h.stroke = h.fill = f)), e.attr(h))
                    }
                    w(this, "afterColorizeItem", {item: a, visible: d})
                };
                a.prototype.positionItems = function () {
                    this.allItems.forEach(this.positionItem, this);
                    this.chart.isResizing || this.positionCheckboxes()
                };
                a.prototype.positionItem = function (a) {
                    var b = this, d = this.options, c = d.symbolPadding, f = !d.rtl, k = a._legendItemPos;
                    d = k[0];
                    k = k[1];
                    var l = a.checkbox, h = a.legendGroup;
                    h && h.element && (c = {
                        translateX: f ? d : this.legendWidth -
                            d - 2 * c - 4, translateY: k
                    }, f = function () {
                        w(b, "afterPositionItem", {item: a})
                    }, e(h.translateY) ? h.animate(c, void 0, f) : (h.attr(c), f()));
                    l && (l.x = d, l.y = k)
                };
                a.prototype.destroyItem = function (a) {
                    var b = a.checkbox;
                    ["legendItem", "legendLine", "legendSymbol", "legendGroup"].forEach(function (b) {
                        a[b] && (a[b] = a[b].destroy())
                    });
                    b && t(a.checkbox)
                };
                a.prototype.destroy = function () {
                    function a(a) {
                        this[a] && (this[a] = this[a].destroy())
                    }

                    this.getAllItems().forEach(function (b) {
                        ["legendItem", "legendGroup"].forEach(a, b)
                    });
                    "clipRect up down pager nav box title group".split(" ").forEach(a,
                        this);
                    this.display = null
                };
                a.prototype.positionCheckboxes = function () {
                    var a = this.group && this.group.alignAttr, d = this.clipHeight || this.legendHeight,
                        e = this.titleHeight;
                    if (a) {
                        var f = a.translateY;
                        this.allItems.forEach(function (b) {
                            var g = b.checkbox;
                            if (g) {
                                var k = f + e + g.y + (this.scrollOffset || 0) + 3;
                                c(g, {
                                    left: a.translateX + b.checkboxOffset + g.x - 20 + "px",
                                    top: k + "px",
                                    display: this.proximate || k > f - 6 && k < f + d - 6 ? "" : "none"
                                })
                            }
                        }, this)
                    }
                };
                a.prototype.renderTitle = function () {
                    var a = this.options, d = this.padding, c = a.title, e = 0;
                    c.text && (this.title ||
                    (this.title = this.chart.renderer.label(c.text, d - 3, d - 4, null, null, null, a.useHTML, null, "legend-title").attr({zIndex: 1}), this.chart.styledMode || this.title.css(c.style), this.title.add(this.group)), c.width || this.title.css({width: this.maxLegendWidth + "px"}), a = this.title.getBBox(), e = a.height, this.offsetWidth = a.width, this.contentGroup.attr({translateY: e}));
                    this.titleHeight = e
                };
                a.prototype.setText = function (a) {
                    var b = this.options;
                    a.legendItem.attr({text: b.labelFormat ? B(b.labelFormat, a, this.chart) : b.labelFormatter.call(a)})
                };
                a.prototype.renderItem = function (a) {
                    var b = this.chart, d = b.renderer, c = this.options, e = this.symbolWidth,
                        f = c.symbolPadding || 0, k = this.itemStyle, h = this.itemHiddenStyle,
                        p = "horizontal" === c.layout ? J(c.itemDistance, 20) : 0, m = !c.rtl, t = a.legendItem,
                        n = !a.series, q = !n && a.series.drawLegendSymbol ? a.series : a, w = q.options,
                        v = this.createCheckboxForItem && w && w.showCheckbox;
                    w = e + f + p + (v ? 20 : 0);
                    var A = c.useHTML, u = a.options.className;
                    t || (a.legendGroup = d.g("legend-item").addClass("highcharts-" + q.type + "-series highcharts-color-" + a.colorIndex +
                        (u ? " " + u : "") + (n ? " highcharts-series-" + a.index : "")).attr({zIndex: 1}).add(this.scrollGroup), a.legendItem = t = d.text("", m ? e + f : -f, this.baseline || 0, A), b.styledMode || t.css(l(a.visible ? k : h)), t.attr({
                        align: m ? "left" : "right",
                        zIndex: 2
                    }).add(a.legendGroup), this.baseline || (this.fontMetrics = d.fontMetrics(b.styledMode ? 12 : k.fontSize, t), this.baseline = this.fontMetrics.f + 3 + this.itemMarginTop, t.attr("y", this.baseline), this.symbolHeight = c.symbolHeight || this.fontMetrics.f, c.squareSymbol && (this.symbolWidth = J(c.symbolWidth,
                        Math.max(this.symbolHeight, 16)), w = this.symbolWidth + f + p + (v ? 20 : 0), m && t.attr("x", this.symbolWidth + f))), q.drawLegendSymbol(this, a), this.setItemEvents && this.setItemEvents(a, t, A));
                    v && !a.checkbox && this.createCheckboxForItem && this.createCheckboxForItem(a);
                    this.colorizeItem(a, a.visible);
                    !b.styledMode && k.width || t.css({width: (c.itemWidth || this.widthOption || b.spacingBox.width) - w + "px"});
                    this.setText(a);
                    b = t.getBBox();
                    a.itemWidth = a.checkboxOffset = c.itemWidth || a.legendItemWidth || b.width + w;
                    this.maxItemWidth = Math.max(this.maxItemWidth,
                        a.itemWidth);
                    this.totalItemWidth += a.itemWidth;
                    this.itemHeight = a.itemHeight = Math.round(a.legendItemHeight || b.height || this.symbolHeight)
                };
                a.prototype.layoutItem = function (a) {
                    var b = this.options, d = this.padding, c = "horizontal" === b.layout, e = a.itemHeight,
                        f = this.itemMarginBottom, k = this.itemMarginTop, l = c ? J(b.itemDistance, 20) : 0,
                        h = this.maxLegendWidth;
                    b = b.alignColumns && this.totalItemWidth > h ? this.maxItemWidth : a.itemWidth;
                    c && this.itemX - d + b > h && (this.itemX = d, this.lastLineHeight && (this.itemY += k + this.lastLineHeight +
                        f), this.lastLineHeight = 0);
                    this.lastItemY = k + this.itemY + f;
                    this.lastLineHeight = Math.max(e, this.lastLineHeight);
                    a._legendItemPos = [this.itemX, this.itemY];
                    c ? this.itemX += b : (this.itemY += k + e + f, this.lastLineHeight = e);
                    this.offsetWidth = this.widthOption || Math.max((c ? this.itemX - d - (a.checkbox ? 0 : l) : b) + d, this.offsetWidth)
                };
                a.prototype.getAllItems = function () {
                    var a = [];
                    this.chart.series.forEach(function (b) {
                        var d = b && b.options;
                        b && J(d.showInLegend, e(d.linkedTo) ? !1 : void 0, !0) && (a = a.concat(b.legendItems || ("point" === d.legendType ?
                            b.data : b)))
                    });
                    w(this, "afterGetAllItems", {allItems: a});
                    return a
                };
                a.prototype.getAlignment = function () {
                    var a = this.options;
                    return this.proximate ? a.align.charAt(0) + "tv" : a.floating ? "" : a.align.charAt(0) + a.verticalAlign.charAt(0) + a.layout.charAt(0)
                };
                a.prototype.adjustMargins = function (a, d) {
                    var b = this.chart, c = this.options, g = this.getAlignment();
                    g && [/(lth|ct|rth)/, /(rtv|rm|rbv)/, /(rbh|cb|lbh)/, /(lbv|lm|ltv)/].forEach(function (f, k) {
                        f.test(g) && !e(a[k]) && (b[q[k]] = Math.max(b[q[k]], b.legend[(k + 1) % 2 ? "legendHeight" :
                            "legendWidth"] + [1, -1, -1, 1][k] * c[k % 2 ? "x" : "y"] + J(c.margin, 12) + d[k] + (b.titleOffset[k] || 0)))
                    })
                };
                a.prototype.proximatePositions = function () {
                    var a = this.chart, d = [], c = "left" === this.options.align;
                    this.allItems.forEach(function (b) {
                        var e;
                        var g = c;
                        if (b.yAxis) {
                            b.xAxis.options.reversed && (g = !g);
                            b.points && (e = m(g ? b.points : b.points.slice(0).reverse(), function (a) {
                                return n(a.plotY)
                            }));
                            g = this.itemMarginTop + b.legendItem.getBBox().height + this.itemMarginBottom;
                            var f = b.yAxis.top - a.plotTop;
                            b.visible ? (e = e ? e.plotY : b.yAxis.height,
                                e += f - .3 * g) : e = f + b.yAxis.height;
                            d.push({target: e, size: g, item: b})
                        }
                    }, this);
                    E.distribute(d, a.plotHeight);
                    d.forEach(function (b) {
                        b.item._legendItemPos[1] = a.plotTop - a.spacing[0] + b.pos
                    })
                };
                a.prototype.render = function () {
                    var a = this.chart, d = a.renderer, c = this.group, e = this.box, f = this.options,
                        k = this.padding;
                    this.itemX = k;
                    this.itemY = this.initialItemY;
                    this.lastItemY = this.offsetWidth = 0;
                    this.widthOption = K(f.width, a.spacingBox.width - k);
                    var l = a.spacingBox.width - 2 * k - f.x;
                    -1 < ["rm", "lm"].indexOf(this.getAlignment().substring(0,
                        2)) && (l /= 2);
                    this.maxLegendWidth = this.widthOption || l;
                    c || (this.group = c = d.g("legend").addClass(f.className || "").attr({zIndex: 7}).add(), this.contentGroup = d.g().attr({zIndex: 1}).add(c), this.scrollGroup = d.g().add(this.contentGroup));
                    this.renderTitle();
                    var h = this.getAllItems();
                    A(h, function (a, b) {
                        return (a.options && a.options.legendIndex || 0) - (b.options && b.options.legendIndex || 0)
                    });
                    f.reversed && h.reverse();
                    this.allItems = h;
                    this.display = l = !!h.length;
                    this.itemHeight = this.totalItemWidth = this.maxItemWidth = this.lastLineHeight =
                        0;
                    h.forEach(this.renderItem, this);
                    h.forEach(this.layoutItem, this);
                    h = (this.widthOption || this.offsetWidth) + k;
                    var m = this.lastItemY + this.lastLineHeight + this.titleHeight;
                    m = this.handleOverflow(m);
                    m += k;
                    e || (this.box = e = d.rect().addClass("highcharts-legend-box").attr({r: f.borderRadius}).add(c), e.isNew = !0);
                    a.styledMode || e.attr({
                        stroke: f.borderColor,
                        "stroke-width": f.borderWidth || 0,
                        fill: f.backgroundColor || "none"
                    }).shadow(f.shadow);
                    0 < h && 0 < m && (e[e.isNew ? "attr" : "animate"](e.crisp.call({}, {
                            x: 0,
                            y: 0,
                            width: h,
                            height: m
                        },
                        e.strokeWidth())), e.isNew = !1);
                    e[l ? "show" : "hide"]();
                    a.styledMode && "none" === c.getStyle("display") && (h = m = 0);
                    this.legendWidth = h;
                    this.legendHeight = m;
                    l && this.align();
                    this.proximate || this.positionItems();
                    w(this, "afterRender")
                };
                a.prototype.align = function (a) {
                    void 0 === a && (a = this.chart.spacingBox);
                    var b = this.chart, d = this.options, c = a.y;
                    /(lth|ct|rth)/.test(this.getAlignment()) && 0 < b.titleOffset[0] ? c += b.titleOffset[0] : /(lbh|cb|rbh)/.test(this.getAlignment()) && 0 < b.titleOffset[2] && (c -= b.titleOffset[2]);
                    c !== a.y && (a =
                        l(a, {y: c}));
                    this.group.align(l(d, {
                        width: this.legendWidth,
                        height: this.legendHeight,
                        verticalAlign: this.proximate ? "top" : d.verticalAlign
                    }), !0, a)
                };
                a.prototype.handleOverflow = function (a) {
                    var b = this, d = this.chart, c = d.renderer, e = this.options, f = e.y, k = this.padding;
                    f = d.spacingBox.height + ("top" === e.verticalAlign ? -f : f) - k;
                    var l = e.maxHeight, h, m = this.clipRect, p = e.navigation, t = J(p.animation, !0),
                        n = p.arrowSize || 12, w = this.nav, q = this.pages, v, A = this.allItems, I = function (a) {
                            "number" === typeof a ? m.attr({height: a}) : m && (b.clipRect =
                                m.destroy(), b.contentGroup.clip());
                            b.contentGroup.div && (b.contentGroup.div.style.clip = a ? "rect(" + k + "px,9999px," + (k + a) + "px,0)" : "auto")
                        }, N = function (a) {
                            b[a] = c.circle(0, 0, 1.3 * n).translate(n / 2, n / 2).add(w);
                            d.styledMode || b[a].attr("fill", "rgba(0,0,0,0.0001)");
                            return b[a]
                        };
                    "horizontal" !== e.layout || "middle" === e.verticalAlign || e.floating || (f /= 2);
                    l && (f = Math.min(f, l));
                    q.length = 0;
                    a && 0 < f && a > f && !1 !== p.enabled ? (this.clipHeight = h = Math.max(f - 20 - this.titleHeight - k, 0), this.currentPage = J(this.currentPage, 1), this.fullHeight =
                        a, A.forEach(function (a, b) {
                        var d = a._legendItemPos[1], c = Math.round(a.legendItem.getBBox().height), e = q.length;
                        if (!e || d - q[e - 1] > h && (v || d) !== q[e - 1]) q.push(v || d), e++;
                        a.pageIx = e - 1;
                        v && (A[b - 1].pageIx = e - 1);
                        b === A.length - 1 && d + c - q[e - 1] > h && d !== v && (q.push(d), a.pageIx = e);
                        d !== v && (v = d)
                    }), m || (m = b.clipRect = c.clipRect(0, k, 9999, 0), b.contentGroup.clip(m)), I(h), w || (this.nav = w = c.g().attr({zIndex: 1}).add(this.group), this.up = c.symbol("triangle", 0, 0, n, n).add(w), N("upTracker").on("click", function () {
                        b.scroll(-1, t)
                    }), this.pager =
                        c.text("", 15, 10).addClass("highcharts-legend-navigation"), d.styledMode || this.pager.css(p.style), this.pager.add(w), this.down = c.symbol("triangle-down", 0, 0, n, n).add(w), N("downTracker").on("click", function () {
                        b.scroll(1, t)
                    })), b.scroll(0), a = f) : w && (I(), this.nav = w.destroy(), this.scrollGroup.attr({translateY: 1}), this.clipHeight = 0);
                    return a
                };
                a.prototype.scroll = function (a, d) {
                    var b = this, c = this.chart, e = this.pages, g = e.length, f = this.currentPage + a;
                    a = this.clipHeight;
                    var k = this.options.navigation, l = this.pager, h = this.padding;
                    f > g && (f = g);
                    0 < f && ("undefined" !== typeof d && G(d, c), this.nav.attr({
                        translateX: h,
                        translateY: a + this.padding + 7 + this.titleHeight,
                        visibility: "visible"
                    }), [this.up, this.upTracker].forEach(function (a) {
                        a.attr({"class": 1 === f ? "highcharts-legend-nav-inactive" : "highcharts-legend-nav-active"})
                    }), l.attr({text: f + "/" + g}), [this.down, this.downTracker].forEach(function (a) {
                        a.attr({
                            x: 18 + this.pager.getBBox().width,
                            "class": f === g ? "highcharts-legend-nav-inactive" : "highcharts-legend-nav-active"
                        })
                    }, this), c.styledMode || (this.up.attr({
                        fill: 1 ===
                        f ? k.inactiveColor : k.activeColor
                    }), this.upTracker.css({cursor: 1 === f ? "default" : "pointer"}), this.down.attr({fill: f === g ? k.inactiveColor : k.activeColor}), this.downTracker.css({cursor: f === g ? "default" : "pointer"})), this.scrollOffset = -e[f - 1] + this.initialItemY, this.scrollGroup.animate({translateY: this.scrollOffset}), this.currentPage = f, this.positionCheckboxes(), d = v(J(d, c.renderer.globalAnimation, !0)), p(function () {
                        w(b, "afterScroll", {currentPage: f})
                    }, d.duration))
                };
                a.prototype.setItemEvents = function (a, d, c) {
                    var b =
                            this, e = b.chart.renderer.boxWrapper, g = a instanceof H,
                        f = "highcharts-legend-" + (g ? "point" : "series") + "-active", k = b.chart.styledMode;
                    (c ? [d, a.legendSymbol] : [a.legendGroup]).forEach(function (c) {
                        if (c) c.on("mouseover", function () {
                            a.visible && b.allItems.forEach(function (b) {
                                a !== b && b.setState("inactive", !g)
                            });
                            a.setState("hover");
                            a.visible && e.addClass(f);
                            k || d.css(b.options.itemHoverStyle)
                        }).on("mouseout", function () {
                            b.chart.styledMode || d.css(l(a.visible ? b.itemStyle : b.itemHiddenStyle));
                            b.allItems.forEach(function (b) {
                                a !==
                                b && b.setState("", !g)
                            });
                            e.removeClass(f);
                            a.setState()
                        }).on("click", function (d) {
                            var c = function () {
                                a.setVisible && a.setVisible();
                                b.allItems.forEach(function (b) {
                                    a !== b && b.setState(a.visible ? "inactive" : "", !g)
                                })
                            };
                            e.removeClass(f);
                            d = {browserEvent: d};
                            a.firePointEvent ? a.firePointEvent("legendItemClick", d, c) : w(a, "legendItemClick", d, c)
                        })
                    })
                };
                a.prototype.createCheckboxForItem = function (a) {
                    a.checkbox = f("input", {
                            type: "checkbox",
                            className: "highcharts-legend-checkbox",
                            checked: a.selected,
                            defaultChecked: a.selected
                        }, this.options.itemCheckboxStyle,
                        this.chart.container);
                    h(a.checkbox, "click", function (b) {
                        w(a.series || a, "checkboxClick", {checked: b.target.checked, item: a}, function () {
                            a.select()
                        })
                    })
                };
                return a
            }();
            (/Trident\/7\.0/.test(u.navigator && u.navigator.userAgent) || a) && x(d.prototype, "positionItem", function (a, b) {
                var d = this, c = function () {
                    b._legendItemPos && a.call(d, b)
                };
                c();
                d.bubbleLegend || setTimeout(c)
            });
            E.Legend = d;
            return E.Legend
        });
        L(a, "Core/Series/SeriesRegistry.js", [a["Core/Globals.js"], a["Core/DefaultOptions.js"], a["Core/Series/Point.js"], a["Core/Utilities.js"]],
            function (a, u, E, H) {
                var v = u.defaultOptions, y = H.error, G = H.extendClass, B = H.merge, q;
                (function (h) {
                    function f(a, e) {
                        var c = v.plotOptions || {}, f = e.defaultOptions;
                        e.prototype.pointClass || (e.prototype.pointClass = E);
                        e.prototype.type = a;
                        f && (c[a] = f);
                        h.seriesTypes[a] = e
                    }

                    h.seriesTypes = a.seriesTypes;
                    h.getSeries = function (a, e) {
                        void 0 === e && (e = {});
                        var c = a.options.chart;
                        c = e.type || c.type || c.defaultSeriesType || "";
                        var f = h.seriesTypes[c];
                        h || y(17, !0, a, {missingModuleFor: c});
                        c = new f;
                        "function" === typeof c.init && c.init(a, e);
                        return c
                    };
                    h.registerSeriesType = f;
                    h.seriesType = function (a, e, t, m, w) {
                        var c = v.plotOptions || {};
                        e = e || "";
                        c[a] = B(c[e], t);
                        f(a, G(h.seriesTypes[e] || function () {
                        }, m));
                        h.seriesTypes[a].prototype.type = a;
                        w && (h.seriesTypes[a].prototype.pointClass = G(E, w));
                        return h.seriesTypes[a]
                    }
                })(q || (q = {}));
                a.seriesType = q.seriesType;
                return q
            });
        L(a, "Core/Chart/Chart.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/Axis/Axis.js"], a["Core/FormatUtilities.js"], a["Core/Foundation.js"], a["Core/Globals.js"], a["Core/Legend.js"], a["Core/MSPointer.js"],
            a["Core/DefaultOptions.js"], a["Core/Color/Palette.js"], a["Core/Pointer.js"], a["Core/Renderer/RendererRegistry.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Time.js"], a["Core/Utilities.js"], a["Core/Renderer/HTML/AST.js"]], function (a, u, E, H, x, y, G, B, q, h, f, c, e, t, m) {
            var w = a.animate, n = a.animObject, l = a.setAnimation, v = E.numberFormat, K = H.registerEventOptions,
                A = x.charts, p = x.doc, d = x.marginNames, k = x.win, b = B.defaultOptions, g = B.defaultTime,
                r = c.seriesTypes, F = t.addEvent, D = t.attr, M = t.cleanRecursively, C = t.createElement,
                O = t.css, S = t.defined, W = t.discardElement, Y = t.erase, ba = t.error, z = t.extend, Q = t.find,
                L = t.fireEvent, aa = t.getStyle, ja = t.isArray, I = t.isNumber, N = t.isObject, P = t.isString,
                U = t.merge, T = t.objectEach, R = t.pick, V = t.pInt, ca = t.relativeLength, da = t.removeEvent,
                fa = t.splat, ea = t.syncTimeout,
                ka = t.uniqueKey;
            a = function () {
                function a(a, b, d) {
                    this.series = this.renderTo = this.renderer = this.pointer = this.pointCount = this.plotWidth = this.plotTop = this.plotLeft = this.plotHeight = this.plotBox = this.options = this.numberFormatter = this.margin = this.legend =
                        this.labelCollectors = this.isResizing = this.index = this.eventOptions = this.container = this.colorCounter = this.clipBox = this.chartWidth = this.chartHeight = this.bounds = this.axisOffset = this.axes = void 0;
                    this.sharedClips = {};
                    this.yAxis = this.xAxis = this.userOptions = this.titleOffset = this.time = this.symbolCounter = this.spacingBox = this.spacing = void 0;
                    this.getArgs(a, b, d)
                }

                a.chart = function (b, d, c) {
                    return new a(b, d, c)
                };
                a.prototype.getArgs = function (a, b, d) {
                    P(a) || a.nodeName ? (this.renderTo = a, this.init(b, d)) : this.init(a, b)
                };
                a.prototype.init =
                    function (a, d) {
                        var c = a.plotOptions || {};
                        L(this, "init", {args: arguments}, function () {
                            var g = U(b, a), f = g.chart;
                            T(g.plotOptions, function (a, b) {
                                N(a) && (a.tooltip = c[b] && U(c[b].tooltip) || void 0)
                            });
                            g.tooltip.userOptions = a.chart && a.chart.forExport && a.tooltip.userOptions || a.tooltip;
                            this.userOptions = a;
                            this.margin = [];
                            this.spacing = [];
                            this.bounds = {h: {}, v: {}};
                            this.labelCollectors = [];
                            this.callback = d;
                            this.isResizing = 0;
                            this.options = g;
                            this.axes = [];
                            this.series = [];
                            this.time = a.time && Object.keys(a.time).length ? new e(a.time) : x.time;
                            this.numberFormatter = f.numberFormatter || v;
                            this.styledMode = f.styledMode;
                            this.hasCartesianSeries = f.showAxes;
                            this.index = A.length;
                            A.push(this);
                            x.chartCount++;
                            K(this, f);
                            this.xAxis = [];
                            this.yAxis = [];
                            this.pointCount = this.colorCounter = this.symbolCounter = 0;
                            L(this, "afterInit");
                            this.firstRender()
                        })
                    };
                a.prototype.initSeries = function (a) {
                    var b = this.options.chart;
                    b = a.type || b.type || b.defaultSeriesType;
                    var d = r[b];
                    d || ba(17, !0, this, {missingModuleFor: b});
                    b = new d;
                    "function" === typeof b.init && b.init(this, a);
                    return b
                };
                a.prototype.setSeriesData =
                    function () {
                        this.getSeriesOrderByLinks().forEach(function (a) {
                            a.points || a.data || !a.enabledDataSorting || a.setData(a.options.data, !1)
                        })
                    };
                a.prototype.getSeriesOrderByLinks = function () {
                    return this.series.concat().sort(function (a, b) {
                        return a.linkedSeries.length || b.linkedSeries.length ? b.linkedSeries.length - a.linkedSeries.length : 0
                    })
                };
                a.prototype.orderSeries = function (a) {
                    var b = this.series;
                    a = a || 0;
                    for (var d = b.length; a < d; ++a) b[a] && (b[a].index = a, b[a].name = b[a].getName())
                };
                a.prototype.isInsidePlot = function (a, b, d) {
                    void 0 ===
                    d && (d = {});
                    var c = this.inverted, e = this.plotBox, g = this.plotLeft, f = this.plotTop,
                        k = this.scrollablePlotBox, l = 0;
                    var h = 0;
                    d.visiblePlotOnly && this.scrollingContainer && (h = this.scrollingContainer, l = h.scrollLeft, h = h.scrollTop);
                    var I = d.series;
                    e = d.visiblePlotOnly && k || e;
                    k = d.inverted ? b : a;
                    b = d.inverted ? a : b;
                    a = {x: k, y: b, isInsidePlot: !0};
                    if (!d.ignoreX) {
                        var r = I && (c ? I.yAxis : I.xAxis) || {pos: g, len: Infinity};
                        k = d.paneCoordinates ? r.pos + k : g + k;
                        k >= Math.max(l + g, r.pos) && k <= Math.min(l + g + e.width, r.pos + r.len) || (a.isInsidePlot = !1)
                    }
                    !d.ignoreY &&
                    a.isInsidePlot && (c = I && (c ? I.xAxis : I.yAxis) || {
                        pos: f,
                        len: Infinity
                    }, d = d.paneCoordinates ? c.pos + b : f + b, d >= Math.max(h + f, c.pos) && d <= Math.min(h + f + e.height, c.pos + c.len) || (a.isInsidePlot = !1));
                    L(this, "afterIsInsidePlot", a);
                    return a.isInsidePlot
                };
                a.prototype.redraw = function (a) {
                    L(this, "beforeRedraw");
                    var b = this.hasCartesianSeries ? this.axes : this.colorAxis || [], d = this.series,
                        c = this.pointer, e = this.legend, g = this.userOptions.legend, f = this.renderer,
                        k = f.isHidden(), h = [], I = this.isDirtyBox, r = this.isDirtyLegend;
                    this.setResponsive &&
                    this.setResponsive(!1);
                    l(this.hasRendered ? a : !1, this);
                    k && this.temporaryDisplay();
                    this.layOutTitles();
                    for (a = d.length; a--;) {
                        var m = d[a];
                        if (m.options.stacking || m.options.centerInCategory) {
                            var p = !0;
                            if (m.isDirty) {
                                var t = !0;
                                break
                            }
                        }
                    }
                    if (t) for (a = d.length; a--;) m = d[a], m.options.stacking && (m.isDirty = !0);
                    d.forEach(function (a) {
                        a.isDirty && ("point" === a.options.legendType ? ("function" === typeof a.updateTotals && a.updateTotals(), r = !0) : g && (g.labelFormatter || g.labelFormat) && (r = !0));
                        a.isDirtyData && L(a, "updatedData")
                    });
                    r && e &&
                    e.options.enabled && (e.render(), this.isDirtyLegend = !1);
                    p && this.getStacks();
                    b.forEach(function (a) {
                        a.updateNames();
                        a.setScale()
                    });
                    this.getMargins();
                    b.forEach(function (a) {
                        a.isDirty && (I = !0)
                    });
                    b.forEach(function (a) {
                        var b = a.min + "," + a.max;
                        a.extKey !== b && (a.extKey = b, h.push(function () {
                            L(a, "afterSetExtremes", z(a.eventArgs, a.getExtremes()));
                            delete a.eventArgs
                        }));
                        (I || p) && a.redraw()
                    });
                    I && this.drawChartBox();
                    L(this, "predraw");
                    d.forEach(function (a) {
                        (I || a.isDirty) && a.visible && a.redraw();
                        a.isDirtyData = !1
                    });
                    c && c.reset(!0);
                    f.draw();
                    L(this, "redraw");
                    L(this, "render");
                    k && this.temporaryDisplay(!0);
                    h.forEach(function (a) {
                        a.call()
                    })
                };
                a.prototype.get = function (a) {
                    function b(b) {
                        return b.id === a || b.options && b.options.id === a
                    }

                    for (var d = this.series, c = Q(this.axes, b) || Q(this.series, b), e = 0; !c && e < d.length; e++) c = Q(d[e].points || [], b);
                    return c
                };
                a.prototype.getAxes = function () {
                    var a = this, b = this.options, d = b.xAxis = fa(b.xAxis || {});
                    b = b.yAxis = fa(b.yAxis || {});
                    L(this, "getAxes");
                    d.forEach(function (a, b) {
                        a.index = b;
                        a.isX = !0
                    });
                    b.forEach(function (a, b) {
                        a.index =
                            b
                    });
                    d.concat(b).forEach(function (b) {
                        new u(a, b)
                    });
                    L(this, "afterGetAxes")
                };
                a.prototype.getSelectedPoints = function () {
                    var a = [];
                    this.series.forEach(function (b) {
                        a = a.concat(b.getPointsCollection().filter(function (a) {
                            return R(a.selectedStaging, a.selected)
                        }))
                    });
                    return a
                };
                a.prototype.getSelectedSeries = function () {
                    return this.series.filter(function (a) {
                        return a.selected
                    })
                };
                a.prototype.setTitle = function (a, b, d) {
                    this.applyDescription("title", a);
                    this.applyDescription("subtitle", b);
                    this.applyDescription("caption",
                        void 0);
                    this.layOutTitles(d)
                };
                a.prototype.applyDescription = function (a, b) {
                    var d = this, c = "title" === a ? {
                        color: q.neutralColor80,
                        fontSize: this.options.isStock ? "16px" : "18px"
                    } : {color: q.neutralColor60};
                    c = this.options[a] = U(!this.styledMode && {style: c}, this.options[a], b);
                    var e = this[a];
                    e && b && (this[a] = e = e.destroy());
                    c && !e && (e = this.renderer.text(c.text, 0, 0, c.useHTML).attr({
                        align: c.align,
                        "class": "highcharts-" + a,
                        zIndex: c.zIndex || 4
                    }).add(), e.update = function (b) {
                        d[{title: "setTitle", subtitle: "setSubtitle", caption: "setCaption"}[a]](b)
                    },
                    this.styledMode || e.css(c.style), this[a] = e)
                };
                a.prototype.layOutTitles = function (a) {
                    var b = [0, 0, 0], d = this.renderer, c = this.spacingBox;
                    ["title", "subtitle", "caption"].forEach(function (a) {
                        var e = this[a], g = this.options[a], f = g.verticalAlign || "top";
                        a = "title" === a ? "top" === f ? -3 : 0 : "top" === f ? b[0] + 2 : 0;
                        var k;
                        if (e) {
                            this.styledMode || (k = g.style && g.style.fontSize);
                            k = d.fontMetrics(k, e).b;
                            e.css({width: (g.width || c.width + (g.widthAdjust || 0)) + "px"});
                            var l = Math.round(e.getBBox(g.useHTML).height);
                            e.align(z({
                                y: "bottom" === f ? k : a +
                                    k, height: l
                            }, g), !1, "spacingBox");
                            g.floating || ("top" === f ? b[0] = Math.ceil(b[0] + l) : "bottom" === f && (b[2] = Math.ceil(b[2] + l)))
                        }
                    }, this);
                    b[0] && "top" === (this.options.title.verticalAlign || "top") && (b[0] += this.options.title.margin);
                    b[2] && "bottom" === this.options.caption.verticalAlign && (b[2] += this.options.caption.margin);
                    var e = !this.titleOffset || this.titleOffset.join(",") !== b.join(",");
                    this.titleOffset = b;
                    L(this, "afterLayOutTitles");
                    !this.isDirtyBox && e && (this.isDirtyBox = this.isDirtyLegend = e, this.hasRendered && R(a, !0) &&
                    this.isDirtyBox && this.redraw())
                };
                a.prototype.getChartSize = function () {
                    var a = this.options.chart, b = a.width;
                    a = a.height;
                    var d = this.renderTo;
                    S(b) || (this.containerWidth = aa(d, "width"));
                    S(a) || (this.containerHeight = aa(d, "height"));
                    this.chartWidth = Math.max(0, b || this.containerWidth || 600);
                    this.chartHeight = Math.max(0, ca(a, this.chartWidth) || (1 < this.containerHeight ? this.containerHeight : 400))
                };
                a.prototype.temporaryDisplay = function (a) {
                    var b = this.renderTo;
                    if (a) for (; b && b.style;) b.hcOrigStyle && (O(b, b.hcOrigStyle), delete b.hcOrigStyle),
                    b.hcOrigDetached && (p.body.removeChild(b), b.hcOrigDetached = !1), b = b.parentNode; else for (; b && b.style;) {
                        p.body.contains(b) || b.parentNode || (b.hcOrigDetached = !0, p.body.appendChild(b));
                        if ("none" === aa(b, "display", !1) || b.hcOricDetached) b.hcOrigStyle = {
                            display: b.style.display,
                            height: b.style.height,
                            overflow: b.style.overflow
                        }, a = {
                            display: "block",
                            overflow: "hidden"
                        }, b !== this.renderTo && (a.height = 0), O(b, a), b.offsetWidth || b.style.setProperty("display", "block", "important");
                        b = b.parentNode;
                        if (b === p.body) break
                    }
                };
                a.prototype.setClassName =
                    function (a) {
                        this.container.className = "highcharts-container " + (a || "")
                    };
                a.prototype.getContainer = function () {
                    var a = this.options, b = a.chart, d = ka(), c, e = this.renderTo;
                    e || (this.renderTo = e = b.renderTo);
                    P(e) && (this.renderTo = e = p.getElementById(e));
                    e || ba(13, !0, this);
                    var g = V(D(e, "data-highcharts-chart"));
                    I(g) && A[g] && A[g].hasRendered && A[g].destroy();
                    D(e, "data-highcharts-chart", this.index);
                    e.innerHTML = "";
                    b.skipClone || e.offsetWidth || this.temporaryDisplay();
                    this.getChartSize();
                    g = this.chartWidth;
                    var k = this.chartHeight;
                    O(e, {overflow: "hidden"});
                    this.styledMode || (c = z({
                        position: "relative",
                        overflow: "hidden",
                        width: g + "px",
                        height: k + "px",
                        textAlign: "left",
                        lineHeight: "normal",
                        zIndex: 0,
                        "-webkit-tap-highlight-color": "rgba(0,0,0,0)",
                        userSelect: "none",
                        "touch-action": "manipulation",
                        outline: "none"
                    }, b.style || {}));
                    this.container = d = C("div", {id: d}, c, e);
                    this._cursor = d.style.cursor;
                    this.renderer = new (f.getRendererType(b.renderer))(d, g, k, void 0, b.forExport, a.exporting && a.exporting.allowHTML, this.styledMode);
                    l(void 0, this);
                    this.setClassName(b.className);
                    if (this.styledMode) for (var h in a.defs) this.renderer.definition(a.defs[h]); else this.renderer.setStyle(b.style);
                    this.renderer.chartIndex = this.index;
                    L(this, "afterGetContainer")
                };
                a.prototype.getMargins = function (a) {
                    var b = this.spacing, d = this.margin, c = this.titleOffset;
                    this.resetMargins();
                    c[0] && !S(d[0]) && (this.plotTop = Math.max(this.plotTop, c[0] + b[0]));
                    c[2] && !S(d[2]) && (this.marginBottom = Math.max(this.marginBottom, c[2] + b[2]));
                    this.legend && this.legend.display && this.legend.adjustMargins(d, b);
                    L(this, "getMargins");
                    a || this.getAxisMargins()
                };
                a.prototype.getAxisMargins = function () {
                    var a = this, b = a.axisOffset = [0, 0, 0, 0], c = a.colorAxis, e = a.margin, g = function (a) {
                        a.forEach(function (a) {
                            a.visible && a.getOffset()
                        })
                    };
                    a.hasCartesianSeries ? g(a.axes) : c && c.length && g(c);
                    d.forEach(function (d, c) {
                        S(e[c]) || (a[d] += b[c])
                    });
                    a.setChartSize()
                };
                a.prototype.reflow = function (a) {
                    var b = this, d = b.options.chart, c = b.renderTo, e = S(d.width) && S(d.height),
                        g = d.width || aa(c, "width");
                    d = d.height || aa(c, "height");
                    c = a ? a.target : k;
                    delete b.pointer.chartPosition;
                    if (!e && !b.isPrinting && g && d && (c === k || c === p)) {
                        if (g !== b.containerWidth || d !== b.containerHeight) t.clearTimeout(b.reflowTimeout), b.reflowTimeout = ea(function () {
                            b.container && b.setSize(void 0, void 0, !1)
                        }, a ? 100 : 0);
                        b.containerWidth = g;
                        b.containerHeight = d
                    }
                };
                a.prototype.setReflow = function (a) {
                    var b = this;
                    !1 === a || this.unbindReflow ? !1 === a && this.unbindReflow && (this.unbindReflow = this.unbindReflow()) : (this.unbindReflow = F(k, "resize", function (a) {
                        b.options && b.reflow(a)
                    }), F(this, "destroy", this.unbindReflow))
                };
                a.prototype.setSize =
                    function (a, b, d) {
                        var c = this, e = c.renderer;
                        c.isResizing += 1;
                        l(d, c);
                        d = e.globalAnimation;
                        c.oldChartHeight = c.chartHeight;
                        c.oldChartWidth = c.chartWidth;
                        "undefined" !== typeof a && (c.options.chart.width = a);
                        "undefined" !== typeof b && (c.options.chart.height = b);
                        c.getChartSize();
                        c.styledMode || (d ? w : O)(c.container, {
                            width: c.chartWidth + "px",
                            height: c.chartHeight + "px"
                        }, d);
                        c.setChartSize(!0);
                        e.setSize(c.chartWidth, c.chartHeight, d);
                        c.axes.forEach(function (a) {
                            a.isDirty = !0;
                            a.setScale()
                        });
                        c.isDirtyLegend = !0;
                        c.isDirtyBox = !0;
                        c.layOutTitles();
                        c.getMargins();
                        c.redraw(d);
                        c.oldChartHeight = null;
                        L(c, "resize");
                        ea(function () {
                            c && L(c, "endResize", null, function () {
                                --c.isResizing
                            })
                        }, n(d).duration)
                    };
                a.prototype.setChartSize = function (a) {
                    var b = this.inverted, d = this.renderer, c = this.chartWidth, e = this.chartHeight,
                        g = this.options.chart, f = this.spacing, k = this.clipOffset, l, h, I, r;
                    this.plotLeft = l = Math.round(this.plotLeft);
                    this.plotTop = h = Math.round(this.plotTop);
                    this.plotWidth = I = Math.max(0, Math.round(c - l - this.marginRight));
                    this.plotHeight = r = Math.max(0, Math.round(e -
                        h - this.marginBottom));
                    this.plotSizeX = b ? r : I;
                    this.plotSizeY = b ? I : r;
                    this.plotBorderWidth = g.plotBorderWidth || 0;
                    this.spacingBox = d.spacingBox = {
                        x: f[3],
                        y: f[0],
                        width: c - f[3] - f[1],
                        height: e - f[0] - f[2]
                    };
                    this.plotBox = d.plotBox = {x: l, y: h, width: I, height: r};
                    b = 2 * Math.floor(this.plotBorderWidth / 2);
                    c = Math.ceil(Math.max(b, k[3]) / 2);
                    e = Math.ceil(Math.max(b, k[0]) / 2);
                    this.clipBox = {
                        x: c,
                        y: e,
                        width: Math.floor(this.plotSizeX - Math.max(b, k[1]) / 2 - c),
                        height: Math.max(0, Math.floor(this.plotSizeY - Math.max(b, k[2]) / 2 - e))
                    };
                    a || (this.axes.forEach(function (a) {
                        a.setAxisSize();
                        a.setAxisTranslation()
                    }), d.alignElements());
                    L(this, "afterSetChartSize", {skipAxes: a})
                };
                a.prototype.resetMargins = function () {
                    L(this, "resetMargins");
                    var a = this, b = a.options.chart;
                    ["margin", "spacing"].forEach(function (d) {
                        var c = b[d], e = N(c) ? c : [c, c, c, c];
                        ["Top", "Right", "Bottom", "Left"].forEach(function (c, g) {
                            a[d][g] = R(b[d + c], e[g])
                        })
                    });
                    d.forEach(function (b, d) {
                        a[b] = R(a.margin[d], a.spacing[d])
                    });
                    a.axisOffset = [0, 0, 0, 0];
                    a.clipOffset = [0, 0, 0, 0]
                };
                a.prototype.drawChartBox = function () {
                    var a = this.options.chart, b = this.renderer,
                        d = this.chartWidth, c = this.chartHeight, e = this.styledMode, g = this.plotBGImage,
                        f = a.backgroundColor, k = a.plotBackgroundColor, l = a.plotBackgroundImage, h = this.plotLeft,
                        I = this.plotTop, r = this.plotWidth, m = this.plotHeight, p = this.plotBox, t = this.clipRect,
                        n = this.clipBox, P = this.chartBackground,
                        w = this.plotBackground, q = this.plotBorder, A, v = "animate";
                    P || (this.chartBackground = P = b.rect().addClass("highcharts-background").add(), v = "attr");
                    if (e) var N = A = P.strokeWidth(); else {
                        N = a.borderWidth || 0;
                        A = N + (a.shadow ? 8 : 0);
                        f = {fill: f || "none"};
                        if (N || P["stroke-width"]) f.stroke = a.borderColor, f["stroke-width"] = N;
                        P.attr(f).shadow(a.shadow)
                    }
                    P[v]({x: A / 2, y: A / 2, width: d - A - N % 2, height: c - A - N % 2, r: a.borderRadius});
                    v = "animate";
                    w || (v = "attr", this.plotBackground = w = b.rect().addClass("highcharts-plot-background").add());
                    w[v](p);
                    e || (w.attr({fill: k || "none"}).shadow(a.plotShadow), l && (g ? (l !== g.attr("href") && g.attr("href", l), g.animate(p)) : this.plotBGImage = b.image(l, h, I, r, m).add()));
                    t ? t.animate({width: n.width, height: n.height}) : this.clipRect = b.clipRect(n);
                    v = "animate";
                    q || (v = "attr", this.plotBorder = q = b.rect().addClass("highcharts-plot-border").attr({zIndex: 1}).add());
                    e || q.attr({stroke: a.plotBorderColor, "stroke-width": a.plotBorderWidth || 0, fill: "none"});
                    q[v](q.crisp({x: h, y: I, width: r, height: m}, -q.strokeWidth()));
                    this.isDirtyBox = !1;
                    L(this, "afterDrawChartBox")
                };
                a.prototype.propFromSeries = function () {
                    var a = this, b = a.options.chart, d = a.options.series, c, e, g;
                    ["inverted", "angular", "polar"].forEach(function (f) {
                        e = r[b.type || b.defaultSeriesType];
                        g = b[f] || e && e.prototype[f];
                        for (c = d &&
                            d.length; !g && c--;) (e = r[d[c].type]) && e.prototype[f] && (g = !0);
                        a[f] = g
                    })
                };
                a.prototype.linkSeries = function () {
                    var a = this, b = a.series;
                    b.forEach(function (a) {
                        a.linkedSeries.length = 0
                    });
                    b.forEach(function (b) {
                        var d = b.options.linkedTo;
                        P(d) && (d = ":previous" === d ? a.series[b.index - 1] : a.get(d)) && d.linkedParent !== b && (d.linkedSeries.push(b), b.linkedParent = d, d.enabledDataSorting && b.setDataSortingOptions(), b.visible = R(b.options.visible, d.options.visible, b.visible))
                    });
                    L(this, "afterLinkSeries")
                };
                a.prototype.renderSeries = function () {
                    this.series.forEach(function (a) {
                        a.translate();
                        a.render()
                    })
                };
                a.prototype.renderLabels = function () {
                    var a = this, b = a.options.labels;
                    b.items && b.items.forEach(function (d) {
                        var c = z(b.style, d.style), e = V(c.left) + a.plotLeft, g = V(c.top) + a.plotTop + 12;
                        delete c.left;
                        delete c.top;
                        a.renderer.text(d.html, e, g).attr({zIndex: 2}).css(c).add()
                    })
                };
                a.prototype.render = function () {
                    var a = this.axes, b = this.colorAxis, d = this.renderer, c = this.options, e = function (a) {
                        a.forEach(function (a) {
                            a.visible && a.render()
                        })
                    }, g = 0;
                    this.setTitle();
                    this.legend = new y(this, c.legend);
                    this.getStacks &&
                    this.getStacks();
                    this.getMargins(!0);
                    this.setChartSize();
                    c = this.plotWidth;
                    a.some(function (a) {
                        if (a.horiz && a.visible && a.options.labels.enabled && a.series.length) return g = 21, !0
                    });
                    var f = this.plotHeight = Math.max(this.plotHeight - g, 0);
                    a.forEach(function (a) {
                        a.setScale()
                    });
                    this.getAxisMargins();
                    var k = 1.1 < c / this.plotWidth, l = 1.05 < f / this.plotHeight;
                    if (k || l) a.forEach(function (a) {
                        (a.horiz && k || !a.horiz && l) && a.setTickInterval(!0)
                    }), this.getMargins();
                    this.drawChartBox();
                    this.hasCartesianSeries ? e(a) : b && b.length && e(b);
                    this.seriesGroup || (this.seriesGroup = d.g("series-group").attr({zIndex: 3}).add());
                    this.renderSeries();
                    this.renderLabels();
                    this.addCredits();
                    this.setResponsive && this.setResponsive();
                    this.hasRendered = !0
                };
                a.prototype.addCredits = function (a) {
                    var b = this, d = U(!0, this.options.credits, a);
                    d.enabled && !this.credits && (this.credits = this.renderer.text(d.text + (this.mapCredits || ""), 0, 0).addClass("highcharts-credits").on("click", function () {
                        d.href && (k.location.href = d.href)
                    }).attr({align: d.position.align, zIndex: 8}), b.styledMode ||
                    this.credits.css(d.style), this.credits.add().align(d.position), this.credits.update = function (a) {
                        b.credits = b.credits.destroy();
                        b.addCredits(a)
                    })
                };
                a.prototype.destroy = function () {
                    var a = this, b = a.axes, d = a.series, c = a.container, e = c && c.parentNode, g;
                    L(a, "destroy");
                    a.renderer.forExport ? Y(A, a) : A[a.index] = void 0;
                    x.chartCount--;
                    a.renderTo.removeAttribute("data-highcharts-chart");
                    da(a);
                    for (g = b.length; g--;) b[g] = b[g].destroy();
                    this.scroller && this.scroller.destroy && this.scroller.destroy();
                    for (g = d.length; g--;) d[g] =
                        d[g].destroy();
                    "title subtitle chartBackground plotBackground plotBGImage plotBorder seriesGroup clipRect credits pointer rangeSelector legend resetZoomButton tooltip renderer".split(" ").forEach(function (b) {
                        var d = a[b];
                        d && d.destroy && (a[b] = d.destroy())
                    });
                    c && (c.innerHTML = "", da(c), e && W(c));
                    T(a, function (b, d) {
                        delete a[d]
                    })
                };
                a.prototype.firstRender = function () {
                    var a = this, b = a.options;
                    if (!a.isReadyToRender || a.isReadyToRender()) {
                        a.getContainer();
                        a.resetMargins();
                        a.setChartSize();
                        a.propFromSeries();
                        a.getAxes();
                        (ja(b.series) ? b.series : []).forEach(function (b) {
                            a.initSeries(b)
                        });
                        a.linkSeries();
                        a.setSeriesData();
                        L(a, "beforeRender");
                        h && (G.isRequired() ? a.pointer = new G(a, b) : a.pointer = new h(a, b));
                        a.render();
                        a.pointer.getChartPosition();
                        if (!a.renderer.imgCount && !a.hasLoaded) a.onload();
                        a.temporaryDisplay(!0)
                    }
                };
                a.prototype.onload = function () {
                    this.callbacks.concat([this.callback]).forEach(function (a) {
                        a && "undefined" !== typeof this.index && a.apply(this, [this])
                    }, this);
                    L(this, "load");
                    L(this, "render");
                    S(this.index) && this.setReflow(this.options.chart.reflow);
                    this.hasLoaded = !0
                };
                a.prototype.addSeries = function (a, b, d) {
                    var c = this, e;
                    a && (b = R(b, !0), L(c, "addSeries", {options: a}, function () {
                        e = c.initSeries(a);
                        c.isDirtyLegend = !0;
                        c.linkSeries();
                        e.enabledDataSorting && e.setData(a.data, !1);
                        L(c, "afterAddSeries", {series: e});
                        b && c.redraw(d)
                    }));
                    return e
                };
                a.prototype.addAxis = function (a, b, d, c) {
                    return this.createAxis(b ? "xAxis" : "yAxis", {axis: a, redraw: d, animation: c})
                };
                a.prototype.addColorAxis = function (a, b, d) {
                    return this.createAxis("colorAxis", {axis: a, redraw: b, animation: d})
                };
                a.prototype.createAxis =
                    function (a, b) {
                        var d = "colorAxis" === a, c = b.redraw, e = b.animation;
                        a = U(b.axis, {index: this[a].length, isX: "xAxis" === a});
                        a = d ? new x.ColorAxis(this, a) : new u(this, a);
                        d && (this.isDirtyLegend = !0, this.axes.forEach(function (a) {
                            a.series = []
                        }), this.series.forEach(function (a) {
                            a.bindAxes();
                            a.isDirtyData = !0
                        }));
                        R(c, !0) && this.redraw(e);
                        return a
                    };
                a.prototype.showLoading = function (a) {
                    var b = this, d = b.options, c = d.loading, e = function () {
                            g && O(g, {
                                left: b.plotLeft + "px",
                                top: b.plotTop + "px",
                                width: b.plotWidth + "px",
                                height: b.plotHeight + "px"
                            })
                        },
                        g = b.loadingDiv, f = b.loadingSpan;
                    g || (b.loadingDiv = g = C("div", {className: "highcharts-loading highcharts-loading-hidden"}, null, b.container));
                    f || (b.loadingSpan = f = C("span", {className: "highcharts-loading-inner"}, null, g), F(b, "redraw", e));
                    g.className = "highcharts-loading";
                    m.setElementHTML(f, R(a, d.lang.loading, ""));
                    b.styledMode || (O(g, z(c.style, {zIndex: 10})), O(f, c.labelStyle), b.loadingShown || (O(g, {
                        opacity: 0,
                        display: ""
                    }), w(g, {opacity: c.style.opacity || .5}, {duration: c.showDuration || 0})));
                    b.loadingShown = !0;
                    e()
                };
                a.prototype.hideLoading =
                    function () {
                        var a = this.options, b = this.loadingDiv;
                        b && (b.className = "highcharts-loading highcharts-loading-hidden", this.styledMode || w(b, {opacity: 0}, {
                            duration: a.loading.hideDuration || 100, complete: function () {
                                O(b, {display: "none"})
                            }
                        }));
                        this.loadingShown = !1
                    };
                a.prototype.update = function (a, b, d, c) {
                    var f = this,
                        k = {credits: "addCredits", title: "setTitle", subtitle: "setSubtitle", caption: "setCaption"},
                        l = a.isResponsiveOptions, h = [], r, m;
                    L(f, "update", {options: a});
                    l || f.setResponsive(!1, !0);
                    a = M(a, f.options);
                    f.userOptions = U(f.userOptions,
                        a);
                    var p = a.chart;
                    if (p) {
                        U(!0, f.options.chart, p);
                        "className" in p && f.setClassName(p.className);
                        "reflow" in p && f.setReflow(p.reflow);
                        if ("inverted" in p || "polar" in p || "type" in p) {
                            f.propFromSeries();
                            var t = !0
                        }
                        "alignTicks" in p && (t = !0);
                        "events" in p && K(this, p);
                        T(p, function (a, b) {
                            -1 !== f.propsRequireUpdateSeries.indexOf("chart." + b) && (r = !0);
                            -1 !== f.propsRequireDirtyBox.indexOf(b) && (f.isDirtyBox = !0);
                            -1 !== f.propsRequireReflow.indexOf(b) && (l ? f.isDirtyBox = !0 : m = !0)
                        });
                        !f.styledMode && "style" in p && f.renderer.setStyle(p.style)
                    }
                    !f.styledMode &&
                    a.colors && (this.options.colors = a.colors);
                    a.time && (this.time === g && (this.time = new e(a.time)), U(!0, f.options.time, a.time));
                    T(a, function (b, d) {
                        if (f[d] && "function" === typeof f[d].update) f[d].update(b, !1); else if ("function" === typeof f[k[d]]) f[k[d]](b); else "colors" !== d && -1 === f.collectionsWithUpdate.indexOf(d) && U(!0, f.options[d], a[d]);
                        "chart" !== d && -1 !== f.propsRequireUpdateSeries.indexOf(d) && (r = !0)
                    });
                    this.collectionsWithUpdate.forEach(function (b) {
                        if (a[b]) {
                            var c = [];
                            f[b].forEach(function (a, b) {
                                a.options.isInternal ||
                                c.push(R(a.options.index, b))
                            });
                            fa(a[b]).forEach(function (a, e) {
                                var g = S(a.id), k;
                                g && (k = f.get(a.id));
                                !k && f[b] && (k = f[b][c ? c[e] : e]) && g && S(k.options.id) && (k = void 0);
                                k && k.coll === b && (k.update(a, !1), d && (k.touched = !0));
                                !k && d && f.collectionsWithInit[b] && (f.collectionsWithInit[b][0].apply(f, [a].concat(f.collectionsWithInit[b][1] || []).concat([!1])).touched = !0)
                            });
                            d && f[b].forEach(function (a) {
                                a.touched || a.options.isInternal ? delete a.touched : h.push(a)
                            })
                        }
                    });
                    h.forEach(function (a) {
                        a.chart && a.remove(!1)
                    });
                    t && f.axes.forEach(function (a) {
                        a.update({},
                            !1)
                    });
                    r && f.getSeriesOrderByLinks().forEach(function (a) {
                        a.chart && a.update({}, !1)
                    }, this);
                    t = p && p.width;
                    p = p && (P(p.height) ? ca(p.height, t || f.chartWidth) : p.height);
                    m || I(t) && t !== f.chartWidth || I(p) && p !== f.chartHeight ? f.setSize(t, p, c) : R(b, !0) && f.redraw(c);
                    L(f, "afterUpdate", {options: a, redraw: b, animation: c})
                };
                a.prototype.setSubtitle = function (a, b) {
                    this.applyDescription("subtitle", a);
                    this.layOutTitles(b)
                };
                a.prototype.setCaption = function (a, b) {
                    this.applyDescription("caption", a);
                    this.layOutTitles(b)
                };
                a.prototype.showResetZoom =
                    function () {
                        function a() {
                            d.zoomOut()
                        }

                        var d = this, c = b.lang, e = d.options.chart.resetZoomButton, g = e.theme, f = g.states,
                            k = "chart" === e.relativeTo || "spacingBox" === e.relativeTo ? null : "scrollablePlotBox";
                        L(this, "beforeShowResetZoom", null, function () {
                            d.resetZoomButton = d.renderer.button(c.resetZoom, null, null, a, g, f && f.hover).attr({
                                align: e.position.align,
                                title: c.resetZoomTitle
                            }).addClass("highcharts-reset-zoom").add().align(e.position, !1, k)
                        });
                        L(this, "afterShowResetZoom")
                    };
                a.prototype.zoomOut = function () {
                    L(this, "selection",
                        {resetSelection: !0}, this.zoom)
                };
                a.prototype.zoom = function (a) {
                    var b = this, d = b.pointer, c = b.inverted ? d.mouseDownX : d.mouseDownY, e = !1, g;
                    !a || a.resetSelection ? (b.axes.forEach(function (a) {
                        g = a.zoom()
                    }), d.initiated = !1) : a.xAxis.concat(a.yAxis).forEach(function (a) {
                        var f = a.axis, k = b.inverted ? f.left : f.top, l = b.inverted ? k + f.width : k + f.height,
                            h = f.isXAxis, I = !1;
                        if (!h && c >= k && c <= l || h || !S(c)) I = !0;
                        d[h ? "zoomX" : "zoomY"] && I && (g = f.zoom(a.min, a.max), f.displayBtn && (e = !0))
                    });
                    var f = b.resetZoomButton;
                    e && !f ? b.showResetZoom() : !e && N(f) &&
                        (b.resetZoomButton = f.destroy());
                    g && b.redraw(R(b.options.chart.animation, a && a.animation, 100 > b.pointCount))
                };
                a.prototype.pan = function (a, b) {
                    var d = this, c = d.hoverPoints;
                    b = "object" === typeof b ? b : {enabled: b, type: "x"};
                    var e = d.options.chart, g = d.options.mapNavigation && d.options.mapNavigation.enabled;
                    e && e.panning && (e.panning = b);
                    var f = b.type, k;
                    L(this, "pan", {originalEvent: a}, function () {
                        c && c.forEach(function (a) {
                            a.setState()
                        });
                        var b = d.xAxis;
                        "xy" === f ? b = b.concat(d.yAxis) : "y" === f && (b = d.yAxis);
                        var e = {};
                        b.forEach(function (b) {
                            if (b.options.panningEnabled &&
                                !b.options.isInternal) {
                                var c = b.horiz, l = a[c ? "chartX" : "chartY"];
                                c = c ? "mouseDownX" : "mouseDownY";
                                var h = d[c], r = b.minPointOffset || 0,
                                    p = b.reversed && !d.inverted || !b.reversed && d.inverted ? -1 : 1,
                                    m = b.getExtremes(), t = b.toValue(h - l, !0) + r * p,
                                    n = b.toValue(h + b.len - l, !0) - (r * p || b.isXAxis && b.pointRangePadding || 0),
                                    P = n < t;
                                p = b.hasVerticalPanning();
                                h = P ? n : t;
                                t = P ? t : n;
                                var q = b.panningState;
                                !p || b.isXAxis || q && !q.isDirty || b.series.forEach(function (a) {
                                    var b = a.getProcessedData(!0);
                                    b = a.getExtremes(b.yData, !0);
                                    q || (q = {
                                        startMin: Number.MAX_VALUE,
                                        startMax: -Number.MAX_VALUE
                                    });
                                    I(b.dataMin) && I(b.dataMax) && (q.startMin = Math.min(R(a.options.threshold, Infinity), b.dataMin, q.startMin), q.startMax = Math.max(R(a.options.threshold, -Infinity), b.dataMax, q.startMax))
                                });
                                p = Math.min(R(q && q.startMin, m.dataMin), r ? m.min : b.toValue(b.toPixels(m.min) - b.minPixelPadding));
                                n = Math.max(R(q && q.startMax, m.dataMax), r ? m.max : b.toValue(b.toPixels(m.max) + b.minPixelPadding));
                                b.panningState = q;
                                b.isOrdinal || (r = p - h, 0 < r && (t += r, h = p), r = t - n, 0 < r && (t = n, h -= r), b.series.length && h !== m.min &&
                                t !== m.max && h >= p && t <= n && (b.setExtremes(h, t, !1, !1, {trigger: "pan"}), d.resetZoomButton || g || h === p || t === n || !f.match("y") || (d.showResetZoom(), b.displayBtn = !1), k = !0), e[c] = l)
                            }
                        });
                        T(e, function (a, b) {
                            d[b] = a
                        });
                        k && d.redraw(!1);
                        O(d.container, {cursor: "move"})
                    })
                };
                return a
            }();
            z(a.prototype, {
                callbacks: [],
                collectionsWithInit: {
                    xAxis: [a.prototype.addAxis, [!0]],
                    yAxis: [a.prototype.addAxis, [!1]],
                    series: [a.prototype.addSeries]
                },
                collectionsWithUpdate: ["xAxis", "yAxis", "zAxis", "series"],
                propsRequireDirtyBox: "backgroundColor borderColor borderWidth borderRadius plotBackgroundColor plotBackgroundImage plotBorderColor plotBorderWidth plotShadow shadow".split(" "),
                propsRequireReflow: "margin marginTop marginRight marginBottom marginLeft spacing spacingTop spacingRight spacingBottom spacingLeft".split(" "),
                propsRequireUpdateSeries: "chart.inverted chart.polar chart.ignoreHiddenSeries chart.type colors plotOptions time tooltip".split(" ")
            });
            "";
            return a
        });
        L(a, "Mixins/LegendSymbol.js", [a["Core/Globals.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = u.merge, H = u.pick;
            return a.LegendSymbolMixin = {
                drawRectangle: function (a, v) {
                    var u = a.symbolHeight, B = a.options.squareSymbol;
                    v.legendSymbol = this.chart.renderer.rect(B ? (a.symbolWidth - u) / 2 : 0, a.baseline - u + 1, B ? u : a.symbolWidth, u, H(a.options.symbolRadius, u / 2)).addClass("highcharts-point").attr({zIndex: 3}).add(v.legendGroup)
                }, drawLineMarker: function (a) {
                    var u = this.options, x = u.marker, B = a.symbolWidth, q = a.symbolHeight, h = q / 2,
                        f = this.chart.renderer, c = this.legendGroup;
                    a = a.baseline - Math.round(.3 * a.fontMetrics.b);
                    var e = {};
                    this.chart.styledMode || (e = {"stroke-width": u.lineWidth || 0}, u.dashStyle && (e.dashstyle = u.dashStyle));
                    this.legendLine = f.path([["M",
                        0, a], ["L", B, a]]).addClass("highcharts-graph").attr(e).add(c);
                    x && !1 !== x.enabled && B && (u = Math.min(H(x.radius, h), h), 0 === this.symbol.indexOf("url") && (x = v(x, {
                        width: q,
                        height: q
                    }), u = 0), this.legendSymbol = x = f.symbol(this.symbol, B / 2 - u, a - u, 2 * u, 2 * u, x).addClass("highcharts-point").add(c), x.isMarker = !0)
                }
            }
        });
        L(a, "Core/Series/Series.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/Foundation.js"], a["Core/Globals.js"], a["Mixins/LegendSymbol.js"], a["Core/DefaultOptions.js"], a["Core/Color/Palette.js"], a["Core/Series/Point.js"],
            a["Core/Series/SeriesRegistry.js"], a["Core/Renderer/SVG/SVGElement.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y, G, B, q, h) {
            var f = a.animObject, c = a.setAnimation, e = u.registerEventOptions, t = E.hasTouch, m = E.svg, w = E.win,
                n = x.defaultOptions, l = B.seriesTypes, v = h.addEvent, K = h.arrayMax, A = h.arrayMin, p = h.clamp,
                d = h.cleanRecursively, k = h.correctFloat, b = h.defined, g = h.erase, r = h.error, F = h.extend,
                D = h.find, M = h.fireEvent,
                C = h.getNestedProperty, O = h.isArray, S = h.isNumber, W = h.isString, Y = h.merge, L = h.objectEach,
                z = h.pick, Q = h.removeEvent,
                ia = h.splat, aa = h.syncTimeout;
            a = function () {
                function a() {
                    this.zones = this.yAxis = this.xAxis = this.userOptions = this.tooltipOptions = this.processedYData = this.processedXData = this.points = this.options = this.linkedSeries = this.index = this.eventsToUnbind = this.eventOptions = this.data = this.chart = this._i = void 0
                }

                a.prototype.init = function (a, b) {
                    M(this, "init", {options: b});
                    var d = this, c = a.series;
                    this.eventsToUnbind = [];
                    d.chart = a;
                    d.options = d.setOptions(b);
                    b = d.options;
                    d.linkedSeries = [];
                    d.bindAxes();
                    F(d, {
                        name: b.name, state: "", visible: !1 !==
                            b.visible, selected: !0 === b.selected
                    });
                    e(this, b);
                    var g = b.events;
                    if (g && g.click || b.point && b.point.events && b.point.events.click || b.allowPointSelect) a.runTrackerClick = !0;
                    d.getColor();
                    d.getSymbol();
                    d.parallelArrays.forEach(function (a) {
                        d[a + "Data"] || (d[a + "Data"] = [])
                    });
                    d.isCartesian && (a.hasCartesianSeries = !0);
                    var f;
                    c.length && (f = c[c.length - 1]);
                    d._i = z(f && f._i, -1) + 1;
                    d.opacity = d.options.opacity;
                    a.orderSeries(this.insert(c));
                    b.dataSorting && b.dataSorting.enabled ? d.setDataSortingOptions() : d.points || d.data || d.setData(b.data,
                        !1);
                    M(this, "afterInit")
                };
                a.prototype.is = function (a) {
                    return l[a] && this instanceof l[a]
                };
                a.prototype.insert = function (a) {
                    var b = this.options.index, d;
                    if (S(b)) {
                        for (d = a.length; d--;) if (b >= z(a[d].options.index, a[d]._i)) {
                            a.splice(d + 1, 0, this);
                            break
                        }
                        -1 === d && a.unshift(this);
                        d += 1
                    } else a.push(this);
                    return z(d, a.length - 1)
                };
                a.prototype.bindAxes = function () {
                    var a = this, b = a.options, d = a.chart, c;
                    M(this, "bindAxes", null, function () {
                        (a.axisTypes || []).forEach(function (e) {
                            var g = 0;
                            d[e].forEach(function (d) {
                                c = d.options;
                                if (b[e] ===
                                    g && !c.isInternal || "undefined" !== typeof b[e] && b[e] === c.id || "undefined" === typeof b[e] && 0 === c.index) a.insert(d.series), a[e] = d, d.isDirty = !0;
                                c.isInternal || g++
                            });
                            a[e] || a.optionalAxis === e || r(18, !0, d)
                        })
                    });
                    M(this, "afterBindAxes")
                };
                a.prototype.updateParallelArrays = function (a, b) {
                    var d = a.series, c = arguments, e = S(b) ? function (c) {
                        var e = "y" === c && d.toYData ? d.toYData(a) : a[c];
                        d[c + "Data"][b] = e
                    } : function (a) {
                        Array.prototype[b].apply(d[a + "Data"], Array.prototype.slice.call(c, 2))
                    };
                    d.parallelArrays.forEach(e)
                };
                a.prototype.hasData =
                    function () {
                        return this.visible && "undefined" !== typeof this.dataMax && "undefined" !== typeof this.dataMin || this.visible && this.yData && 0 < this.yData.length
                    };
                a.prototype.autoIncrement = function () {
                    var a = this.options, b = this.xIncrement, d, c = a.pointIntervalUnit, e = this.chart.time;
                    b = z(b, a.pointStart, 0);
                    this.pointInterval = d = z(this.pointInterval, a.pointInterval, 1);
                    c && (a = new e.Date(b), "day" === c ? e.set("Date", a, e.get("Date", a) + d) : "month" === c ? e.set("Month", a, e.get("Month", a) + d) : "year" === c && e.set("FullYear", a, e.get("FullYear",
                        a) + d), d = a.getTime() - b);
                    this.xIncrement = b + d;
                    return b
                };
                a.prototype.setDataSortingOptions = function () {
                    var a = this.options;
                    F(this, {requireSorting: !1, sorted: !1, enabledDataSorting: !0, allowDG: !1});
                    b(a.pointRange) || (a.pointRange = 1)
                };
                a.prototype.setOptions = function (a) {
                    var d = this.chart, c = d.options, e = c.plotOptions, g = d.userOptions || {};
                    a = Y(a);
                    d = d.styledMode;
                    var f = {plotOptions: e, userOptions: a};
                    M(this, "setOptions", f);
                    var k = f.plotOptions[this.type], l = g.plotOptions || {};
                    this.userOptions = f.userOptions;
                    g = Y(k, e.series,
                        g.plotOptions && g.plotOptions[this.type], a);
                    this.tooltipOptions = Y(n.tooltip, n.plotOptions.series && n.plotOptions.series.tooltip, n.plotOptions[this.type].tooltip, c.tooltip.userOptions, e.series && e.series.tooltip, e[this.type].tooltip, a.tooltip);
                    this.stickyTracking = z(a.stickyTracking, l[this.type] && l[this.type].stickyTracking, l.series && l.series.stickyTracking, this.tooltipOptions.shared && !this.noSharedTooltip ? !0 : g.stickyTracking);
                    null === k.marker && delete g.marker;
                    this.zoneAxis = g.zoneAxis;
                    c = this.zones = (g.zones ||
                        []).slice();
                    !g.negativeColor && !g.negativeFillColor || g.zones || (e = {
                        value: g[this.zoneAxis + "Threshold"] || g.threshold || 0,
                        className: "highcharts-negative"
                    }, d || (e.color = g.negativeColor, e.fillColor = g.negativeFillColor), c.push(e));
                    c.length && b(c[c.length - 1].value) && c.push(d ? {} : {
                        color: this.color,
                        fillColor: this.fillColor
                    });
                    M(this, "afterSetOptions", {options: g});
                    return g
                };
                a.prototype.getName = function () {
                    return z(this.options.name, "Series " + (this.index + 1))
                };
                a.prototype.getCyclic = function (a, d, c) {
                    var e = this.chart, g =
                            this.userOptions, f = a + "Index", k = a + "Counter",
                        l = c ? c.length : z(e.options.chart[a + "Count"], e[a + "Count"]);
                    if (!d) {
                        var h = z(g[f], g["_" + f]);
                        b(h) || (e.series.length || (e[k] = 0), g["_" + f] = h = e[k] % l, e[k] += 1);
                        c && (d = c[h])
                    }
                    "undefined" !== typeof h && (this[f] = h);
                    this[a] = d
                };
                a.prototype.getColor = function () {
                    this.chart.styledMode ? this.getCyclic("color") : this.options.colorByPoint ? this.color = y.neutralColor20 : this.getCyclic("color", this.options.color || n.plotOptions[this.type].color, this.chart.options.colors)
                };
                a.prototype.getPointsCollection =
                    function () {
                        return (this.hasGroupedData ? this.points : this.data) || []
                    };
                a.prototype.getSymbol = function () {
                    this.getCyclic("symbol", this.options.marker.symbol, this.chart.options.symbols)
                };
                a.prototype.findPointIndex = function (a, b) {
                    var d = a.id, c = a.x, e = this.points, g, f = this.options.dataSorting;
                    if (d) var k = this.chart.get(d); else if (this.linkedParent || this.enabledDataSorting) {
                        var l = f && f.matchByName ? "name" : "index";
                        k = D(e, function (b) {
                            return !b.touched && b[l] === a[l]
                        });
                        if (!k) return
                    }
                    if (k) {
                        var h = k && k.index;
                        "undefined" !== typeof h &&
                        (g = !0)
                    }
                    "undefined" === typeof h && S(c) && (h = this.xData.indexOf(c, b));
                    -1 !== h && "undefined" !== typeof h && this.cropped && (h = h >= this.cropStart ? h - this.cropStart : h);
                    !g && e[h] && e[h].touched && (h = void 0);
                    return h
                };
                a.prototype.updateData = function (a, d) {
                    var c = this.options, e = c.dataSorting, g = this.points, f = [], k, l, h, r = this.requireSorting,
                        p = a.length === g.length, m = !0;
                    this.xIncrement = null;
                    a.forEach(function (a, d) {
                        var l = b(a) && this.pointClass.prototype.optionsToObject.call({series: this}, a) || {};
                        var m = l.x;
                        if (l.id || S(m)) {
                            if (m = this.findPointIndex(l,
                                h), -1 === m || "undefined" === typeof m ? f.push(a) : g[m] && a !== c.data[m] ? (g[m].update(a, !1, null, !1), g[m].touched = !0, r && (h = m + 1)) : g[m] && (g[m].touched = !0), !p || d !== m || e && e.enabled || this.hasDerivedData) k = !0
                        } else f.push(a)
                    }, this);
                    if (k) for (a = g.length; a--;) (l = g[a]) && !l.touched && l.remove && l.remove(!1, d); else !p || e && e.enabled ? m = !1 : (a.forEach(function (a, b) {
                        a !== g[b].y && g[b].update && g[b].update(a, !1, null, !1)
                    }), f.length = 0);
                    g.forEach(function (a) {
                        a && (a.touched = !1)
                    });
                    if (!m) return !1;
                    f.forEach(function (a) {
                        this.addPoint(a, !1,
                            null, null, !1)
                    }, this);
                    null === this.xIncrement && this.xData && this.xData.length && (this.xIncrement = K(this.xData), this.autoIncrement());
                    return !0
                };
                a.prototype.setData = function (a, b, d, c) {
                    var e = this, g = e.points, f = g && g.length || 0, k, l = e.options, h = e.chart,
                        p = l.dataSorting, m = null, t = e.xAxis;
                    m = l.turboThreshold;
                    var I = this.xData, n = this.yData, q = (k = e.pointArrayMap) && k.length, w = l.keys, A = 0, v = 1,
                        C;
                    a = a || [];
                    k = a.length;
                    b = z(b, !0);
                    p && p.enabled && (a = this.sortData(a));
                    !1 !== c && k && f && !e.cropped && !e.hasGroupedData && e.visible && !e.isSeriesBoosting &&
                    (C = this.updateData(a, d));
                    if (!C) {
                        e.xIncrement = null;
                        e.colorCounter = 0;
                        this.parallelArrays.forEach(function (a) {
                            e[a + "Data"].length = 0
                        });
                        if (m && k > m) if (m = e.getFirstValidPoint(a), S(m)) for (d = 0; d < k; d++) I[d] = this.autoIncrement(), n[d] = a[d]; else if (O(m)) if (q) for (d = 0; d < k; d++) c = a[d], I[d] = c[0], n[d] = c.slice(1, q + 1); else for (w && (A = w.indexOf("x"), v = w.indexOf("y"), A = 0 <= A ? A : 0, v = 0 <= v ? v : 1), d = 0; d < k; d++) c = a[d], I[d] = c[A], n[d] = c[v]; else r(12, !1, h); else for (d = 0; d < k; d++) "undefined" !== typeof a[d] && (c = {series: e}, e.pointClass.prototype.applyOptions.apply(c,
                            [a[d]]), e.updateParallelArrays(c, d));
                        n && W(n[0]) && r(14, !0, h);
                        e.data = [];
                        e.options.data = e.userOptions.data = a;
                        for (d = f; d--;) g[d] && g[d].destroy && g[d].destroy();
                        t && (t.minRange = t.userMinRange);
                        e.isDirty = h.isDirtyBox = !0;
                        e.isDirtyData = !!g;
                        d = !1
                    }
                    "point" === l.legendType && (this.processData(), this.generatePoints());
                    b && h.redraw(d)
                };
                a.prototype.sortData = function (a) {
                    var d = this, c = d.options.dataSorting.sortKey || "y", e = function (a, d) {
                        return b(d) && a.pointClass.prototype.optionsToObject.call({series: a}, d) || {}
                    };
                    a.forEach(function (b,
                                        c) {
                        a[c] = e(d, b);
                        a[c].index = c
                    }, this);
                    a.concat().sort(function (a, b) {
                        a = C(c, a);
                        b = C(c, b);
                        return b < a ? -1 : b > a ? 1 : 0
                    }).forEach(function (a, b) {
                        a.x = b
                    }, this);
                    d.linkedSeries && d.linkedSeries.forEach(function (b) {
                        var d = b.options, c = d.data;
                        d.dataSorting && d.dataSorting.enabled || !c || (c.forEach(function (d, g) {
                            c[g] = e(b, d);
                            a[g] && (c[g].x = a[g].x, c[g].index = g)
                        }), b.setData(c, !1))
                    });
                    return a
                };
                a.prototype.getProcessedData = function (a) {
                    var b = this.xData, d = this.yData, c = b.length;
                    var e = 0;
                    var g = this.xAxis, f = this.options;
                    var k = f.cropThreshold;
                    var l = a || this.getExtremesFromAll || f.getExtremesFromAll, h = this.isCartesian;
                    a = g && g.val2lin;
                    f = !(!g || !g.logarithmic);
                    var m = this.requireSorting;
                    if (g) {
                        g = g.getExtremes();
                        var p = g.min;
                        var t = g.max
                    }
                    if (h && this.sorted && !l && (!k || c > k || this.forceCrop)) if (b[c - 1] < p || b[0] > t) b = [], d = []; else if (this.yData && (b[0] < p || b[c - 1] > t)) {
                        e = this.cropData(this.xData, this.yData, p, t);
                        b = e.xData;
                        d = e.yData;
                        e = e.start;
                        var I = !0
                    }
                    for (k = b.length || 1; --k;) if (c = f ? a(b[k]) - a(b[k - 1]) : b[k] - b[k - 1], 0 < c && ("undefined" === typeof n || c < n)) var n = c; else 0 > c &&
                    m && (r(15, !1, this.chart), m = !1);
                    return {xData: b, yData: d, cropped: I, cropStart: e, closestPointRange: n}
                };
                a.prototype.processData = function (a) {
                    var b = this.xAxis;
                    if (this.isCartesian && !this.isDirty && !b.isDirty && !this.yAxis.isDirty && !a) return !1;
                    a = this.getProcessedData();
                    this.cropped = a.cropped;
                    this.cropStart = a.cropStart;
                    this.processedXData = a.xData;
                    this.processedYData = a.yData;
                    this.closestPointRange = this.basePointRange = a.closestPointRange
                };
                a.prototype.cropData = function (a, b, d, c, e) {
                    var g = a.length, f = 0, k = g, l;
                    e = z(e, this.cropShoulder);
                    for (l = 0; l < g; l++) if (a[l] >= d) {
                        f = Math.max(0, l - e);
                        break
                    }
                    for (d = l; d < g; d++) if (a[d] > c) {
                        k = d + e;
                        break
                    }
                    return {xData: a.slice(f, k), yData: b.slice(f, k), start: f, end: k}
                };
                a.prototype.generatePoints = function () {
                    var a = this.options, b = a.data, d = this.data, c, e = this.processedXData,
                        g = this.processedYData, f = this.pointClass, k = e.length, l = this.cropStart || 0,
                        h = this.hasGroupedData, r = a.keys, m = [], p;
                    a = a.dataGrouping && a.dataGrouping.groupAll ? l : 0;
                    d || h || (d = [], d.length = b.length, d = this.data = d);
                    r && h && (this.options.keys = !1);
                    for (p = 0; p < k; p++) {
                        var t =
                            l + p;
                        if (h) {
                            var n = (new f).init(this, [e[p]].concat(ia(g[p])));
                            n.dataGroup = this.groupMap[a + p];
                            n.dataGroup.options && (n.options = n.dataGroup.options, F(n, n.dataGroup.options), delete n.dataLabels)
                        } else (n = d[t]) || "undefined" === typeof b[t] || (d[t] = n = (new f).init(this, b[t], e[p]));
                        n && (n.index = h ? a + p : t, m[p] = n)
                    }
                    this.options.keys = r;
                    if (d && (k !== (c = d.length) || h)) for (p = 0; p < c; p++) p !== l || h || (p += k), d[p] && (d[p].destroyElements(), d[p].plotX = void 0);
                    this.data = d;
                    this.points = m;
                    M(this, "afterGeneratePoints")
                };
                a.prototype.getXExtremes =
                    function (a) {
                        return {min: A(a), max: K(a)}
                    };
                a.prototype.getExtremes = function (a, b) {
                    var d = this.xAxis, c = this.yAxis, e = this.processedXData || this.xData, g = [], f = 0, k = 0;
                    var l = 0;
                    var h = this.requireSorting ? this.cropShoulder : 0, p = c ? c.positiveValuesOnly : !1, r;
                    a = a || this.stackedYData || this.processedYData || [];
                    c = a.length;
                    d && (l = d.getExtremes(), k = l.min, l = l.max);
                    for (r = 0; r < c; r++) {
                        var m = e[r];
                        var t = a[r];
                        var n = (S(t) || O(t)) && (t.length || 0 < t || !p);
                        m = b || this.getExtremesFromAll || this.options.getExtremesFromAll || this.cropped || !d || (e[r +
                        h] || m) >= k && (e[r - h] || m) <= l;
                        if (n && m) if (n = t.length) for (; n--;) S(t[n]) && (g[f++] = t[n]); else g[f++] = t
                    }
                    a = {dataMin: A(g), dataMax: K(g)};
                    M(this, "afterGetExtremes", {dataExtremes: a});
                    return a
                };
                a.prototype.applyExtremes = function () {
                    var a = this.getExtremes();
                    this.dataMin = a.dataMin;
                    this.dataMax = a.dataMax;
                    return a
                };
                a.prototype.getFirstValidPoint = function (a) {
                    for (var b = null, d = a.length, c = 0; null === b && c < d;) b = a[c], c++;
                    return b
                };
                a.prototype.translate = function () {
                    this.processedXData || this.processData();
                    this.generatePoints();
                    var a = this.options, d = a.stacking, c = this.xAxis, e = c.categories, g = this.enabledDataSorting,
                        f = this.yAxis, l = this.points, h = l.length, r = !!this.modifyValue, m,
                        t = this.pointPlacementToXValue(), n = !!t, q = a.threshold, w = a.startFromThreshold ? q : 0,
                        A, v = this.zoneAxis || "y", C = Number.MAX_VALUE;
                    for (m = 0; m < h; m++) {
                        var u = l[m], F = u.x, D = u.y, J = u.low,
                            B = d && f.stacking && f.stacking.stacks[(this.negStacks && D < (w ? 0 : q) ? "-" : "") + this.stackKey],
                            x = void 0, K = void 0;
                        if (f.positiveValuesOnly && !f.validatePositiveValue(D) || c.positiveValuesOnly && !c.validatePositiveValue(F)) u.isNull =
                            !0;
                        u.plotX = A = k(p(c.translate(F, 0, 0, 0, 1, t, "flags" === this.type), -1E5, 1E5));
                        if (d && this.visible && B && B[F]) {
                            var y = this.getStackIndicator(y, F, this.index);
                            u.isNull || (x = B[F], K = x.points[y.key])
                        }
                        O(K) && (J = K[0], D = K[1], J === w && y.key === B[F].base && (J = z(S(q) && q, f.min)), f.positiveValuesOnly && 0 >= J && (J = null), u.total = u.stackTotal = x.total, u.percentage = x.total && u.y / x.total * 100, u.stackY = D, this.irregularWidths || x.setOffset(this.pointXOffset || 0, this.barW || 0));
                        u.yBottom = b(J) ? p(f.translate(J, 0, 1, 0, 1), -1E5, 1E5) : null;
                        r && (D = this.modifyValue(D,
                            u));
                        u.plotY = void 0;
                        S(D) && (D = f.translate(D, !1, !0, !1, !0), "undefined" !== typeof D && (u.plotY = p(D, -1E5, 1E5)));
                        u.isInside = this.isPointInside(u);
                        u.clientX = n ? k(c.translate(F, 0, 0, 0, 1, t)) : A;
                        u.negative = u[v] < (a[v + "Threshold"] || q || 0);
                        u.category = e && "undefined" !== typeof e[u.x] ? e[u.x] : u.x;
                        if (!u.isNull && !1 !== u.visible) {
                            "undefined" !== typeof E && (C = Math.min(C, Math.abs(A - E)));
                            var E = A
                        }
                        u.zone = this.zones.length && u.getZone();
                        !u.graphic && this.group && g && (u.isNew = !0)
                    }
                    this.closestPointRangePx = C;
                    M(this, "afterTranslate")
                };
                a.prototype.getValidPoints =
                    function (a, b, d) {
                        var c = this.chart;
                        return (a || this.points || []).filter(function (a) {
                            return b && !c.isInsidePlot(a.plotX, a.plotY, {inverted: c.inverted}) ? !1 : !1 !== a.visible && (d || !a.isNull)
                        })
                    };
                a.prototype.getClipBox = function (a, b) {
                    var d = this.options, c = this.chart, e = c.inverted, g = this.xAxis, f = g && this.yAxis,
                        k = c.options.chart.scrollablePlotArea || {};
                    a && !1 === d.clip && f ? a = e ? {
                        y: -c.chartWidth + f.len + f.pos,
                        height: c.chartWidth,
                        width: c.chartHeight,
                        x: -c.chartHeight + g.len + g.pos
                    } : {
                        y: -f.pos, height: c.chartHeight, width: c.chartWidth,
                        x: -g.pos
                    } : (a = this.clipBox || c.clipBox, b && (a.width = c.plotSizeX, a.x = (c.scrollablePixelsX || 0) * (k.scrollPositionX || 0)));
                    return b ? {width: a.width, x: a.x} : a
                };
                a.prototype.getSharedClipKey = function (a) {
                    if (this.sharedClipKey) return this.sharedClipKey;
                    var b = [a && a.duration, a && a.easing, a && a.defer, this.getClipBox(a).height, this.options.xAxis, this.options.yAxis].join();
                    if (!1 !== this.options.clip || a) this.sharedClipKey = b;
                    return b
                };
                a.prototype.setClip = function (a) {
                    var b = this.chart, d = this.options, c = b.renderer, e = b.inverted,
                        g = this.clipBox, f = this.getClipBox(a), k = this.getSharedClipKey(a), l = b.sharedClips[k],
                        h = b.sharedClips[k + "m"];
                    a && (f.width = 0, e && (f.x = b.plotHeight + (!1 !== d.clip ? 0 : b.plotTop)));
                    l ? b.hasLoaded || l.attr(f) : (a && (b.sharedClips[k + "m"] = h = c.clipRect(e ? (b.plotSizeX || 0) + 99 : -99, e ? -b.plotLeft : -b.plotTop, 99, e ? b.chartWidth : b.chartHeight)), b.sharedClips[k] = l = c.clipRect(f), l.count = {length: 0});
                    a && !l.count[this.index] && (l.count[this.index] = !0, l.count.length += 1);
                    if (!1 !== d.clip || a) this.group.clip(a || g ? l : b.clipRect), this.markerGroup.clip(h);
                    a || (l.count[this.index] && (delete l.count[this.index], --l.count.length), 0 === l.count.length && (g || (b.sharedClips[k] = l.destroy()), h && (b.sharedClips[k + "m"] = h.destroy())))
                };
                a.prototype.animate = function (a) {
                    var b = this.chart, d = f(this.options.animation), c = this.sharedClipKey;
                    if (a) this.setClip(d); else if (c) {
                        a = b.sharedClips[c];
                        c = b.sharedClips[c + "m"];
                        var e = this.getClipBox(d, !0);
                        a && a.animate(e, d);
                        c && c.animate({width: e.width + 99, x: e.x - (b.inverted ? 0 : 99)}, d)
                    }
                };
                a.prototype.afterAnimate = function () {
                    this.setClip();
                    M(this,
                        "afterAnimate");
                    this.finishedAnimating = !0
                };
                a.prototype.drawPoints = function () {
                    var a = this.points, b = this.chart, d, c, e = this.options.marker,
                        g = this[this.specialGroup] || this.markerGroup, f = this.xAxis,
                        k = z(e.enabled, !f || f.isRadial ? !0 : null, this.closestPointRangePx >= e.enabledThreshold * e.radius);
                    if (!1 !== e.enabled || this._hasPointMarkers) for (d = 0; d < a.length; d++) {
                        var l = a[d];
                        var h = (c = l.graphic) ? "animate" : "attr";
                        var p = l.marker || {};
                        var r = !!l.marker;
                        if ((k && "undefined" === typeof p.enabled || p.enabled) && !l.isNull && !1 !== l.visible) {
                            var m =
                                z(p.symbol, this.symbol, "rect");
                            var t = this.markerAttribs(l, l.selected && "select");
                            this.enabledDataSorting && (l.startXPos = f.reversed ? -(t.width || 0) : f.width);
                            var n = !1 !== l.isInside;
                            c ? c[n ? "show" : "hide"](n).animate(t) : n && (0 < (t.width || 0) || l.hasImage) && (l.graphic = c = b.renderer.symbol(m, t.x, t.y, t.width, t.height, r ? p : e).add(g), this.enabledDataSorting && b.hasRendered && (c.attr({x: l.startXPos}), h = "animate"));
                            c && "animate" === h && c[n ? "show" : "hide"](n).animate(t);
                            if (c && !b.styledMode) c[h](this.pointAttribs(l, l.selected &&
                                "select"));
                            c && c.addClass(l.getClassName(), !0)
                        } else c && (l.graphic = c.destroy())
                    }
                };
                a.prototype.markerAttribs = function (a, b) {
                    var d = this.options, c = d.marker, e = a.marker || {}, g = e.symbol || c.symbol,
                        f = z(e.radius, c.radius);
                    b && (c = c.states[b], b = e.states && e.states[b], f = z(b && b.radius, c && c.radius, f + (c && c.radiusPlus || 0)));
                    a.hasImage = g && 0 === g.indexOf("url");
                    a.hasImage && (f = 0);
                    a = {x: d.crisp ? Math.floor(a.plotX - f) : a.plotX - f, y: a.plotY - f};
                    f && (a.width = a.height = 2 * f);
                    return a
                };
                a.prototype.pointAttribs = function (a, b) {
                    var d = this.options.marker,
                        c = a && a.options, e = c && c.marker || {}, g = this.color, f = c && c.color, k = a && a.color;
                    c = z(e.lineWidth, d.lineWidth);
                    var l = a && a.zone && a.zone.color;
                    a = 1;
                    g = f || l || k || g;
                    f = e.fillColor || d.fillColor || g;
                    g = e.lineColor || d.lineColor || g;
                    b = b || "normal";
                    d = d.states[b];
                    b = e.states && e.states[b] || {};
                    c = z(b.lineWidth, d.lineWidth, c + z(b.lineWidthPlus, d.lineWidthPlus, 0));
                    f = b.fillColor || d.fillColor || f;
                    g = b.lineColor || d.lineColor || g;
                    a = z(b.opacity, d.opacity, a);
                    return {stroke: g, "stroke-width": c, fill: f, opacity: a}
                };
                a.prototype.destroy = function (a) {
                    var b =
                            this, d = b.chart, c = /AppleWebKit\/533/.test(w.navigator.userAgent), e, f, k = b.data || [],
                        l, p;
                    M(b, "destroy");
                    this.removeEvents(a);
                    (b.axisTypes || []).forEach(function (a) {
                        (p = b[a]) && p.series && (g(p.series, b), p.isDirty = p.forceRedraw = !0)
                    });
                    b.legendItem && b.chart.legend.destroyItem(b);
                    for (f = k.length; f--;) (l = k[f]) && l.destroy && l.destroy();
                    b.clips && b.clips.forEach(function (a) {
                        return a.destroy()
                    });
                    h.clearTimeout(b.animationTimeout);
                    L(b, function (a, b) {
                        a instanceof q && !a.survive && (e = c && "group" === b ? "hide" : "destroy", a[e]())
                    });
                    d.hoverSeries === b && (d.hoverSeries = void 0);
                    g(d.series, b);
                    d.orderSeries();
                    L(b, function (d, c) {
                        a && "hcEvents" === c || delete b[c]
                    })
                };
                a.prototype.applyZones = function () {
                    var a = this, b = this.chart, d = b.renderer, c = this.zones, e, g, f = this.clips || [], k,
                        l = this.graph, h = this.area, r = Math.max(b.chartWidth, b.chartHeight),
                        m = this[(this.zoneAxis || "y") + "Axis"], t = b.inverted, n, q, w, A = !1, v, u;
                    if (c.length && (l || h) && m && "undefined" !== typeof m.min) {
                        var C = m.reversed;
                        var F = m.horiz;
                        l && !this.showLine && l.hide();
                        h && h.hide();
                        var D = m.getExtremes();
                        c.forEach(function (c, I) {
                            e = C ? F ? b.plotWidth : 0 : F ? 0 : m.toPixels(D.min) || 0;
                            e = p(z(g, e), 0, r);
                            g = p(Math.round(m.toPixels(z(c.value, D.max), !0) || 0), 0, r);
                            A && (e = g = m.toPixels(D.max));
                            n = Math.abs(e - g);
                            q = Math.min(e, g);
                            w = Math.max(e, g);
                            m.isXAxis ? (k = {
                                x: t ? w : q,
                                y: 0,
                                width: n,
                                height: r
                            }, F || (k.x = b.plotHeight - k.x)) : (k = {
                                x: 0,
                                y: t ? w : q,
                                width: r,
                                height: n
                            }, F && (k.y = b.plotWidth - k.y));
                            t && d.isVML && (k = m.isXAxis ? {
                                x: 0,
                                y: C ? q : w,
                                height: k.width,
                                width: b.chartWidth
                            } : {x: k.y - b.plotLeft - b.spacingBox.x, y: 0, width: k.height, height: b.chartHeight});
                            f[I] ? f[I].animate(k) :
                                f[I] = d.clipRect(k);
                            v = a["zone-area-" + I];
                            u = a["zone-graph-" + I];
                            l && u && u.clip(f[I]);
                            h && v && v.clip(f[I]);
                            A = c.value > D.max;
                            a.resetZones && 0 === g && (g = void 0)
                        });
                        this.clips = f
                    } else a.visible && (l && l.show(!0), h && h.show(!0))
                };
                a.prototype.invertGroups = function (a) {
                    function b() {
                        ["group", "markerGroup"].forEach(function (b) {
                            d[b] && (c.renderer.isVML && d[b].attr({
                                width: d.yAxis.len,
                                height: d.xAxis.len
                            }), d[b].width = d.yAxis.len, d[b].height = d.xAxis.len, d[b].invert(d.isRadialSeries ? !1 : a))
                        })
                    }

                    var d = this, c = d.chart;
                    d.xAxis && (d.eventsToUnbind.push(v(c,
                        "resize", b)), b(), d.invertGroups = b)
                };
                a.prototype.plotGroup = function (a, d, c, e, g) {
                    var f = this[a], k = !f;
                    c = {visibility: c, zIndex: e || .1};
                    "undefined" === typeof this.opacity || this.chart.styledMode || "inactive" === this.state || (c.opacity = this.opacity);
                    k && (this[a] = f = this.chart.renderer.g().add(g));
                    f.addClass("highcharts-" + d + " highcharts-series-" + this.index + " highcharts-" + this.type + "-series " + (b(this.colorIndex) ? "highcharts-color-" + this.colorIndex + " " : "") + (this.options.className || "") + (f.hasClass("highcharts-tracker") ?
                        " highcharts-tracker" : ""), !0);
                    f.attr(c)[k ? "attr" : "animate"](this.getPlotBox());
                    return f
                };
                a.prototype.getPlotBox = function () {
                    var a = this.chart, b = this.xAxis, d = this.yAxis;
                    a.inverted && (b = d, d = this.xAxis);
                    return {
                        translateX: b ? b.left : a.plotLeft,
                        translateY: d ? d.top : a.plotTop,
                        scaleX: 1,
                        scaleY: 1
                    }
                };
                a.prototype.removeEvents = function (a) {
                    a || Q(this);
                    this.eventsToUnbind.length && (this.eventsToUnbind.forEach(function (a) {
                        a()
                    }), this.eventsToUnbind.length = 0)
                };
                a.prototype.render = function () {
                    var a = this, b = a.chart, d = a.options,
                        c = f(d.animation), e = !a.finishedAnimating && b.renderer.isSVG && c.duration,
                        g = a.visible ? "inherit" : "hidden", k = d.zIndex, l = a.hasRendered, h = b.seriesGroup,
                        p = b.inverted;
                    M(this, "render");
                    var m = a.plotGroup("group", "series", g, k, h);
                    a.markerGroup = a.plotGroup("markerGroup", "markers", g, k, h);
                    e && a.animate && a.animate(!0);
                    m.inverted = z(a.invertible, a.isCartesian) ? p : !1;
                    a.drawGraph && (a.drawGraph(), a.applyZones());
                    a.visible && a.drawPoints();
                    a.drawDataLabels && a.drawDataLabels();
                    a.redrawPoints && a.redrawPoints();
                    a.drawTracker &&
                    !1 !== a.options.enableMouseTracking && a.drawTracker();
                    a.invertGroups(p);
                    !1 === d.clip || a.sharedClipKey || l || m.clip(b.clipRect);
                    e && a.animate && a.animate();
                    l || (e && c.defer && (e += c.defer), a.animationTimeout = aa(function () {
                        a.afterAnimate()
                    }, e || 0));
                    a.isDirty = !1;
                    a.hasRendered = !0;
                    M(a, "afterRender")
                };
                a.prototype.redraw = function () {
                    var a = this.chart, b = this.isDirty || this.isDirtyData, d = this.group, c = this.xAxis,
                        e = this.yAxis;
                    d && (a.inverted && d.attr({width: a.plotWidth, height: a.plotHeight}), d.animate({
                        translateX: z(c && c.left,
                            a.plotLeft), translateY: z(e && e.top, a.plotTop)
                    }));
                    this.translate();
                    this.render();
                    b && delete this.kdTree
                };
                a.prototype.searchPoint = function (a, b) {
                    var d = this.xAxis, c = this.yAxis, e = this.chart.inverted;
                    return this.searchKDTree({
                        clientX: e ? d.len - a.chartY + d.pos : a.chartX - d.pos,
                        plotY: e ? c.len - a.chartX + c.pos : a.chartY - c.pos
                    }, b, a)
                };
                a.prototype.buildKDTree = function (a) {
                    function b(a, c, e) {
                        var g;
                        if (g = a && a.length) {
                            var f = d.kdAxisArray[c % e];
                            a.sort(function (a, b) {
                                return a[f] - b[f]
                            });
                            g = Math.floor(g / 2);
                            return {
                                point: a[g], left: b(a.slice(0,
                                    g), c + 1, e), right: b(a.slice(g + 1), c + 1, e)
                            }
                        }
                    }

                    this.buildingKdTree = !0;
                    var d = this, c = -1 < d.options.findNearestPointBy.indexOf("y") ? 2 : 1;
                    delete d.kdTree;
                    aa(function () {
                        d.kdTree = b(d.getValidPoints(null, !d.directTouch), c, c);
                        d.buildingKdTree = !1
                    }, d.options.kdNow || a && "touchstart" === a.type ? 0 : 1)
                };
                a.prototype.searchKDTree = function (a, d, c) {
                    function e(a, d, c, h) {
                        var p = d.point, m = g.kdAxisArray[c % h], r = p;
                        var t = b(a[f]) && b(p[f]) ? Math.pow(a[f] - p[f], 2) : null;
                        var n = b(a[k]) && b(p[k]) ? Math.pow(a[k] - p[k], 2) : null;
                        n = (t || 0) + (n || 0);
                        p.dist =
                            b(n) ? Math.sqrt(n) : Number.MAX_VALUE;
                        p.distX = b(t) ? Math.sqrt(t) : Number.MAX_VALUE;
                        m = a[m] - p[m];
                        n = 0 > m ? "left" : "right";
                        t = 0 > m ? "right" : "left";
                        d[n] && (n = e(a, d[n], c + 1, h), r = n[l] < r[l] ? n : p);
                        d[t] && Math.sqrt(m * m) < r[l] && (a = e(a, d[t], c + 1, h), r = a[l] < r[l] ? a : r);
                        return r
                    }

                    var g = this, f = this.kdAxisArray[0], k = this.kdAxisArray[1], l = d ? "distX" : "dist";
                    d = -1 < g.options.findNearestPointBy.indexOf("y") ? 2 : 1;
                    this.kdTree || this.buildingKdTree || this.buildKDTree(c);
                    if (this.kdTree) return e(a, this.kdTree, d, d)
                };
                a.prototype.pointPlacementToXValue =
                    function () {
                        var a = this.options, b = a.pointRange, d = this.xAxis;
                        a = a.pointPlacement;
                        "between" === a && (a = d.reversed ? -.5 : .5);
                        return S(a) ? a * (b || d.pointRange) : 0
                    };
                a.prototype.isPointInside = function (a) {
                    return "undefined" !== typeof a.plotY && "undefined" !== typeof a.plotX && 0 <= a.plotY && a.plotY <= this.yAxis.len && 0 <= a.plotX && a.plotX <= this.xAxis.len
                };
                a.prototype.drawTracker = function () {
                    var a = this, b = a.options, d = b.trackByArea, c = [].concat(d ? a.areaPath : a.graphPath),
                        e = a.chart, g = e.pointer, f = e.renderer, k = e.options.tooltip.snap, l =
                            a.tracker, h = function (b) {
                            if (e.hoverSeries !== a) a.onMouseOver()
                        }, p = "rgba(192,192,192," + (m ? .0001 : .002) + ")";
                    l ? l.attr({d: c}) : a.graph && (a.tracker = f.path(c).attr({
                        visibility: a.visible ? "visible" : "hidden",
                        zIndex: 2
                    }).addClass(d ? "highcharts-tracker-area" : "highcharts-tracker-line").add(a.group), e.styledMode || a.tracker.attr({
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        stroke: p,
                        fill: d ? p : "none",
                        "stroke-width": a.graph.strokeWidth() + (d ? 0 : 2 * k)
                    }), [a.tracker, a.markerGroup, a.dataLabelsGroup].forEach(function (a) {
                        if (a &&
                            (a.addClass("highcharts-tracker").on("mouseover", h).on("mouseout", function (a) {
                                g.onTrackerMouseOut(a)
                            }), b.cursor && !e.styledMode && a.css({cursor: b.cursor}), t)) a.on("touchstart", h)
                    }));
                    M(this, "afterDrawTracker")
                };
                a.prototype.addPoint = function (a, b, d, c, e) {
                    var g = this.options, f = this.data, k = this.chart, l = this.xAxis;
                    l = l && l.hasNames && l.names;
                    var h = g.data, p = this.xData, m;
                    b = z(b, !0);
                    var r = {series: this};
                    this.pointClass.prototype.applyOptions.apply(r, [a]);
                    var t = r.x;
                    var n = p.length;
                    if (this.requireSorting && t < p[n - 1]) for (m =
                                                                      !0; n && p[n - 1] > t;) n--;
                    this.updateParallelArrays(r, "splice", n, 0, 0);
                    this.updateParallelArrays(r, n);
                    l && r.name && (l[t] = r.name);
                    h.splice(n, 0, a);
                    m && (this.data.splice(n, 0, null), this.processData());
                    "point" === g.legendType && this.generatePoints();
                    d && (f[0] && f[0].remove ? f[0].remove(!1) : (f.shift(), this.updateParallelArrays(r, "shift"), h.shift()));
                    !1 !== e && M(this, "addPoint", {point: r});
                    this.isDirtyData = this.isDirty = !0;
                    b && k.redraw(c)
                };
                a.prototype.removePoint = function (a, b, d) {
                    var e = this, g = e.data, f = g[a], k = e.points, l = e.chart,
                        h = function () {
                            k && k.length === g.length && k.splice(a, 1);
                            g.splice(a, 1);
                            e.options.data.splice(a, 1);
                            e.updateParallelArrays(f || {series: e}, "splice", a, 1);
                            f && f.destroy();
                            e.isDirty = !0;
                            e.isDirtyData = !0;
                            b && l.redraw()
                        };
                    c(d, l);
                    b = z(b, !0);
                    f ? f.firePointEvent("remove", null, h) : h()
                };
                a.prototype.remove = function (a, b, d, c) {
                    function e() {
                        g.destroy(c);
                        f.isDirtyLegend = f.isDirtyBox = !0;
                        f.linkSeries();
                        z(a, !0) && f.redraw(b)
                    }

                    var g = this, f = g.chart;
                    !1 !== d ? M(g, "remove", null, e) : e()
                };
                a.prototype.update = function (a, b) {
                    a = d(a, this.userOptions);
                    M(this, "update", {options: a});
                    var c = this, e = c.chart, g = c.userOptions, f = c.initialType || c.type,
                        k = e.options.plotOptions, h = a.type || g.type || e.options.chart.type,
                        p = !(this.hasDerivedData || h && h !== this.type || "undefined" !== typeof a.pointStart || "undefined" !== typeof a.pointInterval || c.hasOptionChanged("dataGrouping") || c.hasOptionChanged("pointStart") || c.hasOptionChanged("pointInterval") || c.hasOptionChanged("pointIntervalUnit") || c.hasOptionChanged("keys")),
                        m = l[f].prototype, t, n = ["eventOptions", "navigatorSeries", "baseSeries"],
                        q = c.finishedAnimating && {animation: !1}, w = {};
                    h = h || f;
                    p && (n.push("data", "isDirtyData", "points", "processedXData", "processedYData", "xIncrement", "cropped", "_hasPointMarkers", "_hasPointLabels", "clips", "nodes", "layout", "mapMap", "mapData", "minY", "maxY", "minX", "maxX"), !1 !== a.visible && n.push("area", "graph"), c.parallelArrays.forEach(function (a) {
                        n.push(a + "Data")
                    }), a.data && (a.dataSorting && F(c.options.dataSorting, a.dataSorting), this.setData(a.data, !1)));
                    a = Y(g, q, {
                        index: "undefined" === typeof g.index ? c.index : g.index,
                        pointStart: z(k && k.series && k.series.pointStart, g.pointStart, c.xData[0])
                    }, !p && {data: c.options.data}, a);
                    p && a.data && (a.data = c.options.data);
                    n = ["group", "markerGroup", "dataLabelsGroup", "transformGroup"].concat(n);
                    n.forEach(function (a) {
                        n[a] = c[a];
                        delete c[a]
                    });
                    g = !1;
                    if (l[h]) {
                        if (g = h !== c.type, c.remove(!1, !1, !1, !0), g) if (Object.setPrototypeOf) Object.setPrototypeOf(c, l[h].prototype); else {
                            k = Object.hasOwnProperty.call(c, "hcEvents") && c.hcEvents;
                            for (t in m) c[t] = void 0;
                            F(c, l[h].prototype);
                            k ? c.hcEvents = k : delete c.hcEvents
                        }
                    } else r(17,
                        !0, e, {missingModuleFor: h});
                    n.forEach(function (a) {
                        c[a] = n[a]
                    });
                    c.init(e, a);
                    if (p && this.points) {
                        var A = c.options;
                        !1 === A.visible ? (w.graphic = 1, w.dataLabel = 1) : c._hasPointLabels || (a = A.marker, h = A.dataLabels, a && (!1 === a.enabled || "symbol" in a) && (w.graphic = 1), h && !1 === h.enabled && (w.dataLabel = 1));
                        this.points.forEach(function (a) {
                            a && a.series && (a.resolveColor(), Object.keys(w).length && a.destroyElements(w), !1 === A.showInLegend && a.legendItem && e.legend.destroyItem(a))
                        }, this)
                    }
                    c.initialType = f;
                    e.linkSeries();
                    g && c.linkedSeries.length &&
                    (c.isDirtyData = !0);
                    M(this, "afterUpdate");
                    z(b, !0) && e.redraw(p ? void 0 : !1)
                };
                a.prototype.setName = function (a) {
                    this.name = this.options.name = this.userOptions.name = a;
                    this.chart.isDirtyLegend = !0
                };
                a.prototype.hasOptionChanged = function (a) {
                    var b = this.options[a], d = this.chart.options.plotOptions, c = this.userOptions[a];
                    return c ? b !== c : b !== z(d && d[this.type] && d[this.type][a], d && d.series && d.series[a], b)
                };
                a.prototype.onMouseOver = function () {
                    var a = this.chart, b = a.hoverSeries;
                    a.pointer.setHoverChartIndex();
                    if (b && b !== this) b.onMouseOut();
                    this.options.events.mouseOver && M(this, "mouseOver");
                    this.setState("hover");
                    a.hoverSeries = this
                };
                a.prototype.onMouseOut = function () {
                    var a = this.options, b = this.chart, d = b.tooltip, c = b.hoverPoint;
                    b.hoverSeries = null;
                    if (c) c.onMouseOut();
                    this && a.events.mouseOut && M(this, "mouseOut");
                    !d || this.stickyTracking || d.shared && !this.noSharedTooltip || d.hide();
                    b.series.forEach(function (a) {
                        a.setState("", !0)
                    })
                };
                a.prototype.setState = function (a, b) {
                    var d = this, c = d.options, e = d.graph, g = c.inactiveOtherPoints, f = c.states, k = c.lineWidth,
                        l = c.opacity,
                        h = z(f[a || "normal"] && f[a || "normal"].animation, d.chart.options.chart.animation);
                    c = 0;
                    a = a || "";
                    if (d.state !== a && ([d.group, d.markerGroup, d.dataLabelsGroup].forEach(function (b) {
                        b && (d.state && b.removeClass("highcharts-series-" + d.state), a && b.addClass("highcharts-series-" + a))
                    }), d.state = a, !d.chart.styledMode)) {
                        if (f[a] && !1 === f[a].enabled) return;
                        a && (k = f[a].lineWidth || k + (f[a].lineWidthPlus || 0), l = z(f[a].opacity, l));
                        if (e && !e.dashstyle) for (f = {"stroke-width": k}, e.animate(f, h); d["zone-graph-" + c];) d["zone-graph-" +
                        c].animate(f, h), c += 1;
                        g || [d.group, d.markerGroup, d.dataLabelsGroup, d.labelBySeries].forEach(function (a) {
                            a && a.animate({opacity: l}, h)
                        })
                    }
                    b && g && d.points && d.setAllPointsToState(a || void 0)
                };
                a.prototype.setAllPointsToState = function (a) {
                    this.points.forEach(function (b) {
                        b.setState && b.setState(a)
                    })
                };
                a.prototype.setVisible = function (a, b) {
                    var d = this, c = d.chart, e = d.legendItem, g = c.options.chart.ignoreHiddenSeries, f = d.visible;
                    var k = (d.visible = a = d.options.visible = d.userOptions.visible = "undefined" === typeof a ? !f : a) ? "show" :
                        "hide";
                    ["group", "dataLabelsGroup", "markerGroup", "tracker", "tt"].forEach(function (a) {
                        if (d[a]) d[a][k]()
                    });
                    if (c.hoverSeries === d || (c.hoverPoint && c.hoverPoint.series) === d) d.onMouseOut();
                    e && c.legend.colorizeItem(d, a);
                    d.isDirty = !0;
                    d.options.stacking && c.series.forEach(function (a) {
                        a.options.stacking && a.visible && (a.isDirty = !0)
                    });
                    d.linkedSeries.forEach(function (b) {
                        b.setVisible(a, !1)
                    });
                    g && (c.isDirtyBox = !0);
                    M(d, k);
                    !1 !== b && c.redraw()
                };
                a.prototype.show = function () {
                    this.setVisible(!0)
                };
                a.prototype.hide = function () {
                    this.setVisible(!1)
                };
                a.prototype.select = function (a) {
                    this.selected = a = this.options.selected = "undefined" === typeof a ? !this.selected : a;
                    this.checkbox && (this.checkbox.checked = a);
                    M(this, a ? "select" : "unselect")
                };
                a.prototype.shouldShowTooltip = function (a, b, d) {
                    void 0 === d && (d = {});
                    d.series = this;
                    d.visiblePlotOnly = !0;
                    return this.chart.isInsidePlot(a, b, d)
                };
                a.defaultOptions = {
                    lineWidth: 2,
                    allowPointSelect: !1,
                    crisp: !0,
                    showCheckbox: !1,
                    animation: {duration: 1E3},
                    events: {},
                    marker: {
                        enabledThreshold: 2, lineColor: y.backgroundColor, lineWidth: 0, radius: 4,
                        states: {
                            normal: {animation: !0},
                            hover: {animation: {duration: 50}, enabled: !0, radiusPlus: 2, lineWidthPlus: 1},
                            select: {fillColor: y.neutralColor20, lineColor: y.neutralColor100, lineWidth: 2}
                        }
                    },
                    point: {events: {}},
                    dataLabels: {
                        animation: {},
                        align: "center",
                        defer: !0,
                        formatter: function () {
                            var a = this.series.chart.numberFormatter;
                            return "number" !== typeof this.y ? "" : a(this.y, -1)
                        },
                        padding: 5,
                        style: {fontSize: "11px", fontWeight: "bold", color: "contrast", textOutline: "1px contrast"},
                        verticalAlign: "bottom",
                        x: 0,
                        y: 0
                    },
                    cropThreshold: 300,
                    opacity: 1,
                    pointRange: 0,
                    softThreshold: !0,
                    states: {
                        normal: {animation: !0},
                        hover: {
                            animation: {duration: 50},
                            lineWidthPlus: 1,
                            marker: {},
                            halo: {size: 10, opacity: .25}
                        },
                        select: {animation: {duration: 0}},
                        inactive: {animation: {duration: 50}, opacity: .2}
                    },
                    stickyTracking: !0,
                    turboThreshold: 1E3,
                    findNearestPointBy: "x"
                };
                return a
            }();
            F(a.prototype, {
                axisTypes: ["xAxis", "yAxis"],
                coll: "series",
                colorCounter: 0,
                cropShoulder: 1,
                directTouch: !1,
                drawLegendSymbol: H.drawLineMarker,
                isCartesian: !0,
                kdAxisArray: ["clientX", "plotY"],
                parallelArrays: ["x",
                    "y"],
                pointClass: G,
                requireSorting: !0,
                sorted: !0
            });
            B.series = a;
            "";
            "";
            return a
        });
        L(a, "Extensions/ScrollablePlotArea.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/Axis/Axis.js"], a["Core/Chart/Chart.js"], a["Core/Series/Series.js"], a["Core/Renderer/RendererRegistry.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y) {
            var v = a.stop, B = y.addEvent, q = y.createElement, h = y.merge, f = y.pick;
            B(E, "afterSetChartSize", function (a) {
                var c = this.options.chart.scrollablePlotArea, f = c && c.minWidth;
                c = c && c.minHeight;
                if (!this.renderer.forExport) {
                    if (f) {
                        if (this.scrollablePixelsX =
                            f = Math.max(0, f - this.chartWidth)) {
                            this.scrollablePlotBox = this.renderer.scrollablePlotBox = h(this.plotBox);
                            this.plotBox.width = this.plotWidth += f;
                            this.inverted ? this.clipBox.height += f : this.clipBox.width += f;
                            var m = {1: {name: "right", value: f}}
                        }
                    } else c && (this.scrollablePixelsY = f = Math.max(0, c - this.chartHeight)) && (this.scrollablePlotBox = this.renderer.scrollablePlotBox = h(this.plotBox), this.plotBox.height = this.plotHeight += f, this.inverted ? this.clipBox.width += f : this.clipBox.height += f, m = {
                        2: {
                            name: "bottom",
                            value: f
                        }
                    });
                    m && !a.skipAxes && this.axes.forEach(function (a) {
                        m[a.side] ? a.getPlotLinePath = function () {
                            var c = m[a.side].name, e = this[c];
                            this[c] = e - m[a.side].value;
                            var f = u.prototype.getPlotLinePath.apply(this, arguments);
                            this[c] = e;
                            return f
                        } : (a.setAxisSize(), a.setAxisTranslation())
                    })
                }
            });
            B(E, "render", function () {
                this.scrollablePixelsX || this.scrollablePixelsY ? (this.setUpScrolling && this.setUpScrolling(), this.applyFixed()) : this.fixedDiv && this.applyFixed()
            });
            E.prototype.setUpScrolling = function () {
                var a = this, e = {
                    WebkitOverflowScrolling: "touch",
                    overflowX: "hidden", overflowY: "hidden"
                };
                this.scrollablePixelsX && (e.overflowX = "auto");
                this.scrollablePixelsY && (e.overflowY = "auto");
                this.scrollingParent = q("div", {className: "highcharts-scrolling-parent"}, {position: "relative"}, this.renderTo);
                this.scrollingContainer = q("div", {className: "highcharts-scrolling"}, e, this.scrollingParent);
                B(this.scrollingContainer, "scroll", function () {
                    a.pointer && delete a.pointer.chartPosition
                });
                this.innerContainer = q("div", {className: "highcharts-inner-container"}, null, this.scrollingContainer);
                this.innerContainer.appendChild(this.container);
                this.setUpScrolling = null
            };
            E.prototype.moveFixedElements = function () {
                var a = this.container, e = this.fixedRenderer,
                    f = ".highcharts-contextbutton .highcharts-credits .highcharts-legend .highcharts-legend-checkbox .highcharts-navigator-series .highcharts-navigator-xaxis .highcharts-navigator-yaxis .highcharts-navigator .highcharts-reset-zoom .highcharts-drillup-button .highcharts-scrollbar .highcharts-subtitle .highcharts-title".split(" "),
                    h;
                this.scrollablePixelsX &&
                !this.inverted ? h = ".highcharts-yaxis" : this.scrollablePixelsX && this.inverted ? h = ".highcharts-xaxis" : this.scrollablePixelsY && !this.inverted ? h = ".highcharts-xaxis" : this.scrollablePixelsY && this.inverted && (h = ".highcharts-yaxis");
                h && f.push(h + ":not(.highcharts-radial-axis)", h + "-labels:not(.highcharts-radial-axis-labels)");
                f.forEach(function (c) {
                    [].forEach.call(a.querySelectorAll(c), function (a) {
                        (a.namespaceURI === e.SVG_NS ? e.box : e.box.parentNode).appendChild(a);
                        a.style.pointerEvents = "auto"
                    })
                })
            };
            E.prototype.applyFixed =
                function () {
                    var a = !this.fixedDiv, e = this.options.chart, h = e.scrollablePlotArea, m = x.getRendererType();
                    a ? (this.fixedDiv = q("div", {className: "highcharts-fixed"}, {
                        position: "absolute",
                        overflow: "hidden",
                        pointerEvents: "none",
                        zIndex: (e.style && e.style.zIndex || 0) + 2,
                        top: 0
                    }, null, !0), this.scrollingContainer && this.scrollingContainer.parentNode.insertBefore(this.fixedDiv, this.scrollingContainer), this.renderTo.style.overflow = "visible", this.fixedRenderer = e = new m(this.fixedDiv, this.chartWidth, this.chartHeight, this.options.chart.style),
                        this.scrollableMask = e.path().attr({
                            fill: this.options.chart.backgroundColor || "#fff",
                            "fill-opacity": f(h.opacity, .85),
                            zIndex: -1
                        }).addClass("highcharts-scrollable-mask").add(), B(this, "afterShowResetZoom", this.moveFixedElements), B(this, "afterDrilldown", this.moveFixedElements), B(this, "afterLayOutTitles", this.moveFixedElements)) : this.fixedRenderer.setSize(this.chartWidth, this.chartHeight);
                    if (this.scrollableDirty || a) this.scrollableDirty = !1, this.moveFixedElements();
                    e = this.chartWidth + (this.scrollablePixelsX ||
                        0);
                    m = this.chartHeight + (this.scrollablePixelsY || 0);
                    v(this.container);
                    this.container.style.width = e + "px";
                    this.container.style.height = m + "px";
                    this.renderer.boxWrapper.attr({width: e, height: m, viewBox: [0, 0, e, m].join(" ")});
                    this.chartBackground.attr({width: e, height: m});
                    this.scrollingContainer.style.height = this.chartHeight + "px";
                    a && (h.scrollPositionX && (this.scrollingContainer.scrollLeft = this.scrollablePixelsX * h.scrollPositionX), h.scrollPositionY && (this.scrollingContainer.scrollTop = this.scrollablePixelsY * h.scrollPositionY));
                    m = this.axisOffset;
                    a = this.plotTop - m[0] - 1;
                    h = this.plotLeft - m[3] - 1;
                    e = this.plotTop + this.plotHeight + m[2] + 1;
                    m = this.plotLeft + this.plotWidth + m[1] + 1;
                    var w = this.plotLeft + this.plotWidth - (this.scrollablePixelsX || 0),
                        n = this.plotTop + this.plotHeight - (this.scrollablePixelsY || 0);
                    a = this.scrollablePixelsX ? [["M", 0, a], ["L", this.plotLeft - 1, a], ["L", this.plotLeft - 1, e], ["L", 0, e], ["Z"], ["M", w, a], ["L", this.chartWidth, a], ["L", this.chartWidth, e], ["L", w, e], ["Z"]] : this.scrollablePixelsY ? [["M", h, 0], ["L", h, this.plotTop - 1], ["L", m, this.plotTop -
                    1], ["L", m, 0], ["Z"], ["M", h, n], ["L", h, this.chartHeight], ["L", m, this.chartHeight], ["L", m, n], ["Z"]] : [["M", 0, 0]];
                    "adjustHeight" !== this.redrawTrigger && this.scrollableMask.attr({d: a})
                };
            B(u, "afterInit", function () {
                this.chart.scrollableDirty = !0
            });
            B(H, "show", function () {
                this.chart.scrollableDirty = !0
            });
            ""
        });
        L(a, "Core/Axis/StackingAxis.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = a.getDeferredAnimation, H = u.addEvent, x = u.destroyObjectProperties, y = u.fireEvent,
                G = u.isNumber,
                B = u.objectEach, q = function () {
                    function a(a) {
                        this.oldStacks = {};
                        this.stacks = {};
                        this.stacksTouched = 0;
                        this.axis = a
                    }

                    a.prototype.buildStacks = function () {
                        var a = this.axis, c = a.series, e = a.options.reversedStacks, h = c.length, m;
                        if (!a.isXAxis) {
                            this.usePercentage = !1;
                            for (m = h; m--;) {
                                var q = c[e ? m : h - m - 1];
                                q.setStackedPoints();
                                q.setGroupedPoints()
                            }
                            for (m = 0; m < h; m++) c[m].modifyStacks();
                            y(a, "afterBuildStacks")
                        }
                    };
                    a.prototype.cleanStacks = function () {
                        if (!this.axis.isXAxis) {
                            if (this.oldStacks) var a = this.stacks = this.oldStacks;
                            B(a, function (a) {
                                B(a,
                                    function (a) {
                                        a.cumulative = a.total
                                    })
                            })
                        }
                    };
                    a.prototype.resetStacks = function () {
                        var a = this, c = this.stacks;
                        this.axis.isXAxis || B(c, function (c) {
                            B(c, function (e, f) {
                                G(e.touched) && e.touched < a.stacksTouched ? (e.destroy(), delete c[f]) : (e.total = null, e.cumulative = null)
                            })
                        })
                    };
                    a.prototype.renderStackTotals = function () {
                        var a = this.axis, c = a.chart, e = c.renderer, h = this.stacks;
                        a = v(c, a.options.stackLabels && a.options.stackLabels.animation || !1);
                        var m = this.stackTotalGroup = this.stackTotalGroup || e.g("stack-labels").attr({
                            visibility: "visible",
                            zIndex: 6, opacity: 0
                        }).add();
                        m.translate(c.plotLeft, c.plotTop);
                        B(h, function (a) {
                            B(a, function (a) {
                                a.render(m)
                            })
                        });
                        m.animate({opacity: 1}, a)
                    };
                    return a
                }();
            return function () {
                function a() {
                }

                a.compose = function (f) {
                    H(f, "init", a.onInit);
                    H(f, "destroy", a.onDestroy)
                };
                a.onDestroy = function () {
                    var a = this.stacking;
                    if (a) {
                        var c = a.stacks;
                        B(c, function (a, f) {
                            x(a);
                            c[f] = null
                        });
                        a && a.stackTotalGroup && a.stackTotalGroup.destroy()
                    }
                };
                a.onInit = function () {
                    this.stacking || (this.stacking = new q(this))
                };
                return a
            }()
        });
        L(a, "Extensions/Stacking.js",
            [a["Core/Axis/Axis.js"], a["Core/Chart/Chart.js"], a["Core/FormatUtilities.js"], a["Core/Globals.js"], a["Core/Series/Series.js"], a["Core/Axis/StackingAxis.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y, G) {
                var v = E.format, q = G.correctFloat, h = G.defined, f = G.destroyObjectProperties, c = G.isArray,
                    e = G.isNumber, t = G.objectEach, m = G.pick, w = function () {
                        function a(a, c, e, f, h) {
                            var d = a.chart.inverted;
                            this.axis = a;
                            this.isNegative = e;
                            this.options = c = c || {};
                            this.x = f;
                            this.total = null;
                            this.points = {};
                            this.hasValidPoints = !1;
                            this.stack =
                                h;
                            this.rightCliff = this.leftCliff = 0;
                            this.alignOptions = {
                                align: c.align || (d ? e ? "left" : "right" : "center"),
                                verticalAlign: c.verticalAlign || (d ? "middle" : e ? "bottom" : "top"),
                                y: c.y,
                                x: c.x
                            };
                            this.textAlign = c.textAlign || (d ? e ? "right" : "left" : "center")
                        }

                        a.prototype.destroy = function () {
                            f(this, this.axis)
                        };
                        a.prototype.render = function (a) {
                            var c = this.axis.chart, e = this.options, f = e.format;
                            f = f ? v(f, this, c) : e.formatter.call(this);
                            this.label ? this.label.attr({
                                text: f,
                                visibility: "hidden"
                            }) : (this.label = c.renderer.label(f, null, null, e.shape,
                                null, null, e.useHTML, !1, "stack-labels"), f = {
                                r: e.borderRadius || 0,
                                text: f,
                                rotation: e.rotation,
                                padding: m(e.padding, 5),
                                visibility: "hidden"
                            }, c.styledMode || (f.fill = e.backgroundColor, f.stroke = e.borderColor, f["stroke-width"] = e.borderWidth, this.label.css(e.style)), this.label.attr(f), this.label.added || this.label.add(a));
                            this.label.labelrank = c.plotSizeY
                        };
                        a.prototype.setOffset = function (a, c, f, n, p) {
                            var d = this.axis, k = d.chart;
                            n = d.translate(d.stacking.usePercentage ? 100 : n ? n : this.total, 0, 0, 0, 1);
                            f = d.translate(f ? f : 0);
                            f =
                                h(n) && Math.abs(n - f);
                            a = m(p, k.xAxis[0].translate(this.x)) + a;
                            d = h(n) && this.getStackBox(k, this, a, n, c, f, d);
                            c = this.label;
                            f = this.isNegative;
                            a = "justify" === m(this.options.overflow, "justify");
                            var b = this.textAlign;
                            c && d && (p = c.getBBox(), n = c.padding, b = "left" === b ? k.inverted ? -n : n : "right" === b ? p.width : k.inverted && "center" === b ? p.width / 2 : k.inverted ? f ? p.width + n : -n : p.width / 2, f = k.inverted ? p.height / 2 : f ? -n : p.height, this.alignOptions.x = m(this.options.x, 0), this.alignOptions.y = m(this.options.y, 0), d.x -= b, d.y -= f, c.align(this.alignOptions,
                                null, d), k.isInsidePlot(c.alignAttr.x + b - this.alignOptions.x, c.alignAttr.y + f - this.alignOptions.y) ? c.show() : (c.alignAttr.y = -9999, a = !1), a && x.prototype.justifyDataLabel.call(this.axis, c, this.alignOptions, c.alignAttr, p, d), c.attr({
                                x: c.alignAttr.x,
                                y: c.alignAttr.y
                            }), m(!a && this.options.crop, !0) && ((k = e(c.x) && e(c.y) && k.isInsidePlot(c.x - n + c.width, c.y) && k.isInsidePlot(c.x + n, c.y)) || c.hide()))
                        };
                        a.prototype.getStackBox = function (a, c, e, f, h, d, k) {
                            var b = c.axis.reversed, g = a.inverted, l = k.height + k.pos - (g ? a.plotLeft : a.plotTop);
                            c = c.isNegative && !b || !c.isNegative && b;
                            return {
                                x: g ? c ? f - k.right : f - d + k.pos - a.plotLeft : e + a.xAxis[0].transB - a.plotLeft,
                                y: g ? k.height - e - h : c ? l - f - d : l - f,
                                width: g ? d : h,
                                height: g ? h : d
                            }
                        };
                        return a
                    }();
                u.prototype.getStacks = function () {
                    var a = this, c = a.inverted;
                    a.yAxis.forEach(function (a) {
                        a.stacking && a.stacking.stacks && a.hasVisibleSeries && (a.stacking.oldStacks = a.stacking.stacks)
                    });
                    a.series.forEach(function (e) {
                        var f = e.xAxis && e.xAxis.options || {};
                        !e.options.stacking || !0 !== e.visible && !1 !== a.options.chart.ignoreHiddenSeries ||
                        (e.stackKey = [e.type, m(e.options.stack, ""), c ? f.top : f.left, c ? f.height : f.width].join())
                    })
                };
                y.compose(a);
                x.prototype.setGroupedPoints = function () {
                    var a = this.yAxis.stacking;
                    this.options.centerInCategory && (this.is("column") || this.is("columnrange")) && !this.options.stacking && 1 < this.chart.series.length ? x.prototype.setStackedPoints.call(this, "group") : a && t(a.stacks, function (c, e) {
                        "group" === e.slice(-5) && (t(c, function (a) {
                            return a.destroy()
                        }), delete a.stacks[e])
                    })
                };
                x.prototype.setStackedPoints = function (a) {
                    var e =
                        a || this.options.stacking;
                    if (e && (!0 === this.visible || !1 === this.chart.options.chart.ignoreHiddenSeries)) {
                        var f = this.processedXData, n = this.processedYData, t = [], p = n.length, d = this.options,
                            k = d.threshold, b = m(d.startFromThreshold && k, 0);
                        d = d.stack;
                        a = a ? this.type + "," + e : this.stackKey;
                        var g = "-" + a, r = this.negStacks, v = this.yAxis, u = v.stacking.stacks,
                            B = v.stacking.oldStacks, C, x;
                        v.stacking.stacksTouched += 1;
                        for (x = 0; x < p; x++) {
                            var y = f[x];
                            var E = n[x];
                            var G = this.getStackIndicator(G, y, this.index);
                            var H = G.key;
                            var z = (C = r && E < (b ? 0 :
                                k)) ? g : a;
                            u[z] || (u[z] = {});
                            u[z][y] || (B[z] && B[z][y] ? (u[z][y] = B[z][y], u[z][y].total = null) : u[z][y] = new w(v, v.options.stackLabels, C, y, d));
                            z = u[z][y];
                            null !== E ? (z.points[H] = z.points[this.index] = [m(z.cumulative, b)], h(z.cumulative) || (z.base = H), z.touched = v.stacking.stacksTouched, 0 < G.index && !1 === this.singleStacks && (z.points[H][0] = z.points[this.index + "," + y + ",0"][0])) : z.points[H] = z.points[this.index] = null;
                            "percent" === e ? (C = C ? a : g, r && u[C] && u[C][y] ? (C = u[C][y], z.total = C.total = Math.max(C.total, z.total) + Math.abs(E) || 0) :
                                z.total = q(z.total + (Math.abs(E) || 0))) : "group" === e ? (c(E) && (E = E[0]), null !== E && (z.total = (z.total || 0) + 1)) : z.total = q(z.total + (E || 0));
                            z.cumulative = "group" === e ? (z.total || 1) - 1 : m(z.cumulative, b) + (E || 0);
                            null !== E && (z.points[H].push(z.cumulative), t[x] = z.cumulative, z.hasValidPoints = !0)
                        }
                        "percent" === e && (v.stacking.usePercentage = !0);
                        "group" !== e && (this.stackedYData = t);
                        v.stacking.oldStacks = {}
                    }
                };
                x.prototype.modifyStacks = function () {
                    var a = this, c = a.stackKey, e = a.yAxis.stacking.stacks, f = a.processedXData, h,
                        p = a.options.stacking;
                    a[p + "Stacker"] && [c, "-" + c].forEach(function (d) {
                        for (var c = f.length, b, g; c--;) if (b = f[c], h = a.getStackIndicator(h, b, a.index, d), g = (b = e[d] && e[d][b]) && b.points[h.key]) a[p + "Stacker"](g, b, c)
                    })
                };
                x.prototype.percentStacker = function (a, c, e) {
                    c = c.total ? 100 / c.total : 0;
                    a[0] = q(a[0] * c);
                    a[1] = q(a[1] * c);
                    this.stackedYData[e] = a[1]
                };
                x.prototype.getStackIndicator = function (a, c, e, f) {
                    !h(a) || a.x !== c || f && a.key !== f ? a = {x: c, index: 0, key: f} : a.index++;
                    a.key = [e, c, a.index].join();
                    return a
                };
                H.StackItem = w;
                "";
                return H.StackItem
            });
        L(a, "Series/Line/LineSeries.js",
            [a["Core/Color/Palette.js"], a["Core/Series/Series.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, u, E, H) {
                var v = this && this.__extends || function () {
                        var a = function (q, h) {
                            a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, c) {
                                a.__proto__ = c
                            } || function (a, c) {
                                for (var e in c) c.hasOwnProperty(e) && (a[e] = c[e])
                            };
                            return a(q, h)
                        };
                        return function (q, h) {
                            function f() {
                                this.constructor = q
                            }

                            a(q, h);
                            q.prototype = null === h ? Object.create(h) : (f.prototype = h.prototype, new f)
                        }
                    }(), y = H.defined,
                    G = H.merge;
                H = function (B) {
                    function q() {
                        var a = null !== B && B.apply(this, arguments) || this;
                        a.data = void 0;
                        a.options = void 0;
                        a.points = void 0;
                        return a
                    }

                    v(q, B);
                    q.prototype.drawGraph = function () {
                        var h = this, f = this.options, c = (this.gappedPath || this.getGraphPath).call(this),
                            e = this.chart.styledMode, t = [["graph", "highcharts-graph"]];
                        e || t[0].push(f.lineColor || this.color || a.neutralColor20, f.dashStyle);
                        t = h.getZonesGraphs(t);
                        t.forEach(function (a, t) {
                            var m = a[0], l = h[m], q = l ? "animate" : "attr";
                            l ? (l.endX = h.preventGraphAnimation ? null :
                                c.xMap, l.animate({d: c})) : c.length && (h[m] = l = h.chart.renderer.path(c).addClass(a[1]).attr({zIndex: 1}).add(h.group));
                            l && !e && (m = {
                                stroke: a[2],
                                "stroke-width": f.lineWidth,
                                fill: h.fillGraph && h.color || "none"
                            }, a[3] ? m.dashstyle = a[3] : "square" !== f.linecap && (m["stroke-linecap"] = m["stroke-linejoin"] = "round"), l[q](m).shadow(2 > t && f.shadow));
                            l && (l.startX = c.xMap, l.isArea = c.isArea)
                        })
                    };
                    q.prototype.getGraphPath = function (a, f, c) {
                        var e = this, h = e.options, m = h.step, q, n = [], l = [], v;
                        a = a || e.points;
                        (q = a.reversed) && a.reverse();
                        (m = {
                            right: 1,
                            center: 2
                        }[m] || m && 3) && q && (m = 4 - m);
                        a = this.getValidPoints(a, !1, !(h.connectNulls && !f && !c));
                        a.forEach(function (t, q) {
                            var p = t.plotX, d = t.plotY, k = a[q - 1];
                            (t.leftCliff || k && k.rightCliff) && !c && (v = !0);
                            t.isNull && !y(f) && 0 < q ? v = !h.connectNulls : t.isNull && !f ? v = !0 : (0 === q || v ? q = [["M", t.plotX, t.plotY]] : e.getPointSpline ? q = [e.getPointSpline(a, t, q)] : m ? (q = 1 === m ? [["L", k.plotX, d]] : 2 === m ? [["L", (k.plotX + p) / 2, k.plotY], ["L", (k.plotX + p) / 2, d]] : [["L", p, k.plotY]], q.push(["L", p, d])) : q = [["L", p, d]], l.push(t.x), m && (l.push(t.x), 2 === m && l.push(t.x)),
                                n.push.apply(n, q), v = !1)
                        });
                        n.xMap = l;
                        return e.graphPath = n
                    };
                    q.prototype.getZonesGraphs = function (a) {
                        this.zones.forEach(function (f, c) {
                            c = ["zone-graph-" + c, "highcharts-graph highcharts-zone-graph-" + c + " " + (f.className || "")];
                            this.chart.styledMode || c.push(f.color || this.color, f.dashStyle || this.options.dashStyle);
                            a.push(c)
                        }, this);
                        return a
                    };
                    q.defaultOptions = G(u.defaultOptions, {});
                    return q
                }(u);
                E.registerSeriesType("line", H);
                "";
                return H
            });
        L(a, "Series/Area/AreaSeries.js", [a["Core/Color/Color.js"], a["Mixins/LegendSymbol.js"],
            a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, u, E, H) {
            var v = this && this.__extends || function () {
                var a = function (c, e) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, c) {
                        a.__proto__ = c
                    } || function (a, c) {
                        for (var e in c) c.hasOwnProperty(e) && (a[e] = c[e])
                    };
                    return a(c, e)
                };
                return function (c, e) {
                    function f() {
                        this.constructor = c
                    }

                    a(c, e);
                    c.prototype = null === e ? Object.create(e) : (f.prototype = e.prototype, new f)
                }
            }(), y = a.parse, G = E.seriesTypes.line;
            a = H.extend;
            var B = H.merge, q = H.objectEach,
                h = H.pick;
            H = function (a) {
                function c() {
                    var c = null !== a && a.apply(this, arguments) || this;
                    c.data = void 0;
                    c.options = void 0;
                    c.points = void 0;
                    return c
                }

                v(c, a);
                c.prototype.drawGraph = function () {
                    this.areaPath = [];
                    a.prototype.drawGraph.apply(this);
                    var c = this, f = this.areaPath, m = this.options,
                        q = [["area", "highcharts-area", this.color, m.fillColor]];
                    this.zones.forEach(function (a, e) {
                        q.push(["zone-area-" + e, "highcharts-area highcharts-zone-area-" + e + " " + a.className, a.color || c.color, a.fillColor || m.fillColor])
                    });
                    q.forEach(function (a) {
                        var e =
                            a[0], t = c[e], n = t ? "animate" : "attr", q = {};
                        t ? (t.endX = c.preventGraphAnimation ? null : f.xMap, t.animate({d: f})) : (q.zIndex = 0, t = c[e] = c.chart.renderer.path(f).addClass(a[1]).add(c.group), t.isArea = !0);
                        c.chart.styledMode || (q.fill = h(a[3], y(a[2]).setOpacity(h(m.fillOpacity, .75)).get()));
                        t[n](q);
                        t.startX = f.xMap;
                        t.shiftUnit = m.step ? 2 : 1
                    })
                };
                c.prototype.getGraphPath = function (a) {
                    var c = G.prototype.getGraphPath, e = this.options, f = e.stacking, n = this.yAxis, l, q = [],
                        v = [], u = this.index, p = n.stacking.stacks[this.stackKey], d = e.threshold,
                        k = Math.round(n.getThreshold(e.threshold));
                    e = h(e.connectNulls, "percent" === f);
                    var b = function (b, c, e) {
                        var g = a[b];
                        b = f && p[g.x].points[u];
                        var h = g[e + "Null"] || 0;
                        e = g[e + "Cliff"] || 0;
                        g = !0;
                        if (e || h) {
                            var l = (h ? b[0] : b[1]) + e;
                            var m = b[0] + e;
                            g = !!h
                        } else !f && a[c] && a[c].isNull && (l = m = d);
                        "undefined" !== typeof l && (v.push({
                            plotX: r,
                            plotY: null === l ? k : n.getThreshold(l),
                            isNull: g,
                            isCliff: !0
                        }), q.push({plotX: r, plotY: null === m ? k : n.getThreshold(m), doCurve: !1}))
                    };
                    a = a || this.points;
                    f && (a = this.getStackPoints(a));
                    for (l = 0; l < a.length; l++) {
                        f || (a[l].leftCliff =
                            a[l].rightCliff = a[l].leftNull = a[l].rightNull = void 0);
                        var g = a[l].isNull;
                        var r = h(a[l].rectPlotX, a[l].plotX);
                        var F = f ? h(a[l].yBottom, k) : k;
                        if (!g || e) e || b(l, l - 1, "left"), g && !f && e || (v.push(a[l]), q.push({
                            x: l,
                            plotX: r,
                            plotY: F
                        })), e || b(l, l + 1, "right")
                    }
                    l = c.call(this, v, !0, !0);
                    q.reversed = !0;
                    g = c.call(this, q, !0, !0);
                    (F = g[0]) && "M" === F[0] && (g[0] = ["L", F[1], F[2]]);
                    g = l.concat(g);
                    g.length && g.push(["Z"]);
                    c = c.call(this, v, !1, e);
                    g.xMap = l.xMap;
                    this.areaPath = g;
                    return c
                };
                c.prototype.getStackPoints = function (a) {
                    var c = this, e = [], f = [],
                        n = this.xAxis, l = this.yAxis, v = l.stacking.stacks[this.stackKey], u = {}, A = l.series,
                        p = A.length, d = l.options.reversedStacks ? 1 : -1, k = A.indexOf(c);
                    a = a || this.points;
                    if (this.options.stacking) {
                        for (var b = 0; b < a.length; b++) a[b].leftNull = a[b].rightNull = void 0, u[a[b].x] = a[b];
                        q(v, function (a, b) {
                            null !== a.total && f.push(b)
                        });
                        f.sort(function (a, b) {
                            return a - b
                        });
                        var g = A.map(function (a) {
                            return a.visible
                        });
                        f.forEach(function (a, b) {
                            var r = 0, m, t;
                            if (u[a] && !u[a].isNull) e.push(u[a]), [-1, 1].forEach(function (e) {
                                var h = 1 === e ? "rightNull" :
                                    "leftNull", l = 0, r = v[f[b + e]];
                                if (r) for (var n = k; 0 <= n && n < p;) {
                                    var q = A[n].index;
                                    m = r.points[q];
                                    m || (q === c.index ? u[a][h] = !0 : g[n] && (t = v[a].points[q]) && (l -= t[1] - t[0]));
                                    n += d
                                }
                                u[a][1 === e ? "rightCliff" : "leftCliff"] = l
                            }); else {
                                for (var q = k; 0 <= q && q < p;) {
                                    if (m = v[a].points[A[q].index]) {
                                        r = m[1];
                                        break
                                    }
                                    q += d
                                }
                                r = h(r, 0);
                                r = l.translate(r, 0, 1, 0, 1);
                                e.push({isNull: !0, plotX: n.translate(a, 0, 0, 0, 1), x: a, plotY: r, yBottom: r})
                            }
                        })
                    }
                    return e
                };
                c.defaultOptions = B(G.defaultOptions, {threshold: 0});
                return c
            }(G);
            a(H.prototype, {singleStacks: !1, drawLegendSymbol: u.drawRectangle});
            E.registerSeriesType("area", H);
            "";
            return H
        });
        L(a, "Series/Spline/SplineSeries.js", [a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, u) {
            var v = this && this.__extends || function () {
                var a = function (v, q) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, f) {
                        a.__proto__ = f
                    } || function (a, f) {
                        for (var c in f) f.hasOwnProperty(c) && (a[c] = f[c])
                    };
                    return a(v, q)
                };
                return function (v, q) {
                    function h() {
                        this.constructor = v
                    }

                    a(v, q);
                    v.prototype = null === q ? Object.create(q) : (h.prototype = q.prototype,
                        new h)
                }
            }(), H = a.seriesTypes.line, x = u.merge, y = u.pick;
            u = function (a) {
                function u() {
                    var q = null !== a && a.apply(this, arguments) || this;
                    q.data = void 0;
                    q.options = void 0;
                    q.points = void 0;
                    return q
                }

                v(u, a);
                u.prototype.getPointSpline = function (a, h, f) {
                    var c = h.plotX || 0, e = h.plotY || 0, t = a[f - 1];
                    f = a[f + 1];
                    if (t && !t.isNull && !1 !== t.doCurve && !h.isCliff && f && !f.isNull && !1 !== f.doCurve && !h.isCliff) {
                        a = t.plotY || 0;
                        var m = f.plotX || 0;
                        f = f.plotY || 0;
                        var q = 0;
                        var n = (1.5 * c + (t.plotX || 0)) / 2.5;
                        var l = (1.5 * e + a) / 2.5;
                        m = (1.5 * c + m) / 2.5;
                        var v = (1.5 * e + f) / 2.5;
                        m !== n && (q = (v - l) * (m - c) / (m - n) + e - v);
                        l += q;
                        v += q;
                        l > a && l > e ? (l = Math.max(a, e), v = 2 * e - l) : l < a && l < e && (l = Math.min(a, e), v = 2 * e - l);
                        v > f && v > e ? (v = Math.max(f, e), l = 2 * e - v) : v < f && v < e && (v = Math.min(f, e), l = 2 * e - v);
                        h.rightContX = m;
                        h.rightContY = v
                    }
                    h = ["C", y(t.rightContX, t.plotX, 0), y(t.rightContY, t.plotY, 0), y(n, c, 0), y(l, e, 0), c, e];
                    t.rightContX = t.rightContY = void 0;
                    return h
                };
                u.defaultOptions = x(H.defaultOptions);
                return u
            }(H);
            a.registerSeriesType("spline", u);
            "";
            return u
        });
        L(a, "Series/AreaSpline/AreaSplineSeries.js", [a["Series/Area/AreaSeries.js"],
            a["Series/Spline/SplineSeries.js"], a["Mixins/LegendSymbol.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, u, E, H, x) {
            var v = this && this.__extends || function () {
                var a = function (f, c) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, c) {
                        a.__proto__ = c
                    } || function (a, c) {
                        for (var e in c) c.hasOwnProperty(e) && (a[e] = c[e])
                    };
                    return a(f, c)
                };
                return function (f, c) {
                    function e() {
                        this.constructor = f
                    }

                    a(f, c);
                    f.prototype = null === c ? Object.create(c) : (e.prototype = c.prototype, new e)
                }
            }(), G =
                a.prototype, B = x.extend, q = x.merge;
            x = function (h) {
                function f() {
                    var a = null !== h && h.apply(this, arguments) || this;
                    a.data = void 0;
                    a.points = void 0;
                    a.options = void 0;
                    return a
                }

                v(f, h);
                f.defaultOptions = q(u.defaultOptions, a.defaultOptions);
                return f
            }(u);
            B(x.prototype, {
                getGraphPath: G.getGraphPath,
                getStackPoints: G.getStackPoints,
                drawGraph: G.drawGraph,
                drawLegendSymbol: E.drawRectangle
            });
            H.registerSeriesType("areaspline", x);
            "";
            return x
        });
        L(a, "Series/Column/ColumnSeries.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/Color/Color.js"],
            a["Core/Globals.js"], a["Mixins/LegendSymbol.js"], a["Core/Color/Palette.js"], a["Core/Series/Series.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y, G, B) {
            var q = this && this.__extends || function () {
                var a = function (d, b) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, b) {
                        a.__proto__ = b
                    } || function (a, b) {
                        for (var d in b) b.hasOwnProperty(d) && (a[d] = b[d])
                    };
                    return a(d, b)
                };
                return function (d, b) {
                    function c() {
                        this.constructor = d
                    }

                    a(d, b);
                    d.prototype = null === b ? Object.create(b) :
                        (c.prototype = b.prototype, new c)
                }
            }(), h = a.animObject, f = u.parse, c = E.hasTouch;
            a = E.noop;
            var e = B.clamp, t = B.css, m = B.defined, v = B.extend, n = B.fireEvent, l = B.isArray, J = B.isNumber,
                K = B.merge, A = B.pick, p = B.objectEach;
            B = function (a) {
                function d() {
                    var b = null !== a && a.apply(this, arguments) || this;
                    b.borderWidth = void 0;
                    b.data = void 0;
                    b.group = void 0;
                    b.options = void 0;
                    b.points = void 0;
                    return b
                }

                q(d, a);
                d.prototype.animate = function (a) {
                    var b = this, d = this.yAxis, c = b.options, f = this.chart.inverted, k = {},
                        l = f ? "translateX" : "translateY";
                    if (a) k.scaleY =
                        .001, a = e(d.toPixels(c.threshold), d.pos, d.pos + d.len), f ? k.translateX = a - d.len : k.translateY = a, b.clipBox && b.setClip(), b.group.attr(k); else {
                        var p = Number(b.group.attr(l));
                        b.group.animate({scaleY: 1}, v(h(b.options.animation), {
                            step: function (a, c) {
                                b.group && (k[l] = p + c.pos * (d.pos - p), b.group.attr(k))
                            }
                        }))
                    }
                };
                d.prototype.init = function (b, d) {
                    a.prototype.init.apply(this, arguments);
                    var c = this;
                    b = c.chart;
                    b.hasRendered && b.series.forEach(function (a) {
                        a.type === c.type && (a.isDirty = !0)
                    })
                };
                d.prototype.getColumnMetrics = function () {
                    var a =
                        this, d = a.options, c = a.xAxis, e = a.yAxis, f = c.options.reversedStacks;
                    f = c.reversed && !f || !c.reversed && f;
                    var k, l = {}, h = 0;
                    !1 === d.grouping ? h = 1 : a.chart.series.forEach(function (b) {
                        var d = b.yAxis, c = b.options;
                        if (b.type === a.type && (b.visible || !a.chart.options.chart.ignoreHiddenSeries) && e.len === d.len && e.pos === d.pos) {
                            if (c.stacking && "group" !== c.stacking) {
                                k = b.stackKey;
                                "undefined" === typeof l[k] && (l[k] = h++);
                                var f = l[k]
                            } else !1 !== c.grouping && (f = h++);
                            b.columnIndex = f
                        }
                    });
                    var p = Math.min(Math.abs(c.transA) * (c.ordinal && c.ordinal.slope ||
                            d.pointRange || c.closestPointRange || c.tickInterval || 1), c.len), m = p * d.groupPadding,
                        t = (p - 2 * m) / (h || 1);
                    d = Math.min(d.maxPointWidth || c.len, A(d.pointWidth, t * (1 - 2 * d.pointPadding)));
                    a.columnMetrics = {
                        width: d,
                        offset: (t - d) / 2 + (m + ((a.columnIndex || 0) + (f ? 1 : 0)) * t - p / 2) * (f ? -1 : 1),
                        paddedWidth: t,
                        columnCount: h
                    };
                    return a.columnMetrics
                };
                d.prototype.crispCol = function (a, d, c, e) {
                    var b = this.chart, f = this.borderWidth, g = -(f % 2 ? .5 : 0);
                    f = f % 2 ? .5 : 1;
                    b.inverted && b.renderer.isVML && (f += 1);
                    this.options.crisp && (c = Math.round(a + c) + g, a = Math.round(a) +
                        g, c -= a);
                    e = Math.round(d + e) + f;
                    g = .5 >= Math.abs(d) && .5 < e;
                    d = Math.round(d) + f;
                    e -= d;
                    g && e && (--d, e += 1);
                    return {x: a, y: d, width: c, height: e}
                };
                d.prototype.adjustForMissingColumns = function (a, d, c, e) {
                    var b = this, f = this.options.stacking;
                    if (!c.isNull && 1 < e.columnCount) {
                        var g = 0, k = 0;
                        p(this.yAxis.stacking && this.yAxis.stacking.stacks, function (a) {
                            if ("number" === typeof c.x && (a = a[c.x.toString()])) {
                                var d = a.points[b.index], e = a.total;
                                f ? (d && (g = k), a.hasValidPoints && k++) : l(d) && (g = d[1], k = e || 0)
                            }
                        });
                        a = (c.plotX || 0) + ((k - 1) * e.paddedWidth + d) /
                            2 - d - g * e.paddedWidth
                    }
                    return a
                };
                d.prototype.translate = function () {
                    var a = this, d = a.chart, c = a.options, f = a.dense = 2 > a.closestPointRange * a.xAxis.transA;
                    f = a.borderWidth = A(c.borderWidth, f ? 0 : 1);
                    var k = a.xAxis, l = a.yAxis, h = c.threshold, p = a.translatedThreshold = l.getThreshold(h),
                        t = A(c.minPointLength, 5), n = a.getColumnMetrics(), q = n.width,
                        v = a.barW = Math.max(q, 1 + 2 * f), u = a.pointXOffset = n.offset, w = a.dataMin,
                        x = a.dataMax;
                    d.inverted && (p -= .5);
                    c.pointPadding && (v = Math.ceil(v));
                    y.prototype.translate.apply(a);
                    a.points.forEach(function (b) {
                        var f =
                            A(b.yBottom, p), g = 999 + Math.abs(f), r = q, C = b.plotX || 0;
                        g = e(b.plotY, -g, l.len + g);
                        C += u;
                        var F = v, D = Math.min(g, f), z = Math.max(g, f) - D;
                        if (t && Math.abs(z) < t) {
                            z = t;
                            var B = !l.reversed && !b.negative || l.reversed && b.negative;
                            J(h) && J(x) && b.y === h && x <= h && (l.min || 0) < h && (w !== x || (l.max || 0) <= h) && (B = !B);
                            D = Math.abs(D - p) > t ? f - t : p - (B ? t : 0)
                        }
                        m(b.options.pointWidth) && (r = F = Math.ceil(b.options.pointWidth), C -= Math.round((r - q) / 2));
                        c.centerInCategory && (C = a.adjustForMissingColumns(C, r, b, n));
                        b.barX = C;
                        b.pointWidth = r;
                        b.tooltipPos = d.inverted ? [e(l.len +
                            l.pos - d.plotLeft - g, l.pos - d.plotLeft, l.len + l.pos - d.plotLeft), k.len + k.pos - d.plotTop - C - F / 2, z] : [k.left - d.plotLeft + C + F / 2, e(g + l.pos - d.plotTop, l.pos - d.plotTop, l.len + l.pos - d.plotTop), z];
                        b.shapeType = a.pointClass.prototype.shapeType || "rect";
                        b.shapeArgs = a.crispCol.apply(a, b.isNull ? [C, p, F, 0] : [C, D, F, z])
                    })
                };
                d.prototype.drawGraph = function () {
                    this.group[this.dense ? "addClass" : "removeClass"]("highcharts-dense-data")
                };
                d.prototype.pointAttribs = function (a, d) {
                    var b = this.options, c = this.pointAttrToOptions || {};
                    var e = c.stroke ||
                        "borderColor";
                    var g = c["stroke-width"] || "borderWidth", k = a && a.color || this.color,
                        l = a && a[e] || b[e] || k, h = a && a[g] || b[g] || this[g] || 0;
                    c = a && a.options.dashStyle || b.dashStyle;
                    var p = A(a && a.opacity, b.opacity, 1);
                    if (a && this.zones.length) {
                        var m = a.getZone();
                        k = a.options.color || m && (m.color || a.nonZonedColor) || this.color;
                        m && (l = m.borderColor || l, c = m.dashStyle || c, h = m.borderWidth || h)
                    }
                    d && a && (a = K(b.states[d], a.options.states && a.options.states[d] || {}), d = a.brightness, k = a.color || "undefined" !== typeof d && f(k).brighten(a.brightness).get() ||
                        k, l = a[e] || l, h = a[g] || h, c = a.dashStyle || c, p = A(a.opacity, p));
                    e = {fill: k, stroke: l, "stroke-width": h, opacity: p};
                    c && (e.dashstyle = c);
                    return e
                };
                d.prototype.drawPoints = function () {
                    var a = this, d = this.chart, c = a.options, e = d.renderer, f = c.animationLimit || 250, k;
                    a.points.forEach(function (b) {
                        var g = b.graphic, l = !!g, h = g && d.pointCount < f ? "animate" : "attr";
                        if (J(b.plotY) && null !== b.y) {
                            k = b.shapeArgs;
                            g && b.hasNewShapeType() && (g = g.destroy());
                            a.enabledDataSorting && (b.startXPos = a.xAxis.reversed ? -(k ? k.width || 0 : 0) : a.xAxis.width);
                            g || (b.graphic =
                                g = e[b.shapeType](k).add(b.group || a.group)) && a.enabledDataSorting && d.hasRendered && d.pointCount < f && (g.attr({x: b.startXPos}), l = !0, h = "animate");
                            if (g && l) g[h](K(k));
                            if (c.borderRadius) g[h]({r: c.borderRadius});
                            d.styledMode || g[h](a.pointAttribs(b, b.selected && "select")).shadow(!1 !== b.allowShadow && c.shadow, null, c.stacking && !c.borderRadius);
                            g && (g.addClass(b.getClassName(), !0), g.attr({visibility: b.visible ? "inherit" : "hidden"}))
                        } else g && (b.graphic = g.destroy())
                    })
                };
                d.prototype.drawTracker = function () {
                    var a = this, d =
                        a.chart, e = d.pointer, f = function (a) {
                        var b = e.getPointFromEvent(a);
                        "undefined" !== typeof b && (e.isDirectTouch = !0, b.onMouseOver(a))
                    }, k;
                    a.points.forEach(function (a) {
                        k = l(a.dataLabels) ? a.dataLabels : a.dataLabel ? [a.dataLabel] : [];
                        a.graphic && (a.graphic.element.point = a);
                        k.forEach(function (b) {
                            b.div ? b.div.point = a : b.element.point = a
                        })
                    });
                    a._hasTracking || (a.trackerGroups.forEach(function (b) {
                        if (a[b]) {
                            a[b].addClass("highcharts-tracker").on("mouseover", f).on("mouseout", function (a) {
                                e.onTrackerMouseOut(a)
                            });
                            if (c) a[b].on("touchstart",
                                f);
                            !d.styledMode && a.options.cursor && a[b].css(t).css({cursor: a.options.cursor})
                        }
                    }), a._hasTracking = !0);
                    n(this, "afterDrawTracker")
                };
                d.prototype.remove = function () {
                    var a = this, d = a.chart;
                    d.hasRendered && d.series.forEach(function (b) {
                        b.type === a.type && (b.isDirty = !0)
                    });
                    y.prototype.remove.apply(a, arguments)
                };
                d.defaultOptions = K(y.defaultOptions, {
                    borderRadius: 0,
                    centerInCategory: !1,
                    groupPadding: .2,
                    marker: null,
                    pointPadding: .1,
                    minPointLength: 0,
                    cropThreshold: 50,
                    pointRange: null,
                    states: {
                        hover: {halo: !1, brightness: .1},
                        select: {color: x.neutralColor20, borderColor: x.neutralColor100}
                    },
                    dataLabels: {align: void 0, verticalAlign: void 0, y: void 0},
                    startFromThreshold: !0,
                    stickyTracking: !1,
                    tooltip: {distance: 6},
                    threshold: 0,
                    borderColor: x.backgroundColor
                });
                return d
            }(y);
            v(B.prototype, {
                cropShoulder: 0,
                directTouch: !0,
                drawLegendSymbol: H.drawRectangle,
                getSymbol: a,
                negStacks: !0,
                trackerGroups: ["group", "dataLabelsGroup"]
            });
            G.registerSeriesType("column", B);
            "";
            "";
            return B
        });
        L(a, "Series/Bar/BarSeries.js", [a["Series/Column/ColumnSeries.js"], a["Core/Series/SeriesRegistry.js"],
            a["Core/Utilities.js"]], function (a, u, E) {
            var v = this && this.__extends || function () {
                var a = function (v, q) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, f) {
                        a.__proto__ = f
                    } || function (a, f) {
                        for (var c in f) f.hasOwnProperty(c) && (a[c] = f[c])
                    };
                    return a(v, q)
                };
                return function (v, q) {
                    function h() {
                        this.constructor = v
                    }

                    a(v, q);
                    v.prototype = null === q ? Object.create(q) : (h.prototype = q.prototype, new h)
                }
            }(), x = E.extend, y = E.merge;
            E = function (u) {
                function x() {
                    var a = null !== u && u.apply(this, arguments) || this;
                    a.data = void 0;
                    a.options = void 0;
                    a.points = void 0;
                    return a
                }

                v(x, u);
                x.defaultOptions = y(a.defaultOptions, {});
                return x
            }(a);
            x(E.prototype, {inverted: !0});
            u.registerSeriesType("bar", E);
            "";
            return E
        });
        L(a, "Series/Scatter/ScatterSeries.js", [a["Series/Column/ColumnSeries.js"], a["Series/Line/LineSeries.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, u, E, H) {
            var v = this && this.__extends || function () {
                var a = function (h, f) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, e) {
                            a.__proto__ = e
                        } ||
                        function (a, e) {
                            for (var c in e) e.hasOwnProperty(c) && (a[c] = e[c])
                        };
                    return a(h, f)
                };
                return function (h, f) {
                    function c() {
                        this.constructor = h
                    }

                    a(h, f);
                    h.prototype = null === f ? Object.create(f) : (c.prototype = f.prototype, new c)
                }
            }(), y = H.addEvent, G = H.extend, B = H.merge;
            H = function (a) {
                function h() {
                    var f = null !== a && a.apply(this, arguments) || this;
                    f.data = void 0;
                    f.options = void 0;
                    f.points = void 0;
                    return f
                }

                v(h, a);
                h.prototype.applyJitter = function () {
                    var a = this, c = this.options.jitter, e = this.points.length;
                    c && this.points.forEach(function (f,
                                                       h) {
                        ["x", "y"].forEach(function (m, t) {
                            var l = "plot" + m.toUpperCase();
                            if (c[m] && !f.isNull) {
                                var n = a[m + "Axis"];
                                var q = c[m] * n.transA;
                                if (n && !n.isLog) {
                                    var v = Math.max(0, f[l] - q);
                                    n = Math.min(n.len, f[l] + q);
                                    t = 1E4 * Math.sin(h + t * e);
                                    f[l] = v + (n - v) * (t - Math.floor(t));
                                    "x" === m && (f.clientX = f.plotX)
                                }
                            }
                        })
                    })
                };
                h.prototype.drawGraph = function () {
                    this.options.lineWidth ? a.prototype.drawGraph.call(this) : this.graph && (this.graph = this.graph.destroy())
                };
                h.defaultOptions = B(u.defaultOptions, {
                    lineWidth: 0,
                    findNearestPointBy: "xy",
                    jitter: {x: 0, y: 0},
                    marker: {enabled: !0},
                    tooltip: {
                        headerFormat: '<span style="color:{point.color}">\u25cf</span> <span style="font-size: 10px"> {series.name}</span><br/>',
                        pointFormat: "x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>"
                    }
                });
                return h
            }(u);
            G(H.prototype, {
                drawTracker: a.prototype.drawTracker,
                sorted: !1,
                requireSorting: !1,
                noSharedTooltip: !0,
                trackerGroups: ["group", "markerGroup", "dataLabelsGroup"],
                takeOrdinalPosition: !1
            });
            y(H, "afterTranslate", function () {
                this.applyJitter()
            });
            E.registerSeriesType("scatter", H);
            "";
            return H
        });
        L(a, "Mixins/CenteredSeries.js", [a["Core/Globals.js"], a["Core/Series/Series.js"], a["Core/Utilities.js"]], function (a, u, E) {
            var v = E.isNumber, x = E.pick, y = E.relativeLength, G = a.deg2rad;
            return a.CenteredSeriesMixin = {
                getCenter: function () {
                    var a = this.options, q = this.chart, h = 2 * (a.slicedOffset || 0), f = q.plotWidth - 2 * h,
                        c = q.plotHeight - 2 * h, e = a.center, t = Math.min(f, c), m = a.size, v = a.innerSize || 0;
                    "string" === typeof m && (m = parseFloat(m));
                    "string" === typeof v && (v = parseFloat(v));
                    a = [x(e[0], "50%"), x(e[1], "50%"), x(m && 0 > m ? void 0 : a.size,
                        "100%"), x(v && 0 > v ? void 0 : a.innerSize || 0, "0%")];
                    !q.angular || this instanceof u || (a[3] = 0);
                    for (e = 0; 4 > e; ++e) m = a[e], q = 2 > e || 2 === e && /%$/.test(m), a[e] = y(m, [f, c, t, a[2]][e]) + (q ? h : 0);
                    a[3] > a[2] && (a[3] = a[2]);
                    return a
                }, getStartAndEndRadians: function (a, q) {
                    a = v(a) ? a : 0;
                    q = v(q) && q > a && 360 > q - a ? q : a + 360;
                    return {start: G * (a + -90), end: G * (q + -90)}
                }
            }
        });
        L(a, "Series/Pie/PiePoint.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/Series/Point.js"], a["Core/Utilities.js"]], function (a, u, E) {
            var v = this && this.__extends || function () {
                var a =
                    function (c, e) {
                        a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, c) {
                            a.__proto__ = c
                        } || function (a, c) {
                            for (var e in c) c.hasOwnProperty(e) && (a[e] = c[e])
                        };
                        return a(c, e)
                    };
                return function (c, e) {
                    function f() {
                        this.constructor = c
                    }

                    a(c, e);
                    c.prototype = null === e ? Object.create(e) : (f.prototype = e.prototype, new f)
                }
            }(), x = a.setAnimation, y = E.addEvent, G = E.defined;
            a = E.extend;
            var B = E.isNumber, q = E.pick, h = E.relativeLength;
            E = function (a) {
                function c() {
                    var c = null !== a && a.apply(this, arguments) || this;
                    c.labelDistance = void 0;
                    c.options = void 0;
                    c.series = void 0;
                    return c
                }

                v(c, a);
                c.prototype.getConnectorPath = function () {
                    var a = this.labelPosition, c = this.series.options.dataLabels, f = c.connectorShape,
                        h = this.connectorShapes;
                    h[f] && (f = h[f]);
                    return f.call(this, {x: a.final.x, y: a.final.y, alignment: a.alignment}, a.connectorPosition, c)
                };
                c.prototype.getTranslate = function () {
                    return this.sliced ? this.slicedTranslation : {translateX: 0, translateY: 0}
                };
                c.prototype.haloPath = function (a) {
                    var c = this.shapeArgs;
                    return this.sliced || !this.visible ? [] : this.series.chart.renderer.symbols.arc(c.x,
                        c.y, c.r + a, c.r + a, {innerR: c.r - 1, start: c.start, end: c.end})
                };
                c.prototype.init = function () {
                    u.prototype.init.apply(this, arguments);
                    var a = this;
                    a.name = q(a.name, "Slice");
                    var c = function (c) {
                        a.slice("select" === c.type)
                    };
                    y(a, "select", c);
                    y(a, "unselect", c);
                    return a
                };
                c.prototype.isValid = function () {
                    return B(this.y) && 0 <= this.y
                };
                c.prototype.setVisible = function (a, c) {
                    var e = this, f = e.series, h = f.chart, l = f.options.ignoreHiddenPoint;
                    c = q(c, l);
                    a !== e.visible && (e.visible = e.options.visible = a = "undefined" === typeof a ? !e.visible : a, f.options.data[f.data.indexOf(e)] =
                        e.options, ["graphic", "dataLabel", "connector", "shadowGroup"].forEach(function (c) {
                        if (e[c]) e[c][a ? "show" : "hide"](a)
                    }), e.legendItem && h.legend.colorizeItem(e, a), a || "hover" !== e.state || e.setState(""), l && (f.isDirty = !0), c && h.redraw())
                };
                c.prototype.slice = function (a, c, f) {
                    var e = this.series;
                    x(f, e.chart);
                    q(c, !0);
                    this.sliced = this.options.sliced = G(a) ? a : !this.sliced;
                    e.options.data[e.data.indexOf(this)] = this.options;
                    this.graphic && this.graphic.animate(this.getTranslate());
                    this.shadowGroup && this.shadowGroup.animate(this.getTranslate())
                };
                return c
            }(u);
            a(E.prototype, {
                connectorShapes: {
                    fixedOffset: function (a, c, e) {
                        var f = c.breakAt;
                        c = c.touchingSliceAt;
                        return [["M", a.x, a.y], e.softConnector ? ["C", a.x + ("left" === a.alignment ? -5 : 5), a.y, 2 * f.x - c.x, 2 * f.y - c.y, f.x, f.y] : ["L", f.x, f.y], ["L", c.x, c.y]]
                    }, straight: function (a, c) {
                        c = c.touchingSliceAt;
                        return [["M", a.x, a.y], ["L", c.x, c.y]]
                    }, crookedLine: function (a, c, e) {
                        c = c.touchingSliceAt;
                        var f = this.series, m = f.center[0], q = f.chart.plotWidth, n = f.chart.plotLeft;
                        f = a.alignment;
                        var l = this.shapeArgs.r;
                        e = h(e.crookDistance,
                            1);
                        q = "left" === f ? m + l + (q + n - m - l) * (1 - e) : n + (m - l) * e;
                        e = ["L", q, a.y];
                        m = !0;
                        if ("left" === f ? q > a.x || q < c.x : q < a.x || q > c.x) m = !1;
                        a = [["M", a.x, a.y]];
                        m && a.push(e);
                        a.push(["L", c.x, c.y]);
                        return a
                    }
                }
            });
            return E
        });
        L(a, "Series/Pie/PieSeries.js", [a["Mixins/CenteredSeries.js"], a["Series/Column/ColumnSeries.js"], a["Core/Globals.js"], a["Mixins/LegendSymbol.js"], a["Core/Color/Palette.js"], a["Series/Pie/PiePoint.js"], a["Core/Series/Series.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Renderer/SVG/Symbols.js"], a["Core/Utilities.js"]],
            function (a, u, E, H, x, y, G, B, q, h) {
                var f = this && this.__extends || function () {
                    var a = function (c, e) {
                        a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, c) {
                            a.__proto__ = c
                        } || function (a, c) {
                            for (var d in c) c.hasOwnProperty(d) && (a[d] = c[d])
                        };
                        return a(c, e)
                    };
                    return function (c, e) {
                        function f() {
                            this.constructor = c
                        }

                        a(c, e);
                        c.prototype = null === e ? Object.create(e) : (f.prototype = e.prototype, new f)
                    }
                }(), c = a.getStartAndEndRadians;
                E = E.noop;
                var e = h.clamp, t = h.extend, m = h.fireEvent, v = h.merge, n = h.pick, l = h.relativeLength;
                h =
                    function (a) {
                        function h() {
                            var c = null !== a && a.apply(this, arguments) || this;
                            c.center = void 0;
                            c.data = void 0;
                            c.maxLabelDistance = void 0;
                            c.options = void 0;
                            c.points = void 0;
                            return c
                        }

                        f(h, a);
                        h.prototype.animate = function (a) {
                            var c = this, d = c.points, e = c.startAngleRad;
                            a || d.forEach(function (a) {
                                var b = a.graphic, d = a.shapeArgs;
                                b && d && (b.attr({
                                    r: n(a.startR, c.center && c.center[3] / 2),
                                    start: e,
                                    end: e
                                }), b.animate({r: d.r, start: d.start, end: d.end}, c.options.animation))
                            })
                        };
                        h.prototype.drawEmpty = function () {
                            var a = this.startAngleRad, c = this.endAngleRad,
                                d = this.options;
                            if (0 === this.total && this.center) {
                                var e = this.center[0];
                                var b = this.center[1];
                                this.graph || (this.graph = this.chart.renderer.arc(e, b, this.center[1] / 2, 0, a, c).addClass("highcharts-empty-series").add(this.group));
                                this.graph.attr({
                                    d: q.arc(e, b, this.center[2] / 2, 0, {
                                        start: a,
                                        end: c,
                                        innerR: this.center[3] / 2
                                    })
                                });
                                this.chart.styledMode || this.graph.attr({
                                    "stroke-width": d.borderWidth,
                                    fill: d.fillColor || "none",
                                    stroke: d.color || x.neutralColor20
                                })
                            } else this.graph && (this.graph = this.graph.destroy())
                        };
                        h.prototype.drawPoints =
                            function () {
                                var a = this.chart.renderer;
                                this.points.forEach(function (c) {
                                    c.graphic && c.hasNewShapeType() && (c.graphic = c.graphic.destroy());
                                    c.graphic || (c.graphic = a[c.shapeType](c.shapeArgs).add(c.series.group), c.delayedRendering = !0)
                                })
                            };
                        h.prototype.generatePoints = function () {
                            a.prototype.generatePoints.call(this);
                            this.updateTotals()
                        };
                        h.prototype.getX = function (a, c, d) {
                            var f = this.center, b = this.radii ? this.radii[d.index] || 0 : f[2] / 2;
                            a = Math.asin(e((a - f[1]) / (b + d.labelDistance), -1, 1));
                            return f[0] + (c ? -1 : 1) * Math.cos(a) *
                                (b + d.labelDistance) + (0 < d.labelDistance ? (c ? -1 : 1) * this.options.dataLabels.padding : 0)
                        };
                        h.prototype.hasData = function () {
                            return !!this.processedXData.length
                        };
                        h.prototype.redrawPoints = function () {
                            var a = this, c = a.chart, d = c.renderer, e, b, f, h, l = a.options.shadow;
                            this.drawEmpty();
                            !l || a.shadowGroup || c.styledMode || (a.shadowGroup = d.g("shadow").attr({zIndex: -1}).add(a.group));
                            a.points.forEach(function (g) {
                                var k = {};
                                b = g.graphic;
                                if (!g.isNull && b) {
                                    var p = void 0;
                                    h = g.shapeArgs;
                                    e = g.getTranslate();
                                    c.styledMode || (p = g.shadowGroup,
                                    l && !p && (p = g.shadowGroup = d.g("shadow").add(a.shadowGroup)), p && p.attr(e), f = a.pointAttribs(g, g.selected && "select"));
                                    g.delayedRendering ? (b.setRadialReference(a.center).attr(h).attr(e), c.styledMode || b.attr(f).attr({"stroke-linejoin": "round"}).shadow(l, p), g.delayedRendering = !1) : (b.setRadialReference(a.center), c.styledMode || v(!0, k, f), v(!0, k, h, e), b.animate(k));
                                    b.attr({visibility: g.visible ? "inherit" : "hidden"});
                                    b.addClass(g.getClassName(), !0)
                                } else b && (g.graphic = b.destroy())
                            })
                        };
                        h.prototype.sortByAngle = function (a,
                                                            c) {
                            a.sort(function (a, e) {
                                return "undefined" !== typeof a.angle && (e.angle - a.angle) * c
                            })
                        };
                        h.prototype.translate = function (a) {
                            this.generatePoints();
                            var e = 0, d = this.options, f = d.slicedOffset, b = f + (d.borderWidth || 0),
                                g = c(d.startAngle, d.endAngle), h = this.startAngleRad = g.start;
                            g = (this.endAngleRad = g.end) - h;
                            var q = this.points, t = d.dataLabels.distance;
                            d = d.ignoreHiddenPoint;
                            var v, u = q.length;
                            a || (this.center = a = this.getCenter());
                            for (v = 0; v < u; v++) {
                                var w = q[v];
                                var A = h + e * g;
                                !w.isValid() || d && !w.visible || (e += w.percentage / 100);
                                var x =
                                    h + e * g;
                                var y = {
                                    x: a[0],
                                    y: a[1],
                                    r: a[2] / 2,
                                    innerR: a[3] / 2,
                                    start: Math.round(1E3 * A) / 1E3,
                                    end: Math.round(1E3 * x) / 1E3
                                };
                                w.shapeType = "arc";
                                w.shapeArgs = y;
                                w.labelDistance = n(w.options.dataLabels && w.options.dataLabels.distance, t);
                                w.labelDistance = l(w.labelDistance, y.r);
                                this.maxLabelDistance = Math.max(this.maxLabelDistance || 0, w.labelDistance);
                                x = (x + A) / 2;
                                x > 1.5 * Math.PI ? x -= 2 * Math.PI : x < -Math.PI / 2 && (x += 2 * Math.PI);
                                w.slicedTranslation = {
                                    translateX: Math.round(Math.cos(x) * f),
                                    translateY: Math.round(Math.sin(x) * f)
                                };
                                y = Math.cos(x) * a[2] /
                                    2;
                                var B = Math.sin(x) * a[2] / 2;
                                w.tooltipPos = [a[0] + .7 * y, a[1] + .7 * B];
                                w.half = x < -Math.PI / 2 || x > Math.PI / 2 ? 1 : 0;
                                w.angle = x;
                                A = Math.min(b, w.labelDistance / 5);
                                w.labelPosition = {
                                    natural: {
                                        x: a[0] + y + Math.cos(x) * w.labelDistance,
                                        y: a[1] + B + Math.sin(x) * w.labelDistance
                                    },
                                    "final": {},
                                    alignment: 0 > w.labelDistance ? "center" : w.half ? "right" : "left",
                                    connectorPosition: {
                                        breakAt: {
                                            x: a[0] + y + Math.cos(x) * A,
                                            y: a[1] + B + Math.sin(x) * A
                                        }, touchingSliceAt: {x: a[0] + y, y: a[1] + B}
                                    }
                                }
                            }
                            m(this, "afterTranslate")
                        };
                        h.prototype.updateTotals = function () {
                            var a, c = 0, d = this.points,
                                e = d.length, b = this.options.ignoreHiddenPoint;
                            for (a = 0; a < e; a++) {
                                var f = d[a];
                                !f.isValid() || b && !f.visible || (c += f.y)
                            }
                            this.total = c;
                            for (a = 0; a < e; a++) f = d[a], f.percentage = 0 < c && (f.visible || !b) ? f.y / c * 100 : 0, f.total = c
                        };
                        h.defaultOptions = v(G.defaultOptions, {
                            center: [null, null],
                            clip: !1,
                            colorByPoint: !0,
                            dataLabels: {
                                allowOverlap: !0,
                                connectorPadding: 5,
                                connectorShape: "fixedOffset",
                                crookDistance: "70%",
                                distance: 30,
                                enabled: !0,
                                formatter: function () {
                                    return this.point.isNull ? void 0 : this.point.name
                                },
                                softConnector: !0,
                                x: 0
                            },
                            fillColor: void 0,
                            ignoreHiddenPoint: !0,
                            inactiveOtherPoints: !0,
                            legendType: "point",
                            marker: null,
                            size: null,
                            showInLegend: !1,
                            slicedOffset: 10,
                            stickyTracking: !1,
                            tooltip: {followPointer: !0},
                            borderColor: x.backgroundColor,
                            borderWidth: 1,
                            lineWidth: void 0,
                            states: {hover: {brightness: .1}}
                        });
                        return h
                    }(G);
                t(h.prototype, {
                    axisTypes: [],
                    directTouch: !0,
                    drawGraph: void 0,
                    drawLegendSymbol: H.drawRectangle,
                    drawTracker: u.prototype.drawTracker,
                    getCenter: a.getCenter,
                    getSymbol: E,
                    isCartesian: !1,
                    noSharedTooltip: !0,
                    pointAttribs: u.prototype.pointAttribs,
                    pointClass: y,
                    requireSorting: !1,
                    searchPoint: E,
                    trackerGroups: ["group", "dataLabelsGroup"]
                });
                B.registerSeriesType("pie", h);
                "";
                return h
            });
        L(a, "Core/Series/DataLabels.js", [a["Core/Animation/AnimationUtilities.js"], a["Core/FormatUtilities.js"], a["Core/Globals.js"], a["Core/Color/Palette.js"], a["Core/Series/Series.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, u, E, H, x, y, G) {
            var v = a.getDeferredAnimation, q = u.format;
            a = E.noop;
            y = y.seriesTypes;
            var h = G.arrayMax, f = G.clamp, c = G.defined, e =
                    G.extend, t = G.fireEvent, m = G.isArray, w = G.merge, n = G.objectEach, l = G.pick,
                J = G.relativeLength, K = G.splat, A = G.stableSort;
            "";
            E.distribute = function (a, c, e) {
                function b(a, b) {
                    return a.target - b.target
                }

                var d, k = !0, h = a, m = [];
                var p = 0;
                var n = h.reducedLen || c;
                for (d = a.length; d--;) p += a[d].size;
                if (p > n) {
                    A(a, function (a, b) {
                        return (b.rank || 0) - (a.rank || 0)
                    });
                    for (p = d = 0; p <= n;) p += a[d].size, d++;
                    m = a.splice(d - 1, a.length)
                }
                A(a, b);
                for (a = a.map(function (a) {
                    return {size: a.size, targets: [a.target], align: l(a.align, .5)}
                }); k;) {
                    for (d = a.length; d--;) k =
                        a[d], p = (Math.min.apply(0, k.targets) + Math.max.apply(0, k.targets)) / 2, k.pos = f(p - k.size * k.align, 0, c - k.size);
                    d = a.length;
                    for (k = !1; d--;) 0 < d && a[d - 1].pos + a[d - 1].size > a[d].pos && (a[d - 1].size += a[d].size, a[d - 1].targets = a[d - 1].targets.concat(a[d].targets), a[d - 1].align = .5, a[d - 1].pos + a[d - 1].size > c && (a[d - 1].pos = c - a[d - 1].size), a.splice(d, 1), k = !0)
                }
                h.push.apply(h, m);
                d = 0;
                a.some(function (a) {
                    var b = 0;
                    if (a.targets.some(function () {
                        h[d].pos = a.pos + b;
                        if ("undefined" !== typeof e && Math.abs(h[d].pos - h[d].target) > e) return h.slice(0,
                            d + 1).forEach(function (a) {
                            delete a.pos
                        }), h.reducedLen = (h.reducedLen || c) - .1 * c, h.reducedLen > .1 * c && E.distribute(h, c, e), !0;
                        b += h[d].size;
                        d++
                    })) return !0
                });
                A(h, b)
            };
            x.prototype.drawDataLabels = function () {
                function a(a, b) {
                    var c = b.filter;
                    return c ? (b = c.operator, a = a[c.property], c = c.value, ">" === b && a > c || "<" === b && a < c || ">=" === b && a >= c || "<=" === b && a <= c || "==" === b && a == c || "===" === b && a === c ? !0 : !1) : !0
                }

                function d(a, b) {
                    var c = [], d;
                    if (m(a) && !m(b)) c = a.map(function (a) {
                        return w(a, b)
                    }); else if (m(b) && !m(a)) c = b.map(function (b) {
                        return w(a,
                            b)
                    }); else if (m(a) || m(b)) for (d = Math.max(a.length, b.length); d--;) c[d] = w(a[d], b[d]); else c = w(a, b);
                    return c
                }

                var e = this, b = e.chart, f = e.options, h = f.dataLabels, u = e.points, x, A = e.hasRendered || 0,
                    C = h.animation;
                C = h.defer ? v(b, C, e) : {defer: 0, duration: 0};
                var y = b.renderer;
                h = d(d(b.options.plotOptions && b.options.plotOptions.series && b.options.plotOptions.series.dataLabels, b.options.plotOptions && b.options.plotOptions[e.type] && b.options.plotOptions[e.type].dataLabels), h);
                t(this, "drawDataLabels");
                if (m(h) || h.enabled || e._hasPointLabels) {
                    var B =
                        e.plotGroup("dataLabelsGroup", "data-labels", A ? "inherit" : "hidden", h.zIndex || 6);
                    B.attr({opacity: +A});
                    !A && (A = e.dataLabelsGroup) && (e.visible && B.show(!0), A[f.animation ? "animate" : "attr"]({opacity: 1}, C));
                    u.forEach(function (g) {
                        x = K(d(h, g.dlOptions || g.options && g.options.dataLabels));
                        x.forEach(function (d, k) {
                            var h = d.enabled && (!g.isNull || g.dataLabelOnNull) && a(g, d),
                                m = g.dataLabels ? g.dataLabels[k] : g.dataLabel,
                                p = g.connectors ? g.connectors[k] : g.connector, r = l(d.distance, g.labelDistance),
                                t = !m;
                            if (h) {
                                var v = g.getLabelConfig();
                                var u = l(d[g.formatPrefix + "Format"], d.format);
                                v = c(u) ? q(u, v, b) : (d[g.formatPrefix + "Formatter"] || d.formatter).call(v, d);
                                u = d.style;
                                var w = d.rotation;
                                b.styledMode || (u.color = l(d.color, u.color, e.color, H.neutralColor100), "contrast" === u.color ? (g.contrastColor = y.getContrast(g.color || e.color), u.color = !c(r) && d.inside || 0 > r || f.stacking ? g.contrastColor : H.neutralColor100) : delete g.contrastColor, f.cursor && (u.cursor = f.cursor));
                                var x = {r: d.borderRadius || 0, rotation: w, padding: d.padding, zIndex: 1};
                                b.styledMode || (x.fill = d.backgroundColor,
                                    x.stroke = d.borderColor, x["stroke-width"] = d.borderWidth);
                                n(x, function (a, b) {
                                    "undefined" === typeof a && delete x[b]
                                })
                            }
                            !m || h && c(v) ? h && c(v) && (m ? x.text = v : (g.dataLabels = g.dataLabels || [], m = g.dataLabels[k] = w ? y.text(v, 0, -9999, d.useHTML).addClass("highcharts-data-label") : y.label(v, 0, -9999, d.shape, null, null, d.useHTML, null, "data-label"), k || (g.dataLabel = m), m.addClass(" highcharts-data-label-color-" + g.colorIndex + " " + (d.className || "") + (d.useHTML ? " highcharts-tracker" : ""))), m.options = d, m.attr(x), b.styledMode || m.css(u).shadow(d.shadow),
                            m.added || m.add(B), d.textPath && !d.useHTML && (m.setTextPath(g.getDataLabelPath && g.getDataLabelPath(m) || g.graphic, d.textPath), g.dataLabelPath && !d.textPath.enabled && (g.dataLabelPath = g.dataLabelPath.destroy())), e.alignDataLabel(g, m, d, null, t)) : (g.dataLabel = g.dataLabel && g.dataLabel.destroy(), g.dataLabels && (1 === g.dataLabels.length ? delete g.dataLabels : delete g.dataLabels[k]), k || delete g.dataLabel, p && (g.connector = g.connector.destroy(), g.connectors && (1 === g.connectors.length ? delete g.connectors : delete g.connectors[k])))
                        })
                    })
                }
                t(this,
                    "afterDrawDataLabels")
            };
            x.prototype.alignDataLabel = function (a, c, f, b, g) {
                var d = this, k = this.chart, h = this.isCartesian && k.inverted, m = this.enabledDataSorting,
                    p = l(a.dlBox && a.dlBox.centerX, a.plotX, -9999), n = l(a.plotY, -9999), q = c.getBBox(),
                    t = f.rotation, v = f.align,
                    u = k.isInsidePlot(p, Math.round(n), {inverted: h, paneCoordinates: !0, series: d}),
                    w = "justify" === l(f.overflow, m ? "none" : "justify"),
                    x = this.visible && !1 !== a.visible && (a.series.forceDL || m && !w || u || l(f.inside, !!this.options.stacking) && b && k.isInsidePlot(p, h ? b.x + 1 : b.y +
                        b.height - 1, {inverted: h, paneCoordinates: !0, series: d}));
                var A = function (b) {
                    m && d.xAxis && !w && d.setDataLabelStartPos(a, c, g, u, b)
                };
                if (x) {
                    var y = k.renderer.fontMetrics(k.styledMode ? void 0 : f.style.fontSize, c).b;
                    b = e({
                        x: h ? this.yAxis.len - n : p,
                        y: Math.round(h ? this.xAxis.len - p : n),
                        width: 0,
                        height: 0
                    }, b);
                    e(f, {width: q.width, height: q.height});
                    t ? (w = !1, p = k.renderer.rotCorr(y, t), p = {
                        x: b.x + (f.x || 0) + b.width / 2 + p.x,
                        y: b.y + (f.y || 0) + {top: 0, middle: .5, bottom: 1}[f.verticalAlign] * b.height
                    }, A(p), c[g ? "attr" : "animate"](p).attr({align: v}),
                        A = (t + 720) % 360, A = 180 < A && 360 > A, "left" === v ? p.y -= A ? q.height : 0 : "center" === v ? (p.x -= q.width / 2, p.y -= q.height / 2) : "right" === v && (p.x -= q.width, p.y -= A ? 0 : q.height), c.placed = !0, c.alignAttr = p) : (A(b), c.align(f, void 0, b), p = c.alignAttr);
                    w && 0 <= b.height ? this.justifyDataLabel(c, f, p, q, b, g) : l(f.crop, !0) && (x = k.isInsidePlot(p.x, p.y, {
                        paneCoordinates: !0,
                        series: d
                    }) && k.isInsidePlot(p.x + q.width, p.y + q.height, {paneCoordinates: !0, series: d}));
                    if (f.shape && !t) c[g ? "attr" : "animate"]({
                        anchorX: h ? k.plotWidth - a.plotY : a.plotX, anchorY: h ? k.plotHeight -
                            a.plotX : a.plotY
                    })
                }
                g && m && (c.placed = !1);
                x || m && !w || (c.hide(!0), c.placed = !1)
            };
            x.prototype.setDataLabelStartPos = function (a, c, e, b, f) {
                var d = this.chart, g = d.inverted, k = this.xAxis, h = k.reversed, l = g ? c.height / 2 : c.width / 2;
                a = (a = a.pointWidth) ? a / 2 : 0;
                k = g ? f.x : h ? -l - a : k.width - l + a;
                f = g ? h ? this.yAxis.height - l + a : -l - a : f.y;
                c.startXPos = k;
                c.startYPos = f;
                b ? "hidden" === c.visibility && (c.show(), c.attr({opacity: 0}).animate({opacity: 1})) : c.attr({opacity: 1}).animate({opacity: 0}, void 0, c.hide);
                d.hasRendered && (e && c.attr({x: c.startXPos, y: c.startYPos}),
                    c.placed = !0)
            };
            x.prototype.justifyDataLabel = function (a, c, e, b, f, h) {
                var d = this.chart, g = c.align, k = c.verticalAlign, l = a.box ? 0 : a.padding || 0, m = c.x;
                m = void 0 === m ? 0 : m;
                var p = c.y;
                var n = void 0 === p ? 0 : p;
                p = (e.x || 0) + l;
                if (0 > p) {
                    "right" === g && 0 <= m ? (c.align = "left", c.inside = !0) : m -= p;
                    var r = !0
                }
                p = (e.x || 0) + b.width - l;
                p > d.plotWidth && ("left" === g && 0 >= m ? (c.align = "right", c.inside = !0) : m += d.plotWidth - p, r = !0);
                p = e.y + l;
                0 > p && ("bottom" === k && 0 <= n ? (c.verticalAlign = "top", c.inside = !0) : n -= p, r = !0);
                p = (e.y || 0) + b.height - l;
                p > d.plotHeight && ("top" ===
                k && 0 >= n ? (c.verticalAlign = "bottom", c.inside = !0) : n += d.plotHeight - p, r = !0);
                r && (c.x = m, c.y = n, a.placed = !h, a.align(c, void 0, f));
                return r
            };
            y.pie && (y.pie.prototype.dataLabelPositioners = {
                radialDistributionY: function (a) {
                    return a.top + a.distributeBox.pos
                }, radialDistributionX: function (a, c, e, b) {
                    return a.getX(e < c.top + 2 || e > c.bottom - 2 ? b : e, c.half, c)
                }, justify: function (a, c, e) {
                    return e[0] + (a.half ? -1 : 1) * (c + a.labelDistance)
                }, alignToPlotEdges: function (a, c, e, b) {
                    a = a.getBBox().width;
                    return c ? a + b : e - a - b
                }, alignToConnectors: function (a,
                                                c, e, b) {
                    var d = 0, f;
                    a.forEach(function (a) {
                        f = a.dataLabel.getBBox().width;
                        f > d && (d = f)
                    });
                    return c ? d + b : e - d - b
                }
            }, y.pie.prototype.drawDataLabels = function () {
                var a = this, d = a.data, e, b = a.chart, f = a.options.dataLabels || {}, m = f.connectorPadding, n,
                    q = b.plotWidth, t = b.plotHeight, v = b.plotLeft, u = Math.round(b.chartWidth / 3), A,
                    y = a.center, B = y[2] / 2, G = y[1], z, J, K, L, X = [[], []], I, N, P, U, T = [0, 0, 0, 0],
                    R = a.dataLabelPositioners, V;
                a.visible && (f.enabled || a._hasPointLabels) && (d.forEach(function (a) {
                    a.dataLabel && a.visible && a.dataLabel.shortened &&
                    (a.dataLabel.attr({width: "auto"}).css({
                        width: "auto",
                        textOverflow: "clip"
                    }), a.dataLabel.shortened = !1)
                }), x.prototype.drawDataLabels.apply(a), d.forEach(function (a) {
                    a.dataLabel && (a.visible ? (X[a.half].push(a), a.dataLabel._pos = null, !c(f.style.width) && !c(a.options.dataLabels && a.options.dataLabels.style && a.options.dataLabels.style.width) && a.dataLabel.getBBox().width > u && (a.dataLabel.css({width: Math.round(.7 * u) + "px"}), a.dataLabel.shortened = !0)) : (a.dataLabel = a.dataLabel.destroy(), a.dataLabels && 1 === a.dataLabels.length &&
                    delete a.dataLabels))
                }), X.forEach(function (d, g) {
                    var h = d.length, k = [], p;
                    if (h) {
                        a.sortByAngle(d, g - .5);
                        if (0 < a.maxLabelDistance) {
                            var n = Math.max(0, G - B - a.maxLabelDistance);
                            var r = Math.min(G + B + a.maxLabelDistance, b.plotHeight);
                            d.forEach(function (a) {
                                0 < a.labelDistance && a.dataLabel && (a.top = Math.max(0, G - B - a.labelDistance), a.bottom = Math.min(G + B + a.labelDistance, b.plotHeight), p = a.dataLabel.getBBox().height || 21, a.distributeBox = {
                                    target: a.labelPosition.natural.y - a.top + p / 2,
                                    size: p,
                                    rank: a.y
                                }, k.push(a.distributeBox))
                            });
                            n =
                                r + p - n;
                            E.distribute(k, n, n / 5)
                        }
                        for (U = 0; U < h; U++) {
                            e = d[U];
                            K = e.labelPosition;
                            z = e.dataLabel;
                            P = !1 === e.visible ? "hidden" : "inherit";
                            N = n = K.natural.y;
                            k && c(e.distributeBox) && ("undefined" === typeof e.distributeBox.pos ? P = "hidden" : (L = e.distributeBox.size, N = R.radialDistributionY(e)));
                            delete e.positionIndex;
                            if (f.justify) I = R.justify(e, B, y); else switch (f.alignTo) {
                                case "connectors":
                                    I = R.alignToConnectors(d, g, q, v);
                                    break;
                                case "plotEdges":
                                    I = R.alignToPlotEdges(z, g, q, v);
                                    break;
                                default:
                                    I = R.radialDistributionX(a, e, N, n)
                            }
                            z._attr = {
                                visibility: P,
                                align: K.alignment
                            };
                            V = e.options.dataLabels || {};
                            z._pos = {
                                x: I + l(V.x, f.x) + ({left: m, right: -m}[K.alignment] || 0),
                                y: N + l(V.y, f.y) - 10
                            };
                            K.final.x = I;
                            K.final.y = N;
                            l(f.crop, !0) && (J = z.getBBox().width, n = null, I - J < m && 1 === g ? (n = Math.round(J - I + m), T[3] = Math.max(n, T[3])) : I + J > q - m && 0 === g && (n = Math.round(I + J - q + m), T[1] = Math.max(n, T[1])), 0 > N - L / 2 ? T[0] = Math.max(Math.round(-N + L / 2), T[0]) : N + L / 2 > t && (T[2] = Math.max(Math.round(N + L / 2 - t), T[2])), z.sideOverflow = n)
                        }
                    }
                }), 0 === h(T) || this.verifyDataLabelOverflow(T)) && (this.placeDataLabels(), this.points.forEach(function (c) {
                    V =
                        w(f, c.options.dataLabels);
                    if (n = l(V.connectorWidth, 1)) {
                        var d;
                        A = c.connector;
                        if ((z = c.dataLabel) && z._pos && c.visible && 0 < c.labelDistance) {
                            P = z._attr.visibility;
                            if (d = !A) c.connector = A = b.renderer.path().addClass("highcharts-data-label-connector  highcharts-color-" + c.colorIndex + (c.className ? " " + c.className : "")).add(a.dataLabelsGroup), b.styledMode || A.attr({
                                "stroke-width": n,
                                stroke: V.connectorColor || c.color || H.neutralColor60
                            });
                            A[d ? "attr" : "animate"]({d: c.getConnectorPath()});
                            A.attr("visibility", P)
                        } else A && (c.connector =
                            A.destroy())
                    }
                }))
            }, y.pie.prototype.placeDataLabels = function () {
                this.points.forEach(function (a) {
                    var c = a.dataLabel, e;
                    c && a.visible && ((e = c._pos) ? (c.sideOverflow && (c._attr.width = Math.max(c.getBBox().width - c.sideOverflow, 0), c.css({
                        width: c._attr.width + "px",
                        textOverflow: (this.options.dataLabels.style || {}).textOverflow || "ellipsis"
                    }), c.shortened = !0), c.attr(c._attr), c[c.moved ? "animate" : "attr"](e), c.moved = !0) : c && c.attr({y: -9999}));
                    delete a.distributeBox
                }, this)
            }, y.pie.prototype.alignDataLabel = a, y.pie.prototype.verifyDataLabelOverflow =
                function (a) {
                    var c = this.center, e = this.options, b = e.center, g = e.minSize || 80, h = null !== e.size;
                    if (!h) {
                        if (null !== b[0]) var l = Math.max(c[2] - Math.max(a[1], a[3]), g); else l = Math.max(c[2] - a[1] - a[3], g), c[0] += (a[3] - a[1]) / 2;
                        null !== b[1] ? l = f(l, g, c[2] - Math.max(a[0], a[2])) : (l = f(l, g, c[2] - a[0] - a[2]), c[1] += (a[0] - a[2]) / 2);
                        l < c[2] ? (c[2] = l, c[3] = Math.min(J(e.innerSize || 0, l), l), this.translate(c), this.drawDataLabels && this.drawDataLabels()) : h = !0
                    }
                    return h
                });
            y.column && (y.column.prototype.alignDataLabel = function (a, c, e, b, f) {
                var d = this.chart.inverted,
                    g = a.series, h = a.dlBox || a.shapeArgs,
                    k = l(a.below, a.plotY > l(this.translatedThreshold, g.yAxis.len)),
                    m = l(e.inside, !!this.options.stacking);
                h && (b = w(h), 0 > b.y && (b.height += b.y, b.y = 0), h = b.y + b.height - g.yAxis.len, 0 < h && h < b.height && (b.height -= h), d && (b = {
                    x: g.yAxis.len - b.y - b.height,
                    y: g.xAxis.len - b.x - b.width,
                    width: b.height,
                    height: b.width
                }), m || (d ? (b.x += k ? 0 : b.width, b.width = 0) : (b.y += k ? b.height : 0, b.height = 0)));
                e.align = l(e.align, !d || m ? "center" : k ? "right" : "left");
                e.verticalAlign = l(e.verticalAlign, d || m ? "middle" : k ? "top" : "bottom");
                x.prototype.alignDataLabel.call(this, a, c, e, b, f);
                e.inside && a.contrastColor && c.css({color: a.contrastColor})
            })
        });
        L(a, "Extensions/OverlappingDataLabels.js", [a["Core/Chart/Chart.js"], a["Core/Utilities.js"]], function (a, u) {
            function v(a, f) {
                var c = !1;
                if (a) {
                    var e = a.newOpacity;
                    a.oldOpacity !== e && (a.alignAttr && a.placed ? (a[e ? "removeClass" : "addClass"]("highcharts-data-label-hidden"), c = !0, a.alignAttr.opacity = e, a[a.isOld ? "animate" : "attr"](a.alignAttr, null, function () {
                        f.styledMode || a.css({pointerEvents: e ? "auto" : "none"})
                    }),
                        x(f, "afterHideOverlappingLabel")) : a.attr({opacity: e}));
                    a.isOld = !0
                }
                return c
            }

            var H = u.addEvent, x = u.fireEvent, y = u.isArray, G = u.isNumber, B = u.objectEach, q = u.pick;
            H(a, "render", function () {
                var a = this, f = [];
                (this.labelCollectors || []).forEach(function (a) {
                    f = f.concat(a())
                });
                (this.yAxis || []).forEach(function (a) {
                    a.stacking && a.options.stackLabels && !a.options.stackLabels.allowOverlap && B(a.stacking.stacks, function (a) {
                        B(a, function (a) {
                            a.label && "hidden" !== a.label.visibility && f.push(a.label)
                        })
                    })
                });
                (this.series || []).forEach(function (c) {
                    var e =
                        c.options.dataLabels;
                    c.visible && (!1 !== e.enabled || c._hasPointLabels) && (e = function (c) {
                        return c.forEach(function (c) {
                            c.visible && (y(c.dataLabels) ? c.dataLabels : c.dataLabel ? [c.dataLabel] : []).forEach(function (e) {
                                var h = e.options;
                                e.labelrank = q(h.labelrank, c.labelrank, c.shapeArgs && c.shapeArgs.height);
                                h.allowOverlap ? (e.oldOpacity = e.opacity, e.newOpacity = 1, v(e, a)) : f.push(e)
                            })
                        })
                    }, e(c.nodes || []), e(c.points))
                });
                this.hideOverlappingLabels(f)
            });
            a.prototype.hideOverlappingLabels = function (a) {
                var f = this, c = a.length, e = f.renderer,
                    h, m, q, n = !1;
                var l = function (a) {
                    var c, d = a.box ? 0 : a.padding || 0, f = c = 0, b;
                    if (a && (!a.alignAttr || a.placed)) {
                        var g = a.alignAttr || {x: a.attr("x"), y: a.attr("y")};
                        var h = a.parentGroup;
                        a.width || (c = a.getBBox(), a.width = c.width, a.height = c.height, c = e.fontMetrics(null, a.element).h);
                        var l = a.width - 2 * d;
                        (b = {
                            left: "0",
                            center: "0.5",
                            right: "1"
                        }[a.alignValue]) ? f = +b * l : G(a.x) && Math.round(a.x) !== a.translateX && (f = a.x - a.translateX);
                        return {
                            x: g.x + (h.translateX || 0) + d - (f || 0),
                            y: g.y + (h.translateY || 0) + d - c,
                            width: a.width - 2 * d,
                            height: a.height - 2 *
                                d
                        }
                    }
                };
                for (m = 0; m < c; m++) if (h = a[m]) h.oldOpacity = h.opacity, h.newOpacity = 1, h.absoluteBox = l(h);
                a.sort(function (a, c) {
                    return (c.labelrank || 0) - (a.labelrank || 0)
                });
                for (m = 0; m < c; m++) {
                    var u = (l = a[m]) && l.absoluteBox;
                    for (h = m + 1; h < c; ++h) {
                        var y = (q = a[h]) && q.absoluteBox;
                        !u || !y || l === q || 0 === l.newOpacity || 0 === q.newOpacity || y.x >= u.x + u.width || y.x + y.width <= u.x || y.y >= u.y + u.height || y.y + y.height <= u.y || ((l.labelrank < q.labelrank ? l : q).newOpacity = 0)
                    }
                }
                a.forEach(function (a) {
                    v(a, f) && (n = !0)
                });
                n && x(f, "afterHideAllOverlappingLabels")
            }
        });
        L(a,
            "Core/Responsive.js", [a["Core/Utilities.js"]], function (a) {
                var v = a.extend, E = a.find, H = a.isArray, x = a.isObject, y = a.merge, G = a.objectEach, B = a.pick,
                    q = a.splat, h = a.uniqueKey, f = function () {
                        function a() {
                        }

                        a.prototype.currentOptions = function (a) {
                            function c(a, f, h, m) {
                                var l;
                                G(a, function (a, d) {
                                    if (!m && -1 < e.collectionsWithUpdate.indexOf(d) && f[d]) for (a = q(a), h[d] = [], l = 0; l < Math.max(a.length, f[d].length); l++) f[d][l] && (void 0 === a[l] ? h[d][l] = f[d][l] : (h[d][l] = {}, c(a[l], f[d][l], h[d][l], m + 1))); else x(a) ? (h[d] = H(a) ? [] : {}, c(a, f[d] ||
                                        {}, h[d], m + 1)) : h[d] = "undefined" === typeof f[d] ? null : f[d]
                                })
                            }

                            var e = this, f = {};
                            c(a, this.options, f, 0);
                            return f
                        };
                        a.prototype.matchResponsiveRule = function (a, c) {
                            var e = a.condition;
                            (e.callback || function () {
                                return this.chartWidth <= B(e.maxWidth, Number.MAX_VALUE) && this.chartHeight <= B(e.maxHeight, Number.MAX_VALUE) && this.chartWidth >= B(e.minWidth, 0) && this.chartHeight >= B(e.minHeight, 0)
                            }).call(this) && c.push(a._id)
                        };
                        a.prototype.setResponsive = function (a, c) {
                            var e = this.options.responsive, f = this.currentResponsive, n = [];
                            !c &&
                            e && e.rules && e.rules.forEach(function (a) {
                                "undefined" === typeof a._id && (a._id = h());
                                this.matchResponsiveRule(a, n)
                            }, this);
                            c = y.apply(void 0, n.map(function (a) {
                                return E((e || {}).rules || [], function (c) {
                                    return c._id === a
                                })
                            }).map(function (a) {
                                return a && a.chartOptions
                            }));
                            c.isResponsiveOptions = !0;
                            n = n.toString() || void 0;
                            n !== (f && f.ruleIds) && (f && this.update(f.undoOptions, a, !0), n ? (f = this.currentOptions(c), f.isResponsiveOptions = !0, this.currentResponsive = {
                                ruleIds: n,
                                mergedOptions: c,
                                undoOptions: f
                            }, this.update(c, a, !0)) : this.currentResponsive =
                                void 0)
                        };
                        return a
                    }();
                a = function () {
                    function a() {
                    }

                    a.compose = function (a) {
                        v(a.prototype, f.prototype);
                        return a
                    };
                    return a
                }();
                "";
                "";
                return a
            });
        L(a, "masters/highcharts.src.js", [a["Core/Globals.js"], a["Core/Utilities.js"], a["Core/DefaultOptions.js"], a["Core/Animation/Fx.js"], a["Core/Animation/AnimationUtilities.js"], a["Core/Renderer/HTML/AST.js"], a["Core/FormatUtilities.js"], a["Core/Renderer/SVG/SVGElement.js"], a["Core/Renderer/SVG/SVGRenderer.js"], a["Core/Renderer/HTML/HTMLElement.js"], a["Core/Renderer/HTML/HTMLRenderer.js"],
            a["Core/Axis/Axis.js"], a["Core/Axis/PlotLineOrBand.js"], a["Core/Axis/Tick.js"], a["Core/Pointer.js"], a["Core/MSPointer.js"], a["Core/Chart/Chart.js"], a["Core/Series/Series.js"], a["Core/Responsive.js"], a["Core/Color/Color.js"], a["Core/Time.js"]], function (a, u, E, H, x, y, G, B, q, h, f, c, e, t, m, w, n, l, J, K, A) {
            a.animate = x.animate;
            a.animObject = x.animObject;
            a.getDeferredAnimation = x.getDeferredAnimation;
            a.setAnimation = x.setAnimation;
            a.stop = x.stop;
            a.timers = H.timers;
            a.AST = y;
            a.Axis = c;
            a.Chart = n;
            a.chart = n.chart;
            a.Fx = H;
            a.PlotLineOrBand =
                e;
            a.Pointer = w.isRequired() ? w : m;
            a.Series = l;
            a.SVGElement = B;
            a.SVGRenderer = q;
            a.Tick = t;
            a.Time = A;
            a.Color = K;
            a.color = K.parse;
            f.compose(q);
            h.compose(B);
            a.defaultOptions = E.defaultOptions;
            a.getOptions = E.getOptions;
            a.time = E.defaultTime;
            a.setOptions = E.setOptions;
            a.dateFormat = G.dateFormat;
            a.format = G.format;
            a.numberFormat = G.numberFormat;
            a.addEvent = u.addEvent;
            a.arrayMax = u.arrayMax;
            a.arrayMin = u.arrayMin;
            a.attr = u.attr;
            a.clearTimeout = u.clearTimeout;
            a.correctFloat = u.correctFloat;
            a.createElement = u.createElement;
            a.css =
                u.css;
            a.defined = u.defined;
            a.destroyObjectProperties = u.destroyObjectProperties;
            a.discardElement = u.discardElement;
            a.erase = u.erase;
            a.error = u.error;
            a.extend = u.extend;
            a.extendClass = u.extendClass;
            a.find = u.find;
            a.fireEvent = u.fireEvent;
            a.getMagnitude = u.getMagnitude;
            a.getStyle = u.getStyle;
            a.inArray = u.inArray;
            a.isArray = u.isArray;
            a.isClass = u.isClass;
            a.isDOMElement = u.isDOMElement;
            a.isFunction = u.isFunction;
            a.isNumber = u.isNumber;
            a.isObject = u.isObject;
            a.isString = u.isString;
            a.keys = u.keys;
            a.merge = u.merge;
            a.normalizeTickInterval =
                u.normalizeTickInterval;
            a.objectEach = u.objectEach;
            a.offset = u.offset;
            a.pad = u.pad;
            a.pick = u.pick;
            a.pInt = u.pInt;
            a.relativeLength = u.relativeLength;
            a.removeEvent = u.removeEvent;
            a.splat = u.splat;
            a.stableSort = u.stableSort;
            a.syncTimeout = u.syncTimeout;
            a.timeUnits = u.timeUnits;
            a.uniqueKey = u.uniqueKey;
            a.useSerialIds = u.useSerialIds;
            a.wrap = u.wrap;
            J.compose(n);
            return a
        });
        a["masters/highcharts.src.js"]._modules = a;
        return a["masters/highcharts.src.js"]
    });
    //# sourceMappingURL=highcharts.js.map
</script>
{{--highchart-timeline--}}
<script>
    /*
 Highcharts JS v9.1.2 (2021-06-16)

 Timeline series

 (c) 2010-2021 Highsoft AS
 Author: Daniel Studencki

 License: www.highcharts.com/license
*/
    'use strict';
    (function (a) {
        "object" === typeof module && module.exports ? (a["default"] = a, module.exports = a) : "function" === typeof define && define.amd ? define("highcharts/modules/timeline", ["highcharts"], function (k) {
            a(k);
            a.Highcharts = k;
            return a
        }) : a("undefined" !== typeof Highcharts ? Highcharts : void 0)
    })(function (a) {
        function k(a, f, k, r) {
            a.hasOwnProperty(f) || (a[f] = r.apply(null, k))
        }

        a = a ? a._modules : {};
        k(a, "Series/Timeline/TimelinePoint.js", [a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, f) {
            var k =
                    this && this.__extends || function () {
                        var a = function (c, d) {
                            a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, d) {
                                a.__proto__ = d
                            } || function (a, d) {
                                for (var c in d) d.hasOwnProperty(c) && (a[c] = d[c])
                            };
                            return a(c, d)
                        };
                        return function (c, d) {
                            function v() {
                                this.constructor = c
                            }

                            a(c, d);
                            c.prototype = null === d ? Object.create(d) : (v.prototype = d.prototype, new v)
                        }
                    }(), r = a.seriesTypes.pie.prototype.pointClass, y = f.defined, h = f.isNumber, z = f.merge,
                q = f.objectEach, w = f.pick;
            return function (a) {
                function c() {
                    var d = null !== a && a.apply(this,
                        arguments) || this;
                    d.options = void 0;
                    d.series = void 0;
                    return d
                }

                k(c, a);
                c.prototype.alignConnector = function () {
                    var a = this.series, c = this.connector, m = this.dataLabel,
                        h = this.dataLabel.options = z(a.options.dataLabels, this.options.dataLabels),
                        g = this.series.chart, p = c.getBBox(), e = p.x + m.translateX;
                    p = p.y + m.translateY;
                    g.inverted ? p -= m.options.connectorWidth / 2 : e += m.options.connectorWidth / 2;
                    g = g.isInsidePlot(e, p);
                    c[g ? "animate" : "attr"]({d: this.getConnectorPath()});
                    a.chart.styledMode || c.attr({
                        stroke: h.connectorColor || this.color,
                        "stroke-width": h.connectorWidth, opacity: m[y(m.newOpacity) ? "newOpacity" : "opacity"]
                    })
                };
                c.prototype.drawConnector = function () {
                    var a = this.series;
                    this.connector || (this.connector = a.chart.renderer.path(this.getConnectorPath()).attr({zIndex: -1}).add(this.dataLabel));
                    this.series.chart.isInsidePlot(this.dataLabel.x, this.dataLabel.y) && this.alignConnector()
                };
                c.prototype.getConnectorPath = function () {
                    var a = this.series.chart, c = this.series.xAxis.len, m = a.inverted, f = m ? "x2" : "y2",
                        g = this.dataLabel, p = g.targetPosition, e =
                            {x1: this.plotX, y1: this.plotY, x2: this.plotX, y2: h(p.y) ? p.y : g.y},
                        b = (g.alignAttr || g)[f[0]] < this.series.yAxis.len / 2;
                    m && (e = {x1: this.plotY, y1: c - this.plotX, x2: p.x || g.x, y2: c - this.plotX});
                    b && (e[f] += g[m ? "width" : "height"]);
                    q(e, function (b, a) {
                        e[a] -= (g.alignAttr || g)[a[0]]
                    });
                    return a.renderer.crispLine([["M", e.x1, e.y1], ["L", e.x2, e.y2]], g.options.connectorWidth)
                };
                c.prototype.init = function () {
                    var c = a.prototype.init.apply(this, arguments);
                    c.name = w(c.name, "Event");
                    c.y = 1;
                    return c
                };
                c.prototype.isValid = function () {
                    return null !==
                        this.options.y
                };
                c.prototype.setState = function () {
                    var c = a.prototype.setState;
                    this.isNull || c.apply(this, arguments)
                };
                c.prototype.setVisible = function (a, c) {
                    var d = this.series;
                    c = w(c, d.options.ignoreHiddenPoint);
                    r.prototype.setVisible.call(this, a, !1);
                    d.processData();
                    c && d.chart.redraw()
                };
                return c
            }(a.series.prototype.pointClass)
        });
        k(a, "Series/Timeline/TimelineSeries.js", [a["Mixins/LegendSymbol.js"], a["Core/Color/Palette.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Renderer/SVG/SVGElement.js"], a["Series/Timeline/TimelinePoint.js"],
            a["Core/Utilities.js"]], function (a, f, k, r, y, h) {
            var z = this && this.__extends || function () {
                    var a = function (c, b) {
                        a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (b, a) {
                            b.__proto__ = a
                        } || function (b, a) {
                            for (var l in a) a.hasOwnProperty(l) && (b[l] = a[l])
                        };
                        return a(c, b)
                    };
                    return function (c, b) {
                        function l() {
                            this.constructor = c
                        }

                        a(c, b);
                        c.prototype = null === b ? Object.create(b) : (l.prototype = b.prototype, new l)
                    }
                }(), q = k.seriesTypes, w = q.column, A = q.line, c = h.addEvent, d = h.arrayMax, v = h.arrayMin,
                m = h.defined;
            q = h.extend;
            var x = h.merge, g = h.pick;
            h = function (a) {
                function e() {
                    var b = null !== a && a.apply(this, arguments) || this;
                    b.data = void 0;
                    b.options = void 0;
                    b.points = void 0;
                    b.userOptions = void 0;
                    b.visibilityMap = void 0;
                    return b
                }

                z(e, a);
                e.prototype.alignDataLabel = function (b, l, c, e) {
                    var n = this.chart.inverted, d = this.visibilityMap.filter(function (a) {
                        return a
                    }), t = this.visiblePointsCount, u = d.indexOf(b);
                    d = this.options.dataLabels;
                    var g = b.userDLOptions || {};
                    u = d.alternate ? u && u !== t - 1 ? 2 : 1.5 : 1;
                    t = Math.floor(this.xAxis.len / t);
                    var f = l.padding;
                    if (b.visible) {
                        var h =
                            Math.abs(g.x || b.options.dataLabels.x);
                        n ? (n = 2 * (h - f) - b.itemHeight / 2, n = {
                            width: n + "px",
                            textOverflow: l.width / n * l.height / 2 > t * u ? "ellipsis" : "none"
                        }) : n = {width: (g.width || d.width || t * u - 2 * f) + "px"};
                        l.css(n);
                        this.chart.styledMode || l.shadow(d.shadow)
                    }
                    a.prototype.alignDataLabel.apply(this, arguments)
                };
                e.prototype.bindAxes = function () {
                    var b = this;
                    a.prototype.bindAxes.call(b);
                    ["xAxis", "yAxis"].forEach(function (a) {
                        "xAxis" !== a || b[a].userOptions.type || (b[a].categories = b[a].hasNames = !0)
                    })
                };
                e.prototype.distributeDL = function () {
                    var a =
                        this, c = a.options.dataLabels, n, d, e = {}, g = 1, f = c.distance;
                    a.points.forEach(function (b) {
                        b.visible && !b.isNull && (n = b.options, d = b.options.dataLabels, a.hasRendered || (b.userDLOptions = x({}, d)), e[a.chart.inverted ? "x" : "y"] = c.alternate && g % 2 ? -f : f, n.dataLabels = x(e, b.userDLOptions), g++)
                    })
                };
                e.prototype.generatePoints = function () {
                    var b = this;
                    a.prototype.generatePoints.apply(b);
                    b.points.forEach(function (a, c) {
                        a.applyOptions({x: b.xData[c]}, b.xData[c])
                    })
                };
                e.prototype.getVisibilityMap = function () {
                    return (this.data.length ? this.data :
                        this.userOptions.data).map(function (a) {
                        return a && !1 !== a.visible && !a.isNull ? a : !1
                    })
                };
                e.prototype.getXExtremes = function (a) {
                    var b = this;
                    a = a.filter(function (a, c) {
                        return b.points[c].isValid() && b.points[c].visible
                    });
                    return {min: v(a), max: d(a)}
                };
                e.prototype.init = function () {
                    var b = this;
                    a.prototype.init.apply(b, arguments);
                    b.eventsToUnbind.push(c(b, "afterTranslate", function () {
                        var a, c = Number.MAX_VALUE;
                        b.points.forEach(function (b) {
                            b.isInside = b.isInside && b.visible;
                            b.visible && !b.isNull && (m(a) && (c = Math.min(c, Math.abs(b.plotX -
                                a))), a = b.plotX)
                        });
                        b.closestPointRangePx = c
                    }));
                    b.eventsToUnbind.push(c(b, "drawDataLabels", function () {
                        b.distributeDL()
                    }));
                    b.eventsToUnbind.push(c(b, "afterDrawDataLabels", function () {
                        var a;
                        b.points.forEach(function (b) {
                            if (a = b.dataLabel) return a.animate = function (a) {
                                this.targetPosition && (this.targetPosition = a);
                                return r.prototype.animate.apply(this, arguments)
                            }, a.targetPosition || (a.targetPosition = {}), b.drawConnector()
                        })
                    }));
                    b.eventsToUnbind.push(c(b.chart, "afterHideOverlappingLabel", function () {
                        b.points.forEach(function (a) {
                            a.connector &&
                            a.dataLabel && a.dataLabel.oldOpacity !== a.dataLabel.newOpacity && a.alignConnector()
                        })
                    }))
                };
                e.prototype.markerAttribs = function (b, c) {
                    var d = this.options.marker, e = b.marker || {}, f = e.symbol || d.symbol,
                        h = g(e.width, d.width, this.closestPointRangePx), l = g(e.height, d.height), k = 0;
                    if (this.xAxis.dateTime) return a.prototype.markerAttribs.call(this, b, c);
                    c && (d = d.states[c] || {}, c = e.states && e.states[c] || {}, k = g(c.radius, d.radius, k + (d.radiusPlus || 0)));
                    b.hasImage = f && 0 === f.indexOf("url");
                    return {
                        x: Math.floor(b.plotX) - h / 2 - k / 2, y: b.plotY -
                            l / 2 - k / 2, width: h + k, height: l + k
                    }
                };
                e.prototype.processData = function () {
                    var b = 0, c;
                    this.visibilityMap = this.getVisibilityMap();
                    this.visibilityMap.forEach(function (a) {
                        a && b++
                    });
                    this.visiblePointsCount = b;
                    for (c = 0; c < this.xData.length; c++) this.yData[c] = 1;
                    a.prototype.processData.call(this, arguments)
                };
                e.defaultOptions = x(A.defaultOptions, {
                    colorByPoint: !0,
                    stickyTracking: !1,
                    ignoreHiddenPoint: !0,
                    legendType: "point",
                    lineWidth: 4,
                    tooltip: {
                        headerFormat: '<span style="color:{point.color}">\u25cf</span> <span style="font-size: 10px"> {point.key}</span><br/>',
                        pointFormat: "{point.description}"
                    },
                    states: {hover: {lineWidthPlus: 0}},
                    dataLabels: {
                        enabled: !0,
                        allowOverlap: !0,
                        alternate: !0,
                        backgroundColor: f.backgroundColor,
                        borderWidth: 1,
                        borderColor: f.neutralColor40,
                        borderRadius: 3,
                        color: f.neutralColor80,
                        connectorWidth: 1,
                        distance: 100,
                        formatter: function () {
                            var a = this.series.chart.styledMode ? "<span>\u25cf </span>" : '<span style="color:' + this.point.color + '">\u25cf </span>';
                            return a += '<span class="highcharts-strong">' + (this.key || "") + "</span><br/>" + (this.point.label || "")
                        },
                        style: {textOutline: "none", fontWeight: "normal", fontSize: "12px"},
                        shadow: !1,
                        verticalAlign: "middle"
                    },
                    marker: {enabledThreshold: 0, symbol: "square", radius: 6, lineWidth: 2, height: 15},
                    showInLegend: !1,
                    colorKey: "x"
                });
                return e
            }(A);
            q(h.prototype, {
                drawLegendSymbol: a.drawRectangle,
                drawTracker: w.prototype.drawTracker,
                pointClass: y,
                trackerGroups: ["markerGroup", "dataLabelsGroup"]
            });
            k.registerSeriesType("timeline", h);
            "";
            "";
            return h
        });
        k(a, "masters/modules/timeline.src.js", [], function () {
        })
    });
    //# sourceMappingURL=timeline.js.map
</script>
{{--highchart-series-label--}}
<script>
    /*
 Highcharts JS v9.1.2 (2021-06-16)

 (c) 2009-2021 Torstein Honsi

 License: www.highcharts.com/license
*/
    'use strict';
    (function (k) {
        "object" === typeof module && module.exports ? (k["default"] = k, module.exports = k) : "function" === typeof define && define.amd ? define("highcharts/modules/series-label", ["highcharts"], function (u) {
            k(u);
            k.Highcharts = u;
            return k
        }) : k("undefined" !== typeof Highcharts ? Highcharts : void 0)
    })(function (k) {
        function u(k, A, y, u) {
            k.hasOwnProperty(A) || (k[A] = u.apply(null, y))
        }

        k = k ? k._modules : {};
        u(k, "Extensions/SeriesLabel.js", [k["Core/Animation/AnimationUtilities.js"], k["Core/Chart/Chart.js"], k["Core/FormatUtilities.js"],
            k["Core/DefaultOptions.js"], k["Core/Series/Series.js"], k["Core/Renderer/SVG/SVGRenderer.js"], k["Core/Utilities.js"]], function (k, u, y, K, E, F, x) {
            function C(b, c, a, f, d, e) {
                b = (e - c) * (a - b) - (f - c) * (d - b);
                return 0 < b ? !0 : !(0 > b)
            }

            function D(b, c, a, f, d, e, r, h) {
                return C(b, c, d, e, r, h) !== C(a, f, d, e, r, h) && C(b, c, a, f, d, e) !== C(b, c, a, f, r, h)
            }

            function A(b, c, a, f, d, e, r, h) {
                return D(b, c, b + a, c, d, e, r, h) || D(b + a, c, b + a, c + f, d, e, r, h) || D(b, c + f, b + a, c + f, d, e, r, h) || D(b, c, b, c + f, d, e, r, h)
            }

            function I(b) {
                if (this.renderer) {
                    var c = this, a = G(c.renderer.globalAnimation).duration;
                    c.labelSeries = [];
                    c.labelSeriesMaxSum = 0;
                    x.clearTimeout(c.seriesLabelTimer);
                    c.series.forEach(function (f) {
                        var d = f.options.label, e = f.labelBySeries, r = e && e.closest;
                        d.enabled && f.visible && (f.graph || f.area) && !f.isSeriesBoosting && (c.labelSeries.push(f), d.minFontSize && d.maxFontSize && (f.sum = f.yData.reduce(function (a, b) {
                            return (a || 0) + (b || 0)
                        }, 0), c.labelSeriesMaxSum = Math.max(c.labelSeriesMaxSum, f.sum)), "load" === b.type && (a = Math.max(a, G(f.options.animation).duration)), r && ("undefined" !== typeof r[0].plotX ? e.animate({
                            x: r[0].plotX +
                                r[1], y: r[0].plotY + r[2]
                        }) : e.attr({opacity: 0})))
                    });
                    c.seriesLabelTimer = L(function () {
                        c.series && c.labelSeries && c.drawSeriesLabels()
                    }, c.renderer.forExport || !a ? 0 : a)
                }
            }

            var G = k.animObject, M = y.format;
            k = K.setOptions;
            F = F.prototype.symbols;
            y = x.addEvent;
            var J = x.extend, N = x.fireEvent, H = x.isNumber, B = x.pick, L = x.syncTimeout;
            "";
            k({
                plotOptions: {
                    series: {
                        label: {
                            enabled: !0,
                            connectorAllowed: !1,
                            connectorNeighbourDistance: 24,
                            format: void 0,
                            formatter: void 0,
                            minFontSize: null,
                            maxFontSize: null,
                            onArea: null,
                            style: {fontWeight: "bold"},
                            boxesToAvoid: []
                        }
                    }
                }
            });
            F.connector = function (b, c, a, f, d) {
                var e = d && d.anchorX;
                d = d && d.anchorY;
                var r = a / 2;
                if (H(e) && H(d)) {
                    var h = [["M", e, d]];
                    var n = c - d;
                    0 > n && (n = -f - n);
                    n < a && (r = e < b + a / 2 ? n : a - n);
                    d > c + f ? h.push(["L", b + r, c + f]) : d < c ? h.push(["L", b + r, c]) : e < b ? h.push(["L", b, c + f / 2]) : e > b + a && h.push(["L", b + a, c + f / 2])
                }
                return h || []
            };
            E.prototype.getPointsOnGraph = function () {
                function b(b) {
                    var c = Math.round(b.plotX / 8) + "," + Math.round(b.plotY / 8);
                    p[c] || (p[c] = 1, a.push(b))
                }

                if (this.xAxis || this.yAxis) {
                    var c = this.points, a = [], f = this.graph || this.area,
                        d = f.element, e = this.chart.inverted, r = this.xAxis, h = this.yAxis, n = e ? h.pos : r.pos;
                    e = e ? r.pos : h.pos;
                    r = B(this.options.label.onArea, !!this.area);
                    h = h.getThreshold(this.options.threshold);
                    var p = {}, k;
                    if (this.getPointSpline && d.getPointAtLength && !r && c.length < this.chart.plotSizeX / 16) {
                        if (f.toD) {
                            var g = f.attr("d");
                            f.attr({d: f.toD})
                        }
                        var m = d.getTotalLength();
                        for (k = 0; k < m; k += 16) {
                            var l = d.getPointAtLength(k);
                            b({chartX: n + l.x, chartY: e + l.y, plotX: l.x, plotY: l.y})
                        }
                        g && f.attr({d: g});
                        l = c[c.length - 1];
                        l.chartX = n + l.plotX;
                        l.chartY = e +
                            l.plotY;
                        b(l)
                    } else for (m = c.length, k = 0; k < m; k += 1) {
                        l = c[k];
                        f = c[k - 1];
                        l.chartX = n + l.plotX;
                        l.chartY = e + l.plotY;
                        r && (l.chartCenterY = e + (l.plotY + B(l.yBottom, h)) / 2);
                        if (0 < k && (d = Math.abs(l.chartX - f.chartX), g = Math.abs(l.chartY - f.chartY), d = Math.max(d, g), 16 < d)) for (d = Math.ceil(d / 16), g = 1; g < d; g += 1) b({
                            chartX: f.chartX + g / d * (l.chartX - f.chartX),
                            chartY: f.chartY + g / d * (l.chartY - f.chartY),
                            chartCenterY: f.chartCenterY + g / d * (l.chartCenterY - f.chartCenterY),
                            plotX: f.plotX + g / d * (l.plotX - f.plotX),
                            plotY: f.plotY + g / d * (l.plotY - f.plotY)
                        });
                        H(l.plotY) &&
                        b(l)
                    }
                    return a
                }
            };
            E.prototype.labelFontSize = function (b, c) {
                return b + this.sum / this.chart.labelSeriesMaxSum * (c - b) + "px"
            };
            E.prototype.checkClearPoint = function (b, c, a, f) {
                var d = this.chart, e = B(this.options.label.onArea, !!this.area),
                    k = e || this.options.label.connectorAllowed, h = Number.MAX_VALUE, n = Number.MAX_VALUE, p, z;
                for (z = 0; z < d.boxesToAvoid.length; z += 1) {
                    var g = d.boxesToAvoid[z];
                    var m = b + a.width;
                    var l = c;
                    var t = c + a.height;
                    if (!(b > g.right || m < g.left || l > g.bottom || t < g.top)) return !1
                }
                for (z = 0; z < d.series.length; z += 1) if (l = d.series[z],
                    g = l.interpolatedPoints, l.visible && g) {
                    for (m = 1; m < g.length; m += 1) {
                        if (g[m].chartX >= b - 16 && g[m - 1].chartX <= b + a.width + 16) {
                            if (A(b, c, a.width, a.height, g[m - 1].chartX, g[m - 1].chartY, g[m].chartX, g[m].chartY)) return !1;
                            this === l && !p && f && (p = A(b - 16, c - 16, a.width + 32, a.height + 32, g[m - 1].chartX, g[m - 1].chartY, g[m].chartX, g[m].chartY))
                        }
                        if ((k || p) && (this !== l || e)) {
                            t = b + a.width / 2 - g[m].chartX;
                            var u = c + a.height / 2 - g[m].chartY;
                            h = Math.min(h, t * t + u * u)
                        }
                    }
                    if (!e && k && this === l && (f && !p || h < Math.pow(this.options.label.connectorNeighbourDistance,
                        2))) {
                        for (m = 1; m < g.length; m += 1) if (p = Math.min(Math.pow(b + a.width / 2 - g[m].chartX, 2) + Math.pow(c + a.height / 2 - g[m].chartY, 2), Math.pow(b - g[m].chartX, 2) + Math.pow(c - g[m].chartY, 2), Math.pow(b + a.width - g[m].chartX, 2) + Math.pow(c - g[m].chartY, 2), Math.pow(b + a.width - g[m].chartX, 2) + Math.pow(c + a.height - g[m].chartY, 2), Math.pow(b - g[m].chartX, 2) + Math.pow(c + a.height - g[m].chartY, 2)), p < n) {
                            n = p;
                            var w = g[m]
                        }
                        p = !0
                    }
                }
                return !f || p ? {x: b, y: c, weight: h - (w ? n : 0), connectorPoint: w} : !1
            };
            u.prototype.drawSeriesLabels = function () {
                var b = this, c = this.labelSeries;
                b.boxesToAvoid = [];
                c.forEach(function (a) {
                    a.interpolatedPoints = a.getPointsOnGraph();
                    (a.options.label.boxesToAvoid || []).forEach(function (a) {
                        b.boxesToAvoid.push(a)
                    })
                });
                b.series.forEach(function (a) {
                    function c(a, b, c) {
                        var d = Math.max(u, B(y, -Infinity)), e = Math.min(u + m, B(A, Infinity));
                        return a > d && a <= e - c.width && b >= g && b <= g + l - c.height
                    }

                    var d = a.options.label;
                    if (d && (a.xAxis || a.yAxis)) {
                        var e = "highcharts-color-" + B(a.colorIndex, "none"), k = !a.labelBySeries, h = d.minFontSize,
                            n = d.maxFontSize, p = b.inverted, u = p ? a.yAxis.pos : a.xAxis.pos,
                            g = p ? a.xAxis.pos : a.yAxis.pos, m = b.inverted ? a.yAxis.len : a.xAxis.len,
                            l = b.inverted ? a.xAxis.len : a.yAxis.len, t = a.interpolatedPoints,
                            x = B(d.onArea, !!a.area), w = [], q, v = a.labelBySeries;
                        if (x && !p) {
                            p = [a.xAxis.toPixels(a.xData[0]), a.xAxis.toPixels(a.xData[a.xData.length - 1])];
                            var y = Math.min.apply(Math, p);
                            var A = Math.max.apply(Math, p)
                        }
                        if (a.visible && !a.isSeriesBoosting && t) {
                            v || (v = a.name, "string" === typeof d.format ? v = M(d.format, a, b) : d.formatter && (v = d.formatter.call(a)), a.labelBySeries = v = b.renderer.label(v, 0, -9999, "connector").addClass("highcharts-series-label highcharts-series-label-" +
                                a.index + " " + (a.options.className || "") + " " + e), b.renderer.styledMode || (v.css(J({color: x ? b.renderer.getContrast(a.color) : a.color}, d.style || {})), v.attr({
                                opacity: b.renderer.forExport ? 1 : 0,
                                stroke: a.color,
                                "stroke-width": 1
                            })), h && n && v.css({fontSize: a.labelFontSize(h, n)}), v.attr({
                                padding: 0,
                                zIndex: 3
                            }).add());
                            e = v.getBBox();
                            e.width = Math.round(e.width);
                            for (p = t.length - 1; 0 < p; --p) x ? (h = t[p].chartX - e.width / 2, n = t[p].chartCenterY - e.height / 2, c(h, n, e) && (q = a.checkClearPoint(h, n, e))) : (h = t[p].chartX + 3, n = t[p].chartY - e.height -
                                3, c(h, n, e) && (q = a.checkClearPoint(h, n, e, !0)), q && w.push(q), h = t[p].chartX + 3, n = t[p].chartY + 3, c(h, n, e) && (q = a.checkClearPoint(h, n, e, !0)), q && w.push(q), h = t[p].chartX - e.width - 3, n = t[p].chartY + 3, c(h, n, e) && (q = a.checkClearPoint(h, n, e, !0)), q && w.push(q), h = t[p].chartX - e.width - 3, n = t[p].chartY - e.height - 3, c(h, n, e) && (q = a.checkClearPoint(h, n, e, !0))), q && w.push(q);
                            if (d.connectorAllowed && !w.length && !x) for (h = u + m - e.width; h >= u; h -= 16) for (n = g; n < g + l - e.height; n += 16) (q = a.checkClearPoint(h, n, e, !0)) && w.push(q);
                            if (w.length) {
                                if (w.sort(function (a,
                                                     b) {
                                    return b.weight - a.weight
                                }), q = w[0], b.boxesToAvoid.push({
                                    left: q.x,
                                    right: q.x + e.width,
                                    top: q.y,
                                    bottom: q.y + e.height
                                }), (t = Math.sqrt(Math.pow(Math.abs(q.x - (v.x || 0)), 2) + Math.pow(Math.abs(q.y - (v.y || 0)), 2))) && a.labelBySeries && (w = {
                                    opacity: b.renderer.forExport ? 1 : 0,
                                    x: q.x,
                                    y: q.y
                                }, d = {opacity: 1}, 10 >= t && (d = {
                                    x: w.x,
                                    y: w.y
                                }, w = {}), t = void 0, k && (t = G(a.options.animation), t.duration *= .2), a.labelBySeries.attr(J(w, {
                                    anchorX: q.connectorPoint && q.connectorPoint.plotX + u,
                                    anchorY: q.connectorPoint && q.connectorPoint.plotY + g
                                })).animate(d,
                                    t), a.options.kdNow = !0, a.buildKDTree(), a = a.searchPoint({
                                    chartX: q.x,
                                    chartY: q.y
                                }, !0))) v.closest = [a, q.x - (a.plotX || 0), q.y - (a.plotY || 0)]
                            } else v && (a.labelBySeries = v.destroy())
                        } else v && (a.labelBySeries = v.destroy())
                    }
                });
                N(b, "afterDrawSeriesLabels")
            };
            y(u, "load", I);
            y(u, "redraw", I)
        });
        u(k, "masters/modules/series-label.src.js", [], function () {
        })
    });
    //# sourceMappingURL=series-label.js.map
</script>
{{--highchart-wordcloud--}}
<script>
    /*
 Highcharts JS v9.1.2 (2021-06-16)

 (c) 2016-2021 Highsoft AS
 Authors: Jon Arild Nygard

 License: www.highcharts.com/license
*/
    'use strict';
    (function (a) {
        "object" === typeof module && module.exports ? (a["default"] = a, module.exports = a) : "function" === typeof define && define.amd ? define("highcharts/modules/wordcloud", ["highcharts"], function (l) {
            a(l);
            a.Highcharts = l;
            return a
        }) : a("undefined" !== typeof Highcharts ? Highcharts : void 0)
    })(function (a) {
        function l(a, d, h, z) {
            a.hasOwnProperty(d) || (a[d] = z.apply(null, h))
        }

        a = a ? a._modules : {};
        l(a, "Mixins/Polygon.js", [a["Core/Globals.js"], a["Core/Utilities.js"]], function (a, d) {
            var h = d.find, z = d.isArray, k = d.isNumber,
                p = a.deg2rad, g = function (e, b) {
                    b = k(b) ? b : 14;
                    b = Math.pow(10, b);
                    return Math.round(e * b) / b
                }, t = function (e, b) {
                    var c = b[0] - e[0];
                    e = b[1] - e[1];
                    return [[-e, c], [e, -c]]
                }, u = function (e, b) {
                    e = e.map(function (c) {
                        return c[0] * b[0] + c[1] * b[1]
                    });
                    return {min: Math.min.apply(this, e), max: Math.max.apply(this, e)}
                }, m = function (e, b) {
                    var c = e[0];
                    e = e[1];
                    var f = p * -b;
                    b = Math.cos(f);
                    f = Math.sin(f);
                    return [g(c * b - e * f), g(c * f + e * b)]
                }, A = function (e, b, c) {
                    e = m([e[0] - b[0], e[1] - b[1]], c);
                    return [e[0] + b[0], e[1] + b[1]]
                }, y = function (e) {
                    var b = e.axes;
                    if (!z(b)) {
                        b = [];
                        var c =
                            c = e.concat([e[0]]);
                        c.reduce(function (c, B) {
                            var f = t(c, B)[0];
                            h(b, function (c) {
                                return c[0] === f[0] && c[1] === f[1]
                            }) || b.push(f);
                            return B
                        });
                        e.axes = b
                    }
                    return b
                }, l = function (e, b) {
                    e = y(e);
                    b = y(b);
                    return e.concat(b)
                };
            return {
                getBoundingBoxFromPolygon: function (e) {
                    return e.reduce(function (b, c) {
                        var f = c[0];
                        c = c[1];
                        b.left = Math.min(f, b.left);
                        b.right = Math.max(f, b.right);
                        b.bottom = Math.max(c, b.bottom);
                        b.top = Math.min(c, b.top);
                        return b
                    }, {
                        left: Number.MAX_VALUE,
                        right: -Number.MAX_VALUE,
                        bottom: -Number.MAX_VALUE,
                        top: Number.MAX_VALUE
                    })
                },
                getPolygon: function (e, b, c, f, B) {
                    var g = [e, b], C = e - c / 2;
                    e += c / 2;
                    c = b - f / 2;
                    b += f / 2;
                    return [[C, c], [e, c], [e, b], [C, b]].map(function (c) {
                        return A(c, g, -B)
                    })
                }, isPolygonsColliding: function (e, b) {
                    var c = l(e, b);
                    return !h(c, function (c) {
                        var f = u(e, c);
                        c = u(b, c);
                        return !!(c.min > f.max || c.max < f.min)
                    })
                }, movePolygon: function (e, b, c) {
                    return c.map(function (c) {
                        return [c[0] + e, c[1] + b]
                    })
                }, rotate2DToOrigin: m, rotate2DToPoint: A
            }
        });
        l(a, "Mixins/DrawPoint.js", [], function () {
            var a = function (a) {
                return "function" === typeof a
            }, d = function (d) {
                var h = this,
                    k = d.animatableAttribs, p = d.onComplete, g = d.css, t = d.renderer,
                    u = this.series && this.series.chart.hasRendered ? void 0 : this.series && this.series.options.animation,
                    m = this.graphic;
                if (this.shouldDraw()) m || (this.graphic = m = t[d.shapeType](d.shapeArgs).add(d.group)), m.css(g).attr(d.attribs).animate(k, d.isNew ? !1 : u, p); else if (m) {
                    var A = function () {
                        h.graphic = m = m && m.destroy();
                        a(p) && p()
                    };
                    Object.keys(k).length ? m.animate(k, void 0, function () {
                        A()
                    }) : A()
                }
            };
            return {
                draw: d, drawPoint: function (a) {
                    (a.attribs = a.attribs || {})["class"] =
                        this.getClassName();
                    d.call(this, a)
                }, isFn: a
            }
        });
        l(a, "Series/Wordcloud/WordcloudPoint.js", [a["Mixins/DrawPoint.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"]], function (a, d, h) {
            var l = this && this.__extends || function () {
                var a = function (d, g) {
                    a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, g) {
                        a.__proto__ = g
                    } || function (a, g) {
                        for (var d in g) g.hasOwnProperty(d) && (a[d] = g[d])
                    };
                    return a(d, g)
                };
                return function (d, g) {
                    function k() {
                        this.constructor = d
                    }

                    a(d, g);
                    d.prototype = null === g ? Object.create(g) :
                        (k.prototype = g.prototype, new k)
                }
            }();
            h = h.extend;
            d = function (a) {
                function d() {
                    var d = null !== a && a.apply(this, arguments) || this;
                    d.dimensions = void 0;
                    d.options = void 0;
                    d.polygon = void 0;
                    d.rect = void 0;
                    d.series = void 0;
                    return d
                }

                l(d, a);
                d.prototype.shouldDraw = function () {
                    return !this.isNull
                };
                d.prototype.isValid = function () {
                    return !0
                };
                return d
            }(d.seriesTypes.column.prototype.pointClass);
            h(d.prototype, {draw: a.drawPoint, weight: 1});
            return d
        });
        l(a, "Series/Wordcloud/WordcloudUtils.js", [a["Mixins/Polygon.js"], a["Core/Utilities.js"]],
            function (a, d) {
                var h = a.isPolygonsColliding, l = a.movePolygon, k = d.extend, p = d.find, g = d.isNumber,
                    t = d.isObject, u = d.merge, m;
                (function (a) {
                    function d(c, f) {
                        return !(f.left > c.right || f.right < c.left || f.top > c.bottom || f.bottom < c.top)
                    }

                    function m(c, f) {
                        var a = !1, b = c.rect, e = c.polygon, r = c.lastCollidedWith, q = function (f) {
                            var a = d(b, f.rect);
                            a && (c.rotation % 90 || f.rotation % 90) && (a = h(e, f.polygon));
                            return a
                        };
                        r && ((a = q(r)) || delete c.lastCollidedWith);
                        a || (a = !!p(f, function (f) {
                            var a = q(f);
                            a && (c.lastCollidedWith = f);
                            return a
                        }));
                        return a
                    }

                    function e(c, f) {
                        f = 4 * c;
                        var a = Math.ceil((Math.sqrt(f) - 1) / 2), b = 2 * a + 1, d = Math.pow(b, 2), e = !1;
                        --b;
                        1E4 >= c && ("boolean" === typeof e && f >= d - b && (e = {
                            x: a - (d - f),
                            y: -a
                        }), d -= b, "boolean" === typeof e && f >= d - b && (e = {
                            x: -a,
                            y: -a + (d - f)
                        }), d -= b, "boolean" === typeof e && (e = f >= d - b ? {x: -a + (d - f), y: a} : {
                            x: a,
                            y: a - (d - f - b)
                        }), e.x *= 5, e.y *= 5);
                        return e
                    }

                    function b(c, f) {
                        var a = f.width / 2, b = -(f.height / 2), d = f.height / 2;
                        return !(-(f.width / 2) < c.left && a > c.right && b < c.top && d > c.bottom)
                    }

                    a.isRectanglesIntersecting = d;
                    a.intersectsAnyWord = m;
                    a.archimedeanSpiral = function (c,
                                                    f) {
                        var a = f.field;
                        f = !1;
                        a = a.width * a.width + a.height * a.height;
                        var b = .8 * c;
                        1E4 >= c && (f = {
                            x: b * Math.cos(b),
                            y: b * Math.sin(b)
                        }, Math.min(Math.abs(f.x), Math.abs(f.y)) < a || (f = !1));
                        return f
                    };
                    a.squareSpiral = e;
                    a.rectangularSpiral = function (c, a) {
                        c = e(c, a);
                        a = a.field;
                        c && (c.x *= a.ratioX, c.y *= a.ratioY);
                        return c
                    };
                    a.getRandomPosition = function (c) {
                        return Math.round(c * (Math.random() + .5) / 2)
                    };
                    a.getScale = function (c, a, b) {
                        var f = 2 * Math.max(Math.abs(b.top), Math.abs(b.bottom));
                        b = 2 * Math.max(Math.abs(b.left), Math.abs(b.right));
                        return Math.min(0 <
                        b ? 1 / b * c : 1, 0 < f ? 1 / f * a : 1)
                    };
                    a.getPlayingField = function (c, a, b) {
                        b = b.reduce(function (c, a) {
                            a = a.dimensions;
                            var b = Math.max(a.width, a.height);
                            c.maxHeight = Math.max(c.maxHeight, a.height);
                            c.maxWidth = Math.max(c.maxWidth, a.width);
                            c.area += b * b;
                            return c
                        }, {maxHeight: 0, maxWidth: 0, area: 0});
                        b = Math.max(b.maxHeight, b.maxWidth, .85 * Math.sqrt(b.area));
                        var f = c > a ? c / a : 1;
                        c = a > c ? a / c : 1;
                        return {width: b * f, height: b * c, ratioX: f, ratioY: c}
                    };
                    a.getRotation = function (c, a, b, d) {
                        var f = !1;
                        g(c) && g(a) && g(b) && g(d) && 0 < c && -1 < a && d > b && (f = b + a % c * ((d - b) / (c -
                            1 || 1)));
                        return f
                    };
                    a.getSpiral = function (c, a) {
                        var b, f = [];
                        for (b = 1; 1E4 > b; b++) f.push(c(b, a));
                        return function (c) {
                            return 1E4 >= c ? f[c - 1] : !1
                        }
                    };
                    a.outsidePlayingField = b;
                    a.intersectionTesting = function (c, a) {
                        var f = a.placed, d = a.field, e = a.rectangle, g = a.polygon, q = a.spiral, v = 1,
                            n = {x: 0, y: 0}, h = c.rect = k({}, e);
                        c.polygon = g;
                        for (c.rotation = a.rotation; !1 !== n && (m(c, f) || b(h, d));) n = q(v), t(n) && (h.left = e.left + n.x, h.right = e.right + n.x, h.top = e.top + n.y, h.bottom = e.bottom + n.y, c.polygon = l(n.x, n.y, g)), v++;
                        return n
                    };
                    a.extendPlayingField =
                        function (a, b) {
                            if (t(a) && t(b)) {
                                var c = b.bottom - b.top;
                                var f = b.right - b.left;
                                b = a.ratioX;
                                var d = a.ratioY;
                                c = f * b > c * d ? f : c;
                                a = u(a, {width: a.width + c * b * 2, height: a.height + c * d * 2})
                            }
                            return a
                        };
                    a.updateFieldBoundaries = function (a, b) {
                        if (!g(a.left) || a.left > b.left) a.left = b.left;
                        if (!g(a.right) || a.right < b.right) a.right = b.right;
                        if (!g(a.top) || a.top > b.top) a.top = b.top;
                        if (!g(a.bottom) || a.bottom < b.bottom) a.bottom = b.bottom;
                        return a
                    }
                })(m || (m = {}));
                return m
            });
        l(a, "Series/Wordcloud/WordcloudSeries.js", [a["Core/Globals.js"], a["Mixins/Polygon.js"],
            a["Core/Series/Series.js"], a["Core/Series/SeriesRegistry.js"], a["Core/Utilities.js"], a["Series/Wordcloud/WordcloudPoint.js"], a["Series/Wordcloud/WordcloudUtils.js"]], function (a, d, h, l, k, p, g) {
            var t = this && this.__extends || function () {
                    var a = function (b, c) {
                        a = Object.setPrototypeOf || {__proto__: []} instanceof Array && function (a, b) {
                            a.__proto__ = b
                        } || function (a, b) {
                            for (var c in b) b.hasOwnProperty(c) && (a[c] = b[c])
                        };
                        return a(b, c)
                    };
                    return function (b, c) {
                        function d() {
                            this.constructor = b
                        }

                        a(b, c);
                        b.prototype = null === c ? Object.create(c) :
                            (d.prototype = c.prototype, new d)
                    }
                }(), u = a.noop, m = d.getBoundingBoxFromPolygon, A = d.getPolygon, z = d.isPolygonsColliding,
                y = d.rotate2DToOrigin;
            d = d.rotate2DToPoint;
            var e = l.seriesTypes.column, b = k.extend, c = k.isArray, f = k.isNumber, B = k.isObject, G = k.merge;
            k = function (d) {
                function r() {
                    var a = null !== d && d.apply(this, arguments) || this;
                    a.data = void 0;
                    a.options = void 0;
                    a.points = void 0;
                    return a
                }

                t(r, d);
                r.prototype.bindAxes = function () {
                    var a = {
                        endOnTick: !1,
                        gridLineWidth: 0,
                        lineWidth: 0,
                        maxPadding: 0,
                        startOnTick: !1,
                        title: void 0,
                        tickPositions: []
                    };
                    h.prototype.bindAxes.call(this);
                    b(this.yAxis.options, a);
                    b(this.xAxis.options, a)
                };
                r.prototype.pointAttribs = function (b, c) {
                    b = a.seriesTypes.column.prototype.pointAttribs.call(this, b, c);
                    delete b.stroke;
                    delete b["stroke-width"];
                    return b
                };
                r.prototype.deriveFontSize = function (a, b, c) {
                    a = f(a) ? a : 0;
                    b = f(b) ? b : 1;
                    c = f(c) ? c : 1;
                    return Math.floor(Math.max(c, a * b))
                };
                r.prototype.drawPoints = function () {
                    var a = this, c = a.hasRendered, d = a.xAxis, e = a.yAxis, r = a.group, h = a.options,
                        k = h.animation, l = h.allowExtendPlayingField, u = a.chart.renderer,
                        p = u.text().add(r), t = [], C = a.placementStrategy[h.placementStrategy], z = h.rotation,
                        y = a.points.map(function (a) {
                            return a.weight
                        }), E = Math.max.apply(null, y), D = a.points.concat().sort(function (a, b) {
                            return b.weight - a.weight
                        });
                    a.group.attr({scaleX: 1, scaleY: 1});
                    D.forEach(function (c) {
                        var d = a.deriveFontSize(1 / E * c.weight, h.maxFontSize, h.minFontSize);
                        d = b({fontSize: d + "px"}, h.style);
                        p.css(d).attr({x: 0, y: 0, text: c.name});
                        d = p.getBBox(!0);
                        c.dimensions = {height: d.height, width: d.width}
                    });
                    var x = g.getPlayingField(d.len, e.len,
                        D);
                    var F = g.getSpiral(a.spirals[h.spiral], {field: x});
                    D.forEach(function (d) {
                        var e = a.deriveFontSize(1 / E * d.weight, h.maxFontSize, h.minFontSize);
                        e = b({fontSize: e + "px"}, h.style);
                        var n = C(d, {data: D, field: x, placed: t, rotation: z}),
                            q = b(a.pointAttribs(d, d.selected && "select"), {
                                align: "center",
                                "alignment-baseline": "middle",
                                x: n.x,
                                y: n.y,
                                text: d.name,
                                rotation: f(n.rotation) ? n.rotation : void 0
                            }), p = A(n.x, n.y, d.dimensions.width, d.dimensions.height, n.rotation), w = m(p),
                            v = g.intersectionTesting(d, {
                                rectangle: w, polygon: p, field: x,
                                placed: t, spiral: F, rotation: n.rotation
                            });
                        !v && l && (x = g.extendPlayingField(x, w), v = g.intersectionTesting(d, {
                            rectangle: w,
                            polygon: p,
                            field: x,
                            placed: t,
                            spiral: F,
                            rotation: n.rotation
                        }));
                        B(v) ? (q.x = (q.x || 0) + v.x, q.y = (q.y || 0) + v.y, w.left += v.x, w.right += v.x, w.top += v.y, w.bottom += v.y, x = g.updateFieldBoundaries(x, w), t.push(d), d.isNull = !1, d.isInside = !0) : d.isNull = !0;
                        if (k) {
                            var y = {x: q.x, y: q.y};
                            c ? (delete q.x, delete q.y) : (q.x = 0, q.y = 0)
                        }
                        d.draw({
                            animatableAttribs: y,
                            attribs: q,
                            css: e,
                            group: r,
                            renderer: u,
                            shapeArgs: void 0,
                            shapeType: "text"
                        })
                    });
                    p = p.destroy();
                    d = g.getScale(d.len, e.len, x);
                    a.group.attr({scaleX: d, scaleY: d})
                };
                r.prototype.hasData = function () {
                    return B(this) && !0 === this.visible && c(this.points) && 0 < this.points.length
                };
                r.prototype.getPlotBox = function () {
                    var a = this.chart, b = a.inverted, c = this[b ? "yAxis" : "xAxis"];
                    b = this[b ? "xAxis" : "yAxis"];
                    return {
                        translateX: (c ? c.left : a.plotLeft) + (c ? c.len : a.plotWidth) / 2,
                        translateY: (b ? b.top : a.plotTop) + (b ? b.len : a.plotHeight) / 2,
                        scaleX: 1,
                        scaleY: 1
                    }
                };
                r.defaultOptions = G(e.defaultOptions, {
                    allowExtendPlayingField: !0,
                    animation: {duration: 500},
                    borderWidth: 0,
                    clip: !1,
                    colorByPoint: !0,
                    minFontSize: 1,
                    maxFontSize: 25,
                    placementStrategy: "center",
                    rotation: {from: 0, orientations: 2, to: 90},
                    showInLegend: !1,
                    spiral: "rectangular",
                    style: {fontFamily: "sans-serif", fontWeight: "900", whiteSpace: "nowrap"},
                    tooltip: {
                        followPointer: !0,
                        pointFormat: '<span style="color:{point.color}">\u25cf</span> {series.name}: <b>{point.weight}</b><br/>'
                    }
                });
                return r
            }(e);
            b(k.prototype, {
                animate: h.prototype.animate,
                animateDrilldown: u,
                animateDrillupFrom: u,
                pointClass: p,
                setClip: u,
                placementStrategy: {
                    random: function (a, b) {
                        var c = b.field;
                        b = b.rotation;
                        return {
                            x: g.getRandomPosition(c.width) - c.width / 2,
                            y: g.getRandomPosition(c.height) - c.height / 2,
                            rotation: g.getRotation(b.orientations, a.index, b.from, b.to)
                        }
                    }, center: function (a, b) {
                        b = b.rotation;
                        return {x: 0, y: 0, rotation: g.getRotation(b.orientations, a.index, b.from, b.to)}
                    }
                },
                pointArrayMap: ["weight"],
                spirals: {archimedean: g.archimedeanSpiral, rectangular: g.rectangularSpiral, square: g.squareSpiral},
                utils: {
                    extendPlayingField: g.extendPlayingField,
                    getRotation: g.getRotation, isPolygonsColliding: z, rotate2DToOrigin: y, rotate2DToPoint: d
                }
            });
            l.registerSeriesType("wordcloud", k);
            "";
            return k
        });
        l(a, "masters/modules/wordcloud.src.js", [], function () {
        })
    });
    //# sourceMappingURL=wordcloud.js.map
</script>
{{--more--}}
<script>
    /*
 Highcharts JS v9.2.2 (2021-08-24)

 (c) 2009-2021 Torstein Honsi

 License: www.highcharts.com/license
*/
    'use strict';(function(e){"object"===typeof module&&module.exports?(e["default"]=e,module.exports=e):"function"===typeof define&&define.amd?define("highcharts/highcharts-more",["highcharts"],function(z){e(z);e.Highcharts=z;return e}):e("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(e){function z(e,d,h,c){e.hasOwnProperty(d)||(e[d]=c.apply(null,h))}e=e?e._modules:{};z(e,"Extensions/Pane.js",[e["Core/Chart/Chart.js"],e["Core/Globals.js"],e["Core/Color/Palette.js"],e["Core/Pointer.js"],
        e["Core/Utilities.js"],e["Mixins/CenteredSeries.js"]],function(e,d,h,c,a,t){function m(b,p,a){return Math.sqrt(Math.pow(b-a[0],2)+Math.pow(p-a[1],2))<=a[2]/2}var l=a.addEvent,r=a.extend,x=a.merge,b=a.pick,q=a.splat;e.prototype.collectionsWithUpdate.push("pane");a=function(){function b(b,a){this.options=this.chart=this.center=this.background=void 0;this.coll="pane";this.defaultOptions={center:["50%","50%"],size:"85%",innerSize:"0%",startAngle:0};this.defaultBackgroundOptions={shape:"circle",borderWidth:1,
        borderColor:h.neutralColor20,backgroundColor:{linearGradient:{x1:0,y1:0,x2:0,y2:1},stops:[[0,h.backgroundColor],[1,h.neutralColor10]]},from:-Number.MAX_VALUE,innerRadius:0,to:Number.MAX_VALUE,outerRadius:"105%"};this.init(b,a)}b.prototype.init=function(b,a){this.chart=a;this.background=[];a.pane.push(this);this.setOptions(b)};b.prototype.setOptions=function(b){this.options=x(this.defaultOptions,this.chart.angular?{background:{}}:void 0,b)};b.prototype.render=function(){var b=this.options,a=this.options.background,
        k=this.chart.renderer;this.group||(this.group=k.g("pane-group").attr({zIndex:b.zIndex||0}).add());this.updateCenter();if(a)for(a=q(a),b=Math.max(a.length,this.background.length||0),k=0;k<b;k++)a[k]&&this.axis?this.renderBackground(x(this.defaultBackgroundOptions,a[k]),k):this.background[k]&&(this.background[k]=this.background[k].destroy(),this.background.splice(k,1))};b.prototype.renderBackground=function(b,a){var k="animate",p={"class":"highcharts-pane "+(b.className||"")};this.chart.styledMode||
    r(p,{fill:b.backgroundColor,stroke:b.borderColor,"stroke-width":b.borderWidth});this.background[a]||(this.background[a]=this.chart.renderer.path().add(this.group),k="attr");this.background[a][k]({d:this.axis.getPlotBandPath(b.from,b.to,b)}).attr(p)};b.prototype.updateCenter=function(b){this.center=(b||this.axis||{}).center=t.getCenter.call(this)};b.prototype.update=function(b,a){x(!0,this.options,b);this.setOptions(this.options);this.render();this.chart.axes.forEach(function(b){b.pane===this&&(b.pane=
        null,b.update({},a))},this)};return b}();e.prototype.getHoverPane=function(b){var a=this,k;b&&a.pane.forEach(function(p){var q=b.chartX-a.plotLeft,v=b.chartY-a.plotTop;m(a.inverted?v:q,a.inverted?q:v,p.center)&&(k=p)});return k};l(e,"afterIsInsidePlot",function(b){this.polar&&(b.isInsidePlot=this.pane.some(function(a){return m(b.x,b.y,a.center)}))});l(c,"beforeGetHoverData",function(a){var k=this.chart;k.polar?(k.hoverPane=k.getHoverPane(a),a.filter=function(q){return q.visible&&!(!a.shared&&q.directTouch)&&
        b(q.options.enableMouseTracking,!0)&&(!k.hoverPane||q.xAxis.pane===k.hoverPane)}):k.hoverPane=void 0});l(c,"afterGetHoverData",function(b){var a=this.chart;b.hoverPoint&&b.hoverPoint.plotX&&b.hoverPoint.plotY&&a.hoverPane&&!m(b.hoverPoint.plotX,b.hoverPoint.plotY,a.hoverPane.center)&&(b.hoverPoint=void 0)});d.Pane=a;return d.Pane});z(e,"Core/Axis/RadialAxis.js",[e["Core/Axis/AxisDefaults.js"],e["Core/DefaultOptions.js"],e["Core/Globals.js"],e["Core/Utilities.js"]],function(e,d,h,c){var a=d.defaultOptions,
        t=h.noop,m=c.addEvent,l=c.correctFloat,r=c.defined,x=c.extend,b=c.fireEvent,q=c.merge,k=c.pick,p=c.relativeLength,v=c.wrap,B;(function(c){function d(){this.autoConnect=this.isCircular&&"undefined"===typeof k(this.userMax,this.options.max)&&l(this.endAngleRad-this.startAngleRad)===l(2*Math.PI);!this.isCircular&&this.chart.inverted&&this.max++;this.autoConnect&&(this.max+=this.categories&&1||this.pointRange||this.closestPointRange||0)}function y(){var f=this;return function(){if(f.isRadial&&f.tickPositions&&
        f.options.labels&&!0!==f.options.labels.allowOverlap)return f.tickPositions.map(function(g){return f.ticks[g]&&f.ticks[g].label}).filter(function(f){return!!f})}}function h(){return t}function g(f,g,b){var n=this.pane.center,u=f.value;if(this.isCircular){if(r(u))f.point&&(a=f.point.shapeArgs||{},a.start&&(u=this.chart.inverted?this.translate(f.point.rectPlotY,!0):f.point.x));else{var a=f.chartX||0;var w=f.chartY||0;u=this.translate(Math.atan2(w-b,a-g)-this.startAngleRad,!0)}f=this.getPosition(u);
        a=f.x;w=f.y}else r(u)||(a=f.chartX,w=f.chartY),r(a)&&r(w)&&(b=n[1]+this.chart.plotTop,u=this.translate(Math.min(Math.sqrt(Math.pow(a-g,2)+Math.pow(w-b,2)),n[2]/2)-n[3]/2,!0));return[u,a||0,w||0]}function f(f,g,b){f=this.pane.center;var u=this.chart,n=this.left||0,a=this.top||0,w=k(g,f[2]/2-this.offset);"undefined"===typeof b&&(b=this.horiz?0:this.center&&-this.center[3]/2);b&&(w+=b);this.isCircular||"undefined"!==typeof g?(g=this.chart.renderer.symbols.arc(n+f[0],a+f[1],w,w,{start:this.startAngleRad,
        end:this.endAngleRad,open:!0,innerR:0}),g.xBounds=[n+f[0]],g.yBounds=[a+f[1]-w]):(g=this.postTranslate(this.angleRad,w),g=[["M",this.center[0]+u.plotLeft,this.center[1]+u.plotTop],["L",g.x,g.y]]);return g}function u(){this.constructor.prototype.getOffset.call(this);this.chart.axisOffset[this.side]=0}function n(f,g,b){var u=this.chart,n=function(f){if("string"===typeof f){var g=parseInt(f,10);y.test(f)&&(g=g*A/100);return g}return f},a=this.center,w=this.startAngleRad,A=a[2]/2,q=Math.min(this.offset,
        0),p=this.left||0,v=this.top||0,y=/%$/,F=this.isCircular,c=k(n(b.outerRadius),A),d=n(b.innerRadius);n=k(n(b.thickness),10);if("polygon"===this.options.gridLineInterpolation)q=this.getPlotLinePath({value:f}).concat(this.getPlotLinePath({value:g,reverse:!0}));else{f=Math.max(f,this.min);g=Math.min(g,this.max);f=this.translate(f);g=this.translate(g);F||(c=f||0,d=g||0);if("circle"!==b.shape&&F)b=w+(f||0),w+=g||0;else{b=-Math.PI/2;w=1.5*Math.PI;var l=!0}c-=q;q=u.renderer.symbols.arc(p+a[0],v+a[1],c,c,
        {start:Math.min(b,w),end:Math.max(b,w),innerR:k(d,c-(n-q)),open:l});F&&(F=(w+b)/2,p=p+a[0]+a[2]/2*Math.cos(F),q.xBounds=F>-Math.PI/2&&F<Math.PI/2?[p,u.plotWidth]:[0,p],q.yBounds=[v+a[1]+a[2]/2*Math.sin(F)],q.yBounds[0]+=F>-Math.PI&&0>F||F>Math.PI?-10:10)}return q}function w(f){var g=this,b=this.pane.center,n=this.chart,u=n.inverted,a=f.reverse,w=this.pane.options.background?this.pane.options.background[0]||this.pane.options.background:{},q=w.innerRadius||"0%",A=w.outerRadius||"100%",k=b[0]+n.plotLeft,
        v=b[1]+n.plotTop,F=this.height,y=f.isCrosshair;w=b[3]/2;var c=f.value,d;var l=this.getPosition(c);var h=l.x;l=l.y;y&&(l=this.getCrosshairPosition(f,k,v),c=l[0],h=l[1],l=l[2]);if(this.isCircular)c=Math.sqrt(Math.pow(h-k,2)+Math.pow(l-v,2)),a="string"===typeof q?p(q,1):q/c,n="string"===typeof A?p(A,1):A/c,b&&w&&(w/=c,a<w&&(a=w),n<w&&(n=w)),b=[["M",k+a*(h-k),v-a*(v-l)],["L",h-(1-n)*(h-k),l+(1-n)*(v-l)]];else if((c=this.translate(c))&&(0>c||c>F)&&(c=0),"circle"===this.options.gridLineInterpolation)b=
        this.getLinePath(0,c,w);else if(b=[],n[u?"yAxis":"xAxis"].forEach(function(f){f.pane===g.pane&&(d=f)}),d)for(k=d.tickPositions,d.autoConnect&&(k=k.concat([k[0]])),a&&(k=k.slice().reverse()),c&&(c+=w),v=0;v<k.length;v++)w=d.getPosition(k[v],c),b.push(v?["L",w.x,w.y]:["M",w.x,w.y]);return b}function A(f,g){f=this.translate(f);return this.postTranslate(this.isCircular?f:this.angleRad,k(this.isCircular?g:0>f?0:f,this.center[2]/2)-this.offset)}function F(){var f=this.center,g=this.chart,b=this.options.title;
        return{x:g.plotLeft+f[0]+(b.x||0),y:g.plotTop+f[1]-{high:.5,middle:.25,low:0}[b.align]*f[2]+(b.y||0)}}function J(b){b.beforeSetTickPositions=d;b.createLabelCollector=y;b.getCrosshairPosition=g;b.getLinePath=f;b.getOffset=u;b.getPlotBandPath=n;b.getPlotLinePath=w;b.getPosition=A;b.getTitlePosition=F;b.postTranslate=N;b.setAxisSize=E;b.setAxisTranslation=z;b.setOptions=O}function B(){var f=this.chart,g=this.options,b=this.pane,n=b&&b.options;f.angular&&this.isXAxis||!b||!f.angular&&!f.polar||(this.angleRad=
        (g.angle||0)*Math.PI/180,this.startAngleRad=(n.startAngle-90)*Math.PI/180,this.endAngleRad=(k(n.endAngle,n.startAngle+360)-90)*Math.PI/180,this.offset=g.offset||0)}function P(f){this.isRadial&&(f.align=void 0,f.preventDefault())}function H(){if(this.chart&&this.chart.labelCollectors){var f=this.labelCollector?this.chart.labelCollectors.indexOf(this.labelCollector):-1;0<=f&&this.chart.labelCollectors.splice(f,1)}}function K(f){var g=this.chart,b=g.inverted,n=g.angular,u=g.polar,a=this.isXAxis,w=this.coll,
        k=n&&a,A=g.options;f=f.userOptions.pane||0;f=this.pane=g.pane&&g.pane[f];var p;if("colorAxis"===w)this.isRadial=!1;else{if(n){if(k?(this.isHidden=!0,this.createLabelCollector=h,this.getOffset=t,this.render=this.redraw=Q,this.setTitle=this.setCategories=this.setScale=t):J(this),p=!a)this.defaultPolarOptions=R}else u&&(J(this),this.defaultPolarOptions=(p=this.horiz)?S:q("xAxis"===w?e.defaultXAxisOptions:e.defaultYAxisOptions,T),b&&"yAxis"===w&&(this.defaultPolarOptions.stackLabels=e.defaultYAxisOptions.stackLabels,
        this.defaultPolarOptions.reversedStacks=!0));n||u?(this.isRadial=!0,A.chart.zoomType=null,this.labelCollector||(this.labelCollector=this.createLabelCollector()),this.labelCollector&&g.labelCollectors.push(this.labelCollector)):this.isRadial=!1;f&&p&&(f.axis=this);this.isCircular=p}}function C(){this.isRadial&&this.beforeSetTickPositions()}function D(f){var g=this.label;if(g){var b=this.axis,n=g.getBBox(),u=b.options.labels,a=(b.translate(this.pos)+b.startAngleRad+Math.PI/2)/Math.PI*180%360,w=Math.round(a),
        q=r(u.y)?0:.3*-n.height,A=u.y,v=20,F=u.align,c="end",y=0>w?w+360:w,l=y,d=0,h=0;if(b.isRadial){var m=b.getPosition(this.pos,b.center[2]/2+p(k(u.distance,-25),b.center[2]/2,-b.center[2]/2));"auto"===u.rotation?g.attr({rotation:a}):r(A)||(A=b.chart.renderer.fontMetrics(g.styles&&g.styles.fontSize).b-n.height/2);r(F)||(b.isCircular?(n.width>b.len*b.tickInterval/(b.max-b.min)&&(v=0),F=a>v&&a<180-v?"left":a>180+v&&a<360-v?"right":"center"):F="center",g.attr({align:F}));if("auto"===F&&2===b.tickPositions.length&&
        b.isCircular){90<y&&180>y?y=180-y:270<y&&360>=y&&(y=540-y);180<l&&360>=l&&(l=360-l);if(b.pane.options.startAngle===w||b.pane.options.startAngle===w+360||b.pane.options.startAngle===w-360)c="start";F=-90<=w&&90>=w||-360<=w&&-270>=w||270<=w&&360>=w?"start"===c?"right":"left":"start"===c?"left":"right";70<l&&110>l&&(F="center");15>y||180<=y&&195>y?d=.3*n.height:15<=y&&35>=y?d="start"===c?0:.75*n.height:195<=y&&215>=y?d="start"===c?.75*n.height:0:35<y&&90>=y?d="start"===c?.25*-n.height:n.height:215<y&&
        270>=y&&(d="start"===c?n.height:.25*-n.height);15>l?h="start"===c?.15*-n.height:.15*n.height:165<l&&180>=l&&(h="start"===c?.15*n.height:.15*-n.height);g.attr({align:F});g.translate(h,d+q)}f.pos.x=m.x+(u.x||0);f.pos.y=m.y+(A||0)}}}function G(f){this.axis.getPosition&&x(f.pos,this.axis.getPosition(this.pos))}function N(f,g){var b=this.chart,n=this.center;f=this.startAngleRad+f;return{x:b.plotLeft+n[0]+Math.cos(f)*g,y:b.plotTop+n[1]+Math.sin(f)*g}}function Q(){this.isDirty=!1}function E(){this.constructor.prototype.setAxisSize.call(this);
        if(this.isRadial){this.pane.updateCenter(this);var f=this.center=this.pane.center.slice();if(this.isCircular)this.sector=this.endAngleRad-this.startAngleRad;else{var g=this.postTranslate(this.angleRad,f[3]/2);f[0]=g.x-this.chart.plotLeft;f[1]=g.y-this.chart.plotTop}this.len=this.width=this.height=(f[2]-f[3])*k(this.sector,1)/2}}function z(){this.constructor.prototype.setAxisTranslation.call(this);this.center&&(this.transA=this.isCircular?(this.endAngleRad-this.startAngleRad)/(this.max-this.min||1):
        (this.center[2]-this.center[3])/2/(this.max-this.min||1),this.minPixelPadding=this.isXAxis?this.transA*this.minPointOffset:0)}function O(f){f=this.options=q(this.constructor.defaultOptions,this.defaultPolarOptions,a[this.coll],f);f.plotBands||(f.plotBands=[]);b(this,"afterSetOptions")}function U(f,g,b,n,u,w,a){var k=this.axis;k.isRadial?(f=k.getPosition(this.pos,k.center[2]/2+n),g=["M",g,b,"L",f.x,f.y]):g=f.call(this,g,b,n,u,w,a);return g}var M=[],S={gridLineWidth:1,labels:{align:void 0,distance:15,
            x:0,y:void 0,style:{textOverflow:"none"}},maxPadding:0,minPadding:0,showLastLabel:!1,tickLength:0},R={labels:{align:"center",x:0,y:void 0},minorGridLineWidth:0,minorTickInterval:"auto",minorTickLength:10,minorTickPosition:"inside",minorTickWidth:1,tickLength:10,tickPosition:"inside",tickWidth:2,title:{rotation:0},zIndex:2},T={gridLineInterpolation:"circle",gridLineWidth:1,labels:{align:"right",x:-3,y:-2},showLastLabel:!1,title:{x:4,text:null,rotation:90}};c.compose=function(f,g){-1===M.indexOf(f)&&
    (M.push(f),m(f,"afterInit",B),m(f,"autoLabelAlign",P),m(f,"destroy",H),m(f,"init",K),m(f,"initialAxisTranslation",C));-1===M.indexOf(g)&&(M.push(g),m(g,"afterGetLabelPosition",D),m(g,"afterGetPosition",G),v(g.prototype,"getMarkPath",U));return f}})(B||(B={}));return B});z(e,"Series/AreaRange/AreaRangePoint.js",[e["Series/Area/AreaSeries.js"],e["Core/Series/Point.js"],e["Core/Utilities.js"]],function(e,d,h){var c=this&&this.__extends||function(){var a=function(c,l){a=Object.setPrototypeOf||{__proto__:[]}instanceof
        Array&&function(b,a){b.__proto__=a}||function(b,a){for(var k in a)a.hasOwnProperty(k)&&(b[k]=a[k])};return a(c,l)};return function(c,l){function b(){this.constructor=c}a(c,l);c.prototype=null===l?Object.create(l):(b.prototype=l.prototype,new b)}}(),a=d.prototype,t=h.defined,m=h.isNumber;return function(l){function d(){var a=null!==l&&l.apply(this,arguments)||this;a.high=void 0;a.low=void 0;a.options=void 0;a.plotHigh=void 0;a.plotLow=void 0;a.plotHighX=void 0;a.plotLowX=void 0;a.plotX=void 0;a.series=
        void 0;return a}c(d,l);d.prototype.setState=function(){var c=this.state,b=this.series,q=b.chart.polar;t(this.plotHigh)||(this.plotHigh=b.yAxis.toPixels(this.high,!0));t(this.plotLow)||(this.plotLow=this.plotY=b.yAxis.toPixels(this.low,!0));b.stateMarkerGraphic&&(b.lowerStateMarkerGraphic=b.stateMarkerGraphic,b.stateMarkerGraphic=b.upperStateMarkerGraphic);this.graphic=this.upperGraphic;this.plotY=this.plotHigh;q&&(this.plotX=this.plotHighX);a.setState.apply(this,arguments);this.state=c;this.plotY=
        this.plotLow;this.graphic=this.lowerGraphic;q&&(this.plotX=this.plotLowX);b.stateMarkerGraphic&&(b.upperStateMarkerGraphic=b.stateMarkerGraphic,b.stateMarkerGraphic=b.lowerStateMarkerGraphic,b.lowerStateMarkerGraphic=void 0);a.setState.apply(this,arguments)};d.prototype.haloPath=function(){var c=this.series.chart.polar,b=[];this.plotY=this.plotLow;c&&(this.plotX=this.plotLowX);this.isInside&&(b=a.haloPath.apply(this,arguments));this.plotY=this.plotHigh;c&&(this.plotX=this.plotHighX);this.isTopInside&&
    (b=b.concat(a.haloPath.apply(this,arguments)));return b};d.prototype.isValid=function(){return m(this.low)&&m(this.high)};return d}(e.prototype.pointClass)});z(e,"Series/AreaRange/AreaRangeSeries.js",[e["Series/AreaRange/AreaRangePoint.js"],e["Series/Area/AreaSeries.js"],e["Series/Column/ColumnSeries.js"],e["Core/Globals.js"],e["Core/Series/Series.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d,h,c,a,t,m){var l=this&&this.__extends||function(){var b=function(a,k){b=Object.setPrototypeOf||
        {__proto__:[]}instanceof Array&&function(b,g){b.__proto__=g}||function(b,g){for(var f in g)g.hasOwnProperty(f)&&(b[f]=g[f])};return b(a,k)};return function(a,k){function q(){this.constructor=a}b(a,k);a.prototype=null===k?Object.create(k):(q.prototype=k.prototype,new q)}}(),r=d.prototype,x=h.prototype;h=c.noop;var b=a.prototype,q=m.defined,k=m.extend,p=m.isArray,v=m.pick,B=m.merge;a=function(a){function c(){var b=null!==a&&a.apply(this,arguments)||this;b.data=void 0;b.options=void 0;b.points=void 0;
        b.lowerStateMarkerGraphic=void 0;b.xAxis=void 0;return b}l(c,a);c.prototype.toYData=function(b){return[b.low,b.high]};c.prototype.highToXY=function(b){var a=this.chart,g=this.xAxis.postTranslate(b.rectPlotX||0,this.yAxis.len-b.plotHigh);b.plotHighX=g.x-a.plotLeft;b.plotHigh=g.y-a.plotTop;b.plotLowX=b.plotX};c.prototype.translate=function(){var b=this,a=b.yAxis,g=!!b.modifyValue;r.translate.apply(b);b.points.forEach(function(f){var u=f.high,n=f.plotY;f.isNull?f.plotY=null:(f.plotLow=n,f.plotHigh=a.translate(g?
        b.modifyValue(u,f):u,0,1,0,1),g&&(f.yBottom=f.plotHigh))});this.chart.polar&&this.points.forEach(function(f){b.highToXY(f);f.tooltipPos=[(f.plotHighX+f.plotLowX)/2,(f.plotHigh+f.plotLow)/2]})};c.prototype.getGraphPath=function(b){var a=[],g=[],f,u=r.getGraphPath;var n=this.options;var w=this.chart.polar,k=w&&!1!==n.connectEnds,q=n.connectNulls,c=n.step;b=b||this.points;for(f=b.length;f--;){var p=b[f];var l=w?{plotX:p.rectPlotX,plotY:p.yBottom,doCurve:!1}:{plotX:p.plotX,plotY:p.plotY,doCurve:!1};p.isNull||
    k||q||b[f+1]&&!b[f+1].isNull||g.push(l);var d={polarPlotY:p.polarPlotY,rectPlotX:p.rectPlotX,yBottom:p.yBottom,plotX:v(p.plotHighX,p.plotX),plotY:p.plotHigh,isNull:p.isNull};g.push(d);a.push(d);p.isNull||k||q||b[f-1]&&!b[f-1].isNull||g.push(l)}b=u.call(this,b);c&&(!0===c&&(c="left"),n.step={left:"right",center:"center",right:"left"}[c]);a=u.call(this,a);g=u.call(this,g);n.step=c;n=[].concat(b,a);!this.chart.polar&&g[0]&&"M"===g[0][0]&&(g[0]=["L",g[0][1],g[0][2]]);this.graphPath=n;this.areaPath=b.concat(g);
        n.isArea=!0;n.xMap=b.xMap;this.areaPath.xMap=b.xMap;return n};c.prototype.drawDataLabels=function(){var a=this.points,q=a.length,g,f=[],u=this.options.dataLabels,n,w=this.chart.inverted;if(u){if(p(u)){var A=u[0]||{enabled:!1};var c=u[1]||{enabled:!1}}else A=k({},u),A.x=u.xHigh,A.y=u.yHigh,c=k({},u),c.x=u.xLow,c.y=u.yLow;if(A.enabled||this._hasPointLabels){for(g=q;g--;)if(n=a[g]){var v=A.inside?n.plotHigh<n.plotLow:n.plotHigh>n.plotLow;n.y=n.high;n._plotY=n.plotY;n.plotY=n.plotHigh;f[g]=n.dataLabel;
        n.dataLabel=n.dataLabelUpper;n.below=v;w?A.align||(A.align=v?"right":"left"):A.verticalAlign||(A.verticalAlign=v?"top":"bottom")}this.options.dataLabels=A;b.drawDataLabels&&b.drawDataLabels.apply(this,arguments);for(g=q;g--;)if(n=a[g])n.dataLabelUpper=n.dataLabel,n.dataLabel=f[g],delete n.dataLabels,n.y=n.low,n.plotY=n._plotY}if(c.enabled||this._hasPointLabels){for(g=q;g--;)if(n=a[g])v=c.inside?n.plotHigh<n.plotLow:n.plotHigh>n.plotLow,n.below=!v,w?c.align||(c.align=v?"left":"right"):c.verticalAlign||
        (c.verticalAlign=v?"bottom":"top");this.options.dataLabels=c;b.drawDataLabels&&b.drawDataLabels.apply(this,arguments)}if(A.enabled)for(g=q;g--;)if(n=a[g])n.dataLabels=[n.dataLabelUpper,n.dataLabel].filter(function(f){return!!f});this.options.dataLabels=u}};c.prototype.alignDataLabel=function(){x.alignDataLabel.apply(this,arguments)};c.prototype.drawPoints=function(){var a=this.points.length,c;b.drawPoints.apply(this,arguments);for(c=0;c<a;){var g=this.points[c];g.origProps={plotY:g.plotY,plotX:g.plotX,
        isInside:g.isInside,negative:g.negative,zone:g.zone,y:g.y};g.lowerGraphic=g.graphic;g.graphic=g.upperGraphic;g.plotY=g.plotHigh;q(g.plotHighX)&&(g.plotX=g.plotHighX);g.y=v(g.high,g.origProps.y);g.negative=g.y<(this.options.threshold||0);this.zones.length&&(g.zone=g.getZone());this.chart.polar||(g.isInside=g.isTopInside="undefined"!==typeof g.plotY&&0<=g.plotY&&g.plotY<=this.yAxis.len&&0<=g.plotX&&g.plotX<=this.xAxis.len);c++}b.drawPoints.apply(this,arguments);for(c=0;c<a;)g=this.points[c],g.upperGraphic=
        g.graphic,g.graphic=g.lowerGraphic,g.origProps&&(k(g,g.origProps),delete g.origProps),c++};c.defaultOptions=B(d.defaultOptions,{lineWidth:1,threshold:null,tooltip:{pointFormat:'<span style="color:{series.color}">\u25cf</span> {series.name}: <b>{point.low}</b> - <b>{point.high}</b><br/>'},trackByArea:!0,dataLabels:{align:void 0,verticalAlign:void 0,xLow:0,xHigh:0,yLow:0,yHigh:0}});return c}(d);k(a.prototype,{pointArrayMap:["low","high"],pointValKey:"low",deferTranslatePolar:!0,pointClass:e,setStackedPoints:h});
        t.registerSeriesType("arearange",a);"";return a});z(e,"Series/AreaSplineRange/AreaSplineRangeSeries.js",[e["Series/AreaRange/AreaRangeSeries.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d,h){var c=this&&this.__extends||function(){var a=function(c,l){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var c in a)a.hasOwnProperty(c)&&(b[c]=a[c])};return a(c,l)};return function(c,l){function b(){this.constructor=c}a(c,
        l);c.prototype=null===l?Object.create(l):(b.prototype=l.prototype,new b)}}(),a=d.seriesTypes.spline,t=h.merge;h=h.extend;var m=function(a){function l(){var c=null!==a&&a.apply(this,arguments)||this;c.options=void 0;c.data=void 0;c.points=void 0;return c}c(l,a);l.defaultOptions=t(e.defaultOptions);return l}(e);h(m.prototype,{getPointSpline:a.prototype.getPointSpline});d.registerSeriesType("areasplinerange",m);"";return m});z(e,"Series/BoxPlot/BoxPlotSeries.js",[e["Series/Column/ColumnSeries.js"],e["Core/Globals.js"],
        e["Core/Color/Palette.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d,h,c,a){var t=this&&this.__extends||function(){var a=function(b,c){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var c in a)a.hasOwnProperty(c)&&(b[c]=a[c])};return a(b,c)};return function(b,c){function k(){this.constructor=b}a(b,c);b.prototype=null===c?Object.create(c):(k.prototype=c.prototype,new k)}}();d=d.noop;var m=a.extend,l=a.merge,r=a.pick;
        a=function(a){function b(){var b=null!==a&&a.apply(this,arguments)||this;b.data=void 0;b.options=void 0;b.points=void 0;return b}t(b,a);b.prototype.pointAttribs=function(){return{}};b.prototype.translate=function(){var b=this.yAxis,c=this.pointArrayMap;a.prototype.translate.apply(this);this.points.forEach(function(a){c.forEach(function(c){null!==a[c]&&(a[c+"Plot"]=b.translate(a[c],0,1,0,1))});a.plotHigh=a.highPlot})};b.prototype.drawPoints=function(){var b=this,a=b.options,c=b.chart,v=c.renderer,
            l,d,h,m,e,g,f=0,u,n,w,A,F=!1!==b.doQuartiles,t,x=b.options.whiskerLength;b.points.forEach(function(k){var p=k.graphic,q=p?"animate":"attr",y=k.shapeArgs,B={},J={},L={},H={},I=k.color||b.color;"undefined"!==typeof k.plotY&&(u=Math.round(y.width),n=Math.floor(y.x),w=n+u,A=Math.round(u/2),l=Math.floor(F?k.q1Plot:k.lowPlot),d=Math.floor(F?k.q3Plot:k.lowPlot),h=Math.floor(k.highPlot),m=Math.floor(k.lowPlot),p||(k.graphic=p=v.g("point").add(b.group),k.stem=v.path().addClass("highcharts-boxplot-stem").add(p),
        x&&(k.whiskers=v.path().addClass("highcharts-boxplot-whisker").add(p)),F&&(k.box=v.path(void 0).addClass("highcharts-boxplot-box").add(p)),k.medianShape=v.path(void 0).addClass("highcharts-boxplot-median").add(p)),c.styledMode||(J.stroke=k.stemColor||a.stemColor||I,J["stroke-width"]=r(k.stemWidth,a.stemWidth,a.lineWidth),J.dashstyle=k.stemDashStyle||a.stemDashStyle||a.dashStyle,k.stem.attr(J),x&&(L.stroke=k.whiskerColor||a.whiskerColor||I,L["stroke-width"]=r(k.whiskerWidth,a.whiskerWidth,a.lineWidth),
            L.dashstyle=k.whiskerDashStyle||a.whiskerDashStyle||a.dashStyle,k.whiskers.attr(L)),F&&(B.fill=k.fillColor||a.fillColor||I,B.stroke=a.lineColor||I,B["stroke-width"]=a.lineWidth||0,B.dashstyle=k.boxDashStyle||a.boxDashStyle||a.dashStyle,k.box.attr(B)),H.stroke=k.medianColor||a.medianColor||I,H["stroke-width"]=r(k.medianWidth,a.medianWidth,a.lineWidth),H.dashstyle=k.medianDashStyle||a.medianDashStyle||a.dashStyle,k.medianShape.attr(H)),g=k.stem.strokeWidth()%2/2,f=n+A+g,p=[["M",f,d],["L",f,h],["M",
            f,l],["L",f,m]],k.stem[q]({d:p}),F&&(g=k.box.strokeWidth()%2/2,l=Math.floor(l)+g,d=Math.floor(d)+g,n+=g,w+=g,p=[["M",n,d],["L",n,l],["L",w,l],["L",w,d],["L",n,d],["Z"]],k.box[q]({d:p})),x&&(g=k.whiskers.strokeWidth()%2/2,h+=g,m+=g,t=/%$/.test(x)?A*parseFloat(x)/100:x/2,p=[["M",f-t,h],["L",f+t,h],["M",f-t,m],["L",f+t,m]],k.whiskers[q]({d:p})),e=Math.round(k.medianPlot),g=k.medianShape.strokeWidth()%2/2,e+=g,p=[["M",n,e],["L",w,e]],k.medianShape[q]({d:p}))})};b.prototype.toYData=function(b){return[b.low,
            b.q1,b.median,b.q3,b.high]};b.defaultOptions=l(e.defaultOptions,{threshold:null,tooltip:{pointFormat:'<span style="color:{point.color}">\u25cf</span> <b> {series.name}</b><br/>Maximum: {point.high}<br/>Upper quartile: {point.q3}<br/>Median: {point.median}<br/>Lower quartile: {point.q1}<br/>Minimum: {point.low}<br/>'},whiskerLength:"50%",fillColor:h.backgroundColor,lineWidth:1,medianWidth:2,whiskerWidth:2});return b}(e);m(a.prototype,{pointArrayMap:["low","q1","median","q3","high"],pointValKey:"high",
            drawDataLabels:d,setStackedPoints:d});c.registerSeriesType("boxplot",a);"";return a});z(e,"Series/Bubble/BubbleLegendDefaults.js",[e["Core/Color/Palette.js"]],function(e){return{borderColor:void 0,borderWidth:2,className:void 0,color:void 0,connectorClassName:void 0,connectorColor:void 0,connectorDistance:60,connectorWidth:1,enabled:!1,labels:{className:void 0,allowOverlap:!1,format:"",formatter:void 0,align:"right",style:{fontSize:"10px",color:e.neutralColor100},x:0,y:0},maxSize:60,minSize:10,legendIndex:0,
        ranges:{value:void 0,borderColor:void 0,color:void 0,connectorColor:void 0},sizeBy:"area",sizeByAbsoluteValue:!1,zIndex:1,zThreshold:0}});z(e,"Series/Bubble/BubbleLegendItem.js",[e["Core/Color/Color.js"],e["Core/FormatUtilities.js"],e["Core/Globals.js"],e["Core/Utilities.js"]],function(e,d,h,c){var a=e.parse,t=h.noop,m=c.arrayMax,l=c.arrayMin,r=c.isNumber,x=c.merge,b=c.pick,q=c.stableSort;"";return function(){function c(b,a){this.options=this.symbols=this.visible=this.selected=this.ranges=this.movementX=
        this.maxLabel=this.legendSymbol=this.legendItemWidth=this.legendItemHeight=this.legendItem=this.legendGroup=this.legend=this.fontMetrics=this.chart=void 0;this.setState=t;this.init(b,a)}c.prototype.init=function(b,a){this.options=b;this.visible=!0;this.chart=a.chart;this.legend=a};c.prototype.addToLegend=function(b){b.splice(this.options.legendIndex,0,this)};c.prototype.drawLegendSymbol=function(a){var c=this.chart,k=this.options,p=b(a.options.itemDistance,20),l=k.ranges,d=k.connectorDistance;this.fontMetrics=
        c.renderer.fontMetrics(k.labels.style.fontSize);l&&l.length&&r(l[0].value)?(q(l,function(b,g){return g.value-b.value}),this.ranges=l,this.setOptions(),this.render(),a=this.getMaxLabelSize(),l=this.ranges[0].radius,c=2*l,d=d-l+a.width,d=0<d?d:0,this.maxLabel=a,this.movementX="left"===k.labels.align?d:0,this.legendItemWidth=c+d+p,this.legendItemHeight=c+this.fontMetrics.h/2):a.options.bubbleLegend.autoRanges=!0};c.prototype.setOptions=function(){var c=this.ranges,k=this.options,l=this.chart.series[k.seriesIndex],
        q=this.legend.baseline,d={zIndex:k.zIndex,"stroke-width":k.borderWidth},h={zIndex:k.zIndex,"stroke-width":k.connectorWidth},e={align:this.legend.options.rtl||"left"===k.labels.align?"right":"left",zIndex:k.zIndex},g=l.options.marker.fillOpacity,f=this.chart.styledMode;c.forEach(function(u,n){f||(d.stroke=b(u.borderColor,k.borderColor,l.color),d.fill=b(u.color,k.color,1!==g?a(l.color).setOpacity(g).get("rgba"):l.color),h.stroke=b(u.connectorColor,k.connectorColor,l.color));c[n].radius=this.getRangeRadius(u.value);
        c[n]=x(c[n],{center:c[0].radius-c[n].radius+q});f||x(!0,c[n],{bubbleAttribs:x(d),connectorAttribs:x(h),labelAttribs:e})},this)};c.prototype.getRangeRadius=function(b){var a=this.options;return this.chart.series[this.options.seriesIndex].getRadius.call(this,a.ranges[a.ranges.length-1].value,a.ranges[0].value,a.minSize,a.maxSize,b)};c.prototype.render=function(){var b=this.chart.renderer,a=this.options.zThreshold;this.symbols||(this.symbols={connectors:[],bubbleItems:[],labels:[]});this.legendSymbol=
        b.g("bubble-legend");this.legendItem=b.g("bubble-legend-item");this.legendSymbol.translateX=0;this.legendSymbol.translateY=0;this.ranges.forEach(function(b){b.value>=a&&this.renderRange(b)},this);this.legendSymbol.add(this.legendItem);this.legendItem.add(this.legendGroup);this.hideOverlappingLabels()};c.prototype.renderRange=function(b){var a=this.options,c=a.labels,k=this.chart,l=k.series[a.seriesIndex],d=k.renderer,q=this.symbols;k=q.labels;var g=b.center,f=Math.abs(b.radius),u=a.connectorDistance||
        0,n=c.align,w=a.connectorWidth,A=this.ranges[0].radius||0,p=g-f-a.borderWidth/2+w/2,h=this.fontMetrics;h=h.f/2-(h.h-h.f)/2;var e=d.styledMode;u=this.legend.options.rtl||"left"===n?-u:u;"center"===n&&(u=0,a.connectorDistance=0,b.labelAttribs.align="center");n=p+a.labels.y;var m=A+u+a.labels.x;q.bubbleItems.push(d.circle(A,g+((p%1?1:.5)-(w%2?0:.5)),f).attr(e?{}:b.bubbleAttribs).addClass((e?"highcharts-color-"+l.colorIndex+" ":"")+"highcharts-bubble-legend-symbol "+(a.className||"")).add(this.legendSymbol));
        q.connectors.push(d.path(d.crispLine([["M",A,p],["L",A+u,p]],a.connectorWidth)).attr(e?{}:b.connectorAttribs).addClass((e?"highcharts-color-"+this.options.seriesIndex+" ":"")+"highcharts-bubble-legend-connectors "+(a.connectorClassName||"")).add(this.legendSymbol));b=d.text(this.formatLabel(b),m,n+h).attr(e?{}:b.labelAttribs).css(e?{}:c.style).addClass("highcharts-bubble-legend-labels "+(a.labels.className||"")).add(this.legendSymbol);k.push(b);b.placed=!0;b.alignAttr={x:m,y:n+h}};c.prototype.getMaxLabelSize=
        function(){var b,a;this.symbols.labels.forEach(function(c){a=c.getBBox(!0);b=b?a.width>b.width?a:b:a});return b||{}};c.prototype.formatLabel=function(b){var a=this.options,c=a.labels.formatter;a=a.labels.format;var k=this.chart.numberFormatter;return a?d.format(a,b):c?c.call(b):k(b.value,1)};c.prototype.hideOverlappingLabels=function(){var b=this.chart,a=this.symbols;!this.options.labels.allowOverlap&&a&&(b.hideOverlappingLabels(a.labels),a.labels.forEach(function(b,c){b.newOpacity?b.newOpacity!==
        b.oldOpacity&&a.connectors[c].show():a.connectors[c].hide()}))};c.prototype.getRanges=function(){var a=this.legend.bubbleLegend,c=a.options.ranges,k,d=Number.MAX_VALUE,q=-Number.MAX_VALUE;a.chart.series.forEach(function(a){a.isBubble&&!a.ignoreSeries&&(k=a.zData.filter(r),k.length&&(d=b(a.options.zMin,Math.min(d,Math.max(l(k),!1===a.options.displayNegative?a.options.zThreshold:-Number.MAX_VALUE))),q=b(a.options.zMax,Math.max(q,m(k)))))});var h=d===q?[{value:q}]:[{value:d},{value:(d+q)/2},{value:q,
        autoRanges:!0}];c.length&&c[0].radius&&h.reverse();h.forEach(function(b,a){c&&c[a]&&(h[a]=x(c[a],b))});return h};c.prototype.predictBubbleSizes=function(){var b=this.chart,a=this.fontMetrics,c=b.legend.options,k="horizontal"===c.layout,l=k?b.legend.lastLineHeight:0,d=b.plotSizeX,q=b.plotSizeY,g=b.series[this.options.seriesIndex];b=Math.ceil(g.minPxSize);var f=Math.ceil(g.maxPxSize),u=Math.min(q,d);g=g.options.maxSize;if(c.floating||!/%$/.test(g))a=f;else if(g=parseFloat(g),a=(u+l-a.h/2)*g/100/(g/
        100+1),k&&q-a>=d||!k&&d-a>=q)a=f;return[b,Math.ceil(a)]};c.prototype.updateRanges=function(b,a){var c=this.legend.options.bubbleLegend;c.minSize=b;c.maxSize=a;c.ranges=this.getRanges()};c.prototype.correctSizes=function(){var b=this.legend,a=this.chart.series[this.options.seriesIndex];1<Math.abs(Math.ceil(a.maxPxSize)-this.options.maxSize)&&(this.updateRanges(this.options.minSize,a.maxPxSize),b.render())};return c}()});z(e,"Series/Bubble/BubbleLegendComposition.js",[e["Series/Bubble/BubbleLegendDefaults.js"],
        e["Series/Bubble/BubbleLegendItem.js"],e["Core/DefaultOptions.js"],e["Core/Utilities.js"]],function(e,d,h,c){var a=h.setOptions,t=c.addEvent,m=c.objectEach,l=c.wrap,r;(function(c){function b(b,a,c){var g=this.legend,f=0<=q(this);if(g&&g.options.enabled&&g.bubbleLegend&&g.options.bubbleLegend.autoRanges&&f){var u=g.bubbleLegend.options;f=g.bubbleLegend.predictBubbleSizes();g.bubbleLegend.updateRanges(f[0],f[1]);u.placed||(g.group.placed=!1,g.allItems.forEach(function(f){f.legendGroup.translateY=null}));
        g.render();this.getMargins();this.axes.forEach(function(f){f.visible&&f.render();u.placed||(f.setScale(),f.updateNames(),m(f.ticks,function(f){f.isNew=!0;f.isNewLabel=!0}))});u.placed=!0;this.getMargins();b.call(this,a,c);g.bubbleLegend.correctSizes();r(g,k(g))}else b.call(this,a,c),g&&g.options.enabled&&g.bubbleLegend&&(g.render(),r(g,k(g)))}function q(b){b=b.series;for(var a=0;a<b.length;){if(b[a]&&b[a].isBubble&&b[a].visible&&b[a].zData.length)return a;a++}return-1}function k(b){b=b.allItems;var a=
        [],c=b.length,g,f=0;for(g=0;g<c;g++)if(b[g].legendItemHeight&&(b[g].itemHeight=b[g].legendItemHeight),b[g]===b[c-1]||b[g+1]&&b[g]._legendItemPos[1]!==b[g+1]._legendItemPos[1]){a.push({height:0});var u=a[a.length-1];for(f;f<=g;f++)b[f].itemHeight>u.height&&(u.height=b[f].itemHeight);u.step=g}return a}function h(b){var a=this.bubbleLegend,c=this.options,g=c.bubbleLegend,f=q(this.chart);a&&a.ranges&&a.ranges.length&&(g.ranges.length&&(g.autoRanges=!!g.ranges[0].autoRanges),this.destroyItem(a));0<=f&&
    c.enabled&&g.enabled&&(g.seriesIndex=f,this.bubbleLegend=new d(g,this),this.bubbleLegend.addToLegend(b.allItems))}function v(){var b=this.chart,a=this.visible,c=this.chart.legend;c&&c.bubbleLegend&&(this.visible=!a,this.ignoreSeries=a,b=0<=q(b),c.bubbleLegend.visible!==b&&(c.update({bubbleLegend:{enabled:b}}),c.bubbleLegend.visible=b),this.visible=a)}function r(b,a){var c=b.options.rtl,g,f,u,n=0;b.allItems.forEach(function(b,k){g=b.legendGroup.translateX;f=b._legendItemPos[1];if((u=b.movementX)||
        c&&b.ranges)u=c?g-b.options.maxSize/2:g+u,b.legendGroup.attr({translateX:u});k>a[n].step&&n++;b.legendGroup.attr({translateY:Math.round(f+a[n].height/2)});b._legendItemPos[1]=f+a[n].height/2})}var x=[];c.compose=function(c,k,d){-1===x.indexOf(c)&&(x.push(c),a({legend:{bubbleLegend:e}}),l(c.prototype,"drawChartBox",b));-1===x.indexOf(k)&&(x.push(k),t(k,"afterGetAllItems",h));-1===x.indexOf(d)&&(x.push(d),t(d,"legendItemClick",v))}})(r||(r={}));return r});z(e,"Series/Bubble/BubblePoint.js",[e["Core/Series/Point.js"],
        e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d,h){var c=this&&this.__extends||function(){var a=function(c,d){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var d in c)c.hasOwnProperty(d)&&(a[d]=c[d])};return a(c,d)};return function(c,d){function l(){this.constructor=c}a(c,d);c.prototype=null===d?Object.create(d):(l.prototype=d.prototype,new l)}}();h=h.extend;d=function(a){function d(){var c=null!==a&&a.apply(this,arguments)||
        this;c.options=void 0;c.series=void 0;return c}c(d,a);d.prototype.haloPath=function(a){return e.prototype.haloPath.call(this,0===a?0:(this.marker?this.marker.radius||0:0)+a)};return d}(d.seriesTypes.scatter.prototype.pointClass);h(d.prototype,{ttBelow:!1});return d});z(e,"Series/Bubble/BubbleSeries.js",[e["Core/Axis/Axis.js"],e["Series/Bubble/BubbleLegendComposition.js"],e["Series/Bubble/BubblePoint.js"],e["Core/Color/Color.js"],e["Core/Globals.js"],e["Core/Series/Series.js"],e["Core/Series/SeriesRegistry.js"],
        e["Core/Utilities.js"]],function(e,d,h,c,a,t,m,l){var r=this&&this.__extends||function(){var b=function(f,a){b=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,f){b.__proto__=f}||function(b,f){for(var a in f)f.hasOwnProperty(a)&&(b[a]=f[a])};return b(f,a)};return function(f,a){function g(){this.constructor=f}b(f,a);f.prototype=null===a?Object.create(a):(g.prototype=a.prototype,new g)}}(),x=c.parse;c=a.noop;var b=m.seriesTypes;a=b.column;var q=b.scatter,k=l.arrayMax,p=l.arrayMin,v=
        l.clamp,B=l.extend,H=l.isNumber,D=l.merge,y=l.pick,I=l.pInt;l=function(b){function f(){var f=null!==b&&b.apply(this,arguments)||this;f.data=void 0;f.maxPxSize=void 0;f.minPxSize=void 0;f.options=void 0;f.points=void 0;f.radii=void 0;f.yData=void 0;f.zData=void 0;return f}r(f,b);f.prototype.animate=function(b){!b&&this.points.length<this.options.animationLimit&&this.points.forEach(function(b){var f=b.graphic;f&&f.width&&(this.hasRendered||f.attr({x:b.plotX,y:b.plotY,width:1,height:1}),f.animate(this.markerAttribs(b),
        this.options.animation))},this)};f.prototype.getRadii=function(b,f,a){var g=this.zData,c=this.yData,n=a.minPxSize,u=a.maxPxSize,k=[];var w=0;for(a=g.length;w<a;w++){var d=g[w];k.push(this.getRadius(b,f,n,u,d,c[w]))}this.radii=k};f.prototype.getRadius=function(b,f,a,g,c,k){var n=this.options,u="width"!==n.sizeBy,w=n.zThreshold,d=f-b,q=.5;if(null===k||null===c)return null;if(H(c)){n.sizeByAbsoluteValue&&(c=Math.abs(c-w),d=Math.max(f-w,Math.abs(b-w)),b=0);if(c<b)return a/2-1;0<d&&(q=(c-b)/d)}u&&0<=q&&
    (q=Math.sqrt(q));return Math.ceil(a+q*(g-a))/2};f.prototype.hasData=function(){return!!this.processedXData.length};f.prototype.pointAttribs=function(b,f){var a=this.options.marker.fillOpacity;b=t.prototype.pointAttribs.call(this,b,f);1!==a&&(b.fill=x(b.fill).setOpacity(a).get("rgba"));return b};f.prototype.translate=function(){var f,a=this.data,g=this.radii;b.prototype.translate.call(this);for(f=a.length;f--;){var c=a[f];var k=g?g[f]:0;H(k)&&k>=this.minPxSize/2?(c.marker=B(c.marker,{radius:k,width:2*
            k,height:2*k}),c.dlBox={x:c.plotX-k,y:c.plotY-k,width:2*k,height:2*k}):c.shapeArgs=c.plotY=c.dlBox=void 0}};f.compose=d.compose;f.defaultOptions=D(q.defaultOptions,{dataLabels:{formatter:function(){var b=this.series.chart.numberFormatter,f=this.point.z;return H(f)?b(f,-1):""},inside:!0,verticalAlign:"middle"},animationLimit:250,marker:{lineColor:null,lineWidth:1,fillOpacity:.5,radius:null,states:{hover:{radiusPlus:0}},symbol:"circle"},minSize:8,maxSize:"20%",softThreshold:!1,states:{hover:{halo:{size:5}}},
        tooltip:{pointFormat:"({point.x}, {point.y}), Size: {point.z}"},turboThreshold:0,zThreshold:0,zoneAxis:"z"});return f}(q);B(l.prototype,{alignDataLabel:a.prototype.alignDataLabel,applyZones:c,bubblePadding:!0,buildKDTree:c,directTouch:!0,isBubble:!0,pointArrayMap:["y","z"],pointClass:h,parallelArrays:["x","y","z"],trackerGroups:["group","dataLabelsGroup"],specialGroup:"group",zoneAxis:"z"});e.prototype.beforePadding=function(){var b=this,f=this.len,a=this.chart,c=0,w=f,d=this.isXAxis,q=d?"xData":
        "yData",l=this.min,h={},e=Math.min(a.plotWidth,a.plotHeight),m=Number.MAX_VALUE,r=-Number.MAX_VALUE,x=this.max-l,t=f/x,B=[];this.series.forEach(function(f){var g=f.options;!f.bubblePadding||!f.visible&&a.options.chart.ignoreHiddenSeries||(b.allowZoomOutside=!0,B.push(f),d&&(["minSize","maxSize"].forEach(function(b){var f=g[b],a=/%$/.test(f);f=I(f);h[b]=a?e*f/100:f}),f.minPxSize=h.minSize,f.maxPxSize=Math.max(h.maxSize,h.minSize),f=f.zData.filter(H),f.length&&(m=y(g.zMin,v(p(f),!1===g.displayNegative?
        g.zThreshold:-Number.MAX_VALUE,m)),r=y(g.zMax,Math.max(r,k(f))))))});B.forEach(function(f){var a=f[q],g=a.length;d&&f.getRadii(m,r,f);if(0<x)for(;g--;)if(H(a[g])&&b.dataMin<=a[g]&&a[g]<=b.max){var n=f.radii?f.radii[g]:0;c=Math.min((a[g]-l)*t-n,c);w=Math.max((a[g]-l)*t+n,w)}});B.length&&0<x&&!this.logarithmic&&(w-=f,t*=(f+Math.max(0,c)-Math.min(w,f))/f,[["min","userMin",c],["max","userMax",w]].forEach(function(f){"undefined"===typeof y(b.options[f[0]],b[f[1]])&&(b[f[0]]+=f[2]/t)}))};m.registerSeriesType("bubble",
        l);"";"";return l});z(e,"Series/ColumnRange/ColumnRangePoint.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d){var h=this&&this.__extends||function(){var a=function(c,d){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var c in b)b.hasOwnProperty(c)&&(a[c]=b[c])};return a(c,d)};return function(c,d){function l(){this.constructor=c}a(c,d);c.prototype=null===d?Object.create(d):(l.prototype=d.prototype,new l)}}(),c=e.seriesTypes;
        e=c.column.prototype.pointClass;var a=d.extend,t=d.isNumber;d=function(a){function c(){var c=null!==a&&a.apply(this,arguments)||this;c.series=void 0;c.options=void 0;c.barX=void 0;c.pointWidth=void 0;c.shapeType=void 0;return c}h(c,a);c.prototype.isValid=function(){return t(this.low)};return c}(c.arearange.prototype.pointClass);a(d.prototype,{setState:e.prototype.setState});return d});z(e,"Series/ColumnRange/ColumnRangeSeries.js",[e["Series/ColumnRange/ColumnRangePoint.js"],e["Core/Globals.js"],e["Core/Series/SeriesRegistry.js"],
        e["Core/Utilities.js"]],function(e,d,h,c){var a=this&&this.__extends||function(){var b=function(a,c){b=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var c in a)a.hasOwnProperty(c)&&(b[c]=a[c])};return b(a,c)};return function(a,c){function k(){this.constructor=a}b(a,c);a.prototype=null===c?Object.create(c):(k.prototype=c.prototype,new k)}}();d=d.noop;var t=h.seriesTypes,m=t.arearange,l=t.column,r=l.prototype,x=m.prototype,b=c.clamp,q=c.merge,
        k=c.pick;c=c.extend;var p={pointRange:null,marker:null,states:{hover:{halo:!1}}};t=function(c){function d(){var b=null!==c&&c.apply(this,arguments)||this;b.data=void 0;b.points=void 0;b.options=void 0;return b}a(d,c);d.prototype.setOptions=function(){q(!0,arguments[0],{stacking:void 0});return x.setOptions.apply(this,arguments)};d.prototype.translate=function(){var a=this,c=a.yAxis,d=a.xAxis,q=d.startAngleRad,g,f=a.chart,u=a.xAxis.isRadial,n=Math.max(f.chartWidth,f.chartHeight)+999,w;r.translate.apply(a);
        a.points.forEach(function(l){var h=l.shapeArgs||{},A=a.options.minPointLength;l.plotHigh=w=b(c.translate(l.high,0,1,0,1),-n,n);l.plotLow=b(l.plotY,-n,n);var e=w;var p=k(l.rectPlotY,l.plotY)-w;Math.abs(p)<A?(A-=p,p+=A,e-=A/2):0>p&&(p*=-1,e-=p);u?(g=l.barX+q,l.shapeType="arc",l.shapeArgs=a.polarArc(e+p,e,g,g+l.pointWidth)):(h.height=p,h.y=e,A=h.x,A=void 0===A?0:A,h=h.width,h=void 0===h?0:h,l.tooltipPos=f.inverted?[c.len+c.pos-f.plotLeft-e-p/2,d.len+d.pos-f.plotTop-A-h/2,p]:[d.left-f.plotLeft+A+h/2,
            c.pos-f.plotTop+e+p/2,p])})};d.prototype.crispCol=function(){return r.crispCol.apply(this,arguments)};d.prototype.drawPoints=function(){return r.drawPoints.apply(this,arguments)};d.prototype.drawTracker=function(){return r.drawTracker.apply(this,arguments)};d.prototype.getColumnMetrics=function(){return r.getColumnMetrics.apply(this,arguments)};d.prototype.pointAttribs=function(){return r.pointAttribs.apply(this,arguments)};d.prototype.adjustForMissingColumns=function(){return r.adjustForMissingColumns.apply(this,
        arguments)};d.prototype.animate=function(){return r.animate.apply(this,arguments)};d.prototype.translate3dPoints=function(){return r.translate3dPoints.apply(this,arguments)};d.prototype.translate3dShapes=function(){return r.translate3dShapes.apply(this,arguments)};d.defaultOptions=q(l.defaultOptions,m.defaultOptions,p);return d}(m);c(t.prototype,{directTouch:!0,trackerGroups:["group","dataLabelsGroup"],drawGraph:d,getSymbol:d,polarArc:function(){return r.polarArc.apply(this,arguments)},pointClass:e});
        h.registerSeriesType("columnrange",t);"";return t});z(e,"Series/ColumnPyramid/ColumnPyramidSeries.js",[e["Series/Column/ColumnSeries.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d,h){var c=this&&this.__extends||function(){var a=function(c,b){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var c in a)a.hasOwnProperty(c)&&(b[c]=a[c])};return a(c,b)};return function(c,b){function d(){this.constructor=c}a(c,b);c.prototype=
        null===b?Object.create(b):(d.prototype=b.prototype,new d)}}(),a=e.prototype,t=h.clamp,m=h.merge,l=h.pick;h=function(d){function h(){var b=null!==d&&d.apply(this,arguments)||this;b.data=void 0;b.options=void 0;b.points=void 0;return b}c(h,d);h.prototype.translate=function(){var b=this,c=b.chart,k=b.options,d=b.dense=2>b.closestPointRange*b.xAxis.transA;d=b.borderWidth=l(k.borderWidth,d?0:1);var h=b.yAxis,e=k.threshold,m=b.translatedThreshold=h.getThreshold(e),x=l(k.minPointLength,5),r=b.getColumnMetrics(),
        I=r.width,g=b.barW=Math.max(I,1+2*d),f=b.pointXOffset=r.offset;c.inverted&&(m-=.5);k.pointPadding&&(g=Math.ceil(g));a.translate.apply(b);b.points.forEach(function(a){var n=l(a.yBottom,m),d=999+Math.abs(n),u=t(a.plotY,-d,h.len+d);d=a.plotX+f;var q=g/2,p=Math.min(u,n);n=Math.max(u,n)-p;var v;a.barX=d;a.pointWidth=I;a.tooltipPos=c.inverted?[h.len+h.pos-c.plotLeft-u,b.xAxis.len-d-q,n]:[d+q,u+h.pos-c.plotTop,n];u=e+(a.total||a.y);"percent"===k.stacking&&(u=e+(0>a.y)?-100:100);u=h.toPixels(u,!0);var r=
        (v=c.plotHeight-u-(c.plotHeight-m))?q*(p-u)/v:0;var y=v?q*(p+n-u)/v:0;v=d-r+q;r=d+r+q;var K=d+y+q;y=d-y+q;var C=p-x;var B=p+n;0>a.y&&(C=p,B=p+n+x);c.inverted&&(K=c.plotWidth-p,v=u-(c.plotWidth-m),r=q*(u-K)/v,y=q*(u-(K-n))/v,v=d+q+r,r=v-2*r,K=d-y+q,y=d+y+q,C=p,B=p+n-x,0>a.y&&(B=p+n+x));a.shapeType="path";a.shapeArgs={x:v,y:C,width:r-v,height:n,d:[["M",v,C],["L",r,C],["L",K,B],["L",y,B],["Z"]]}})};h.defaultOptions=m(e.defaultOptions,{});return h}(e);d.registerSeriesType("columnpyramid",h);"";return h});
        z(e,"Series/ErrorBar/ErrorBarSeries.js",[e["Series/BoxPlot/BoxPlotSeries.js"],e["Series/Column/ColumnSeries.js"],e["Core/Color/Palette.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d,h,c,a){var t=this&&this.__extends||function(){var a=function(b,c){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var c in a)a.hasOwnProperty(c)&&(b[c]=a[c])};return a(b,c)};return function(b,c){function d(){this.constructor=b}a(b,c);
            b.prototype=null===c?Object.create(c):(d.prototype=c.prototype,new d)}}(),m=c.seriesTypes.arearange,l=a.merge;a=a.extend;var r=function(a){function b(){var b=null!==a&&a.apply(this,arguments)||this;b.data=void 0;b.options=void 0;b.points=void 0;return b}t(b,a);b.prototype.getColumnMetrics=function(){return this.linkedParent&&this.linkedParent.columnMetrics||d.prototype.getColumnMetrics.call(this)};b.prototype.drawDataLabels=function(){var b=this.pointValKey;m&&(m.prototype.drawDataLabels.call(this),
            this.data.forEach(function(a){a.y=a[b]}))};b.prototype.toYData=function(b){return[b.low,b.high]};b.defaultOptions=l(e.defaultOptions,{color:h.neutralColor100,grouping:!1,linkedTo:":previous",tooltip:{pointFormat:'<span style="color:{point.color}">\u25cf</span> {series.name}: <b>{point.low}</b> - <b>{point.high}</b><br/>'},whiskerWidth:null});return b}(e);a(r.prototype,{pointArrayMap:["low","high"],pointValKey:"high",doQuartiles:!1});c.registerSeriesType("errorbar",r);"";return r});z(e,"Series/Gauge/GaugePoint.js",
            [e["Core/Series/SeriesRegistry.js"]],function(e){var d=this&&this.__extends||function(){var d=function(c,a){d=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var d in c)c.hasOwnProperty(d)&&(a[d]=c[d])};return d(c,a)};return function(c,a){function h(){this.constructor=c}d(c,a);c.prototype=null===a?Object.create(a):(h.prototype=a.prototype,new h)}}();return function(h){function c(){var a=null!==h&&h.apply(this,arguments)||this;a.options=void 0;
                a.series=void 0;a.shapeArgs=void 0;return a}d(c,h);c.prototype.setState=function(a){this.state=a};return c}(e.series.prototype.pointClass)});z(e,"Series/Gauge/GaugeSeries.js",[e["Series/Gauge/GaugePoint.js"],e["Core/Globals.js"],e["Core/Color/Palette.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d,h,c,a){var t=this&&this.__extends||function(){var b=function(a,c){b=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var c in a)a.hasOwnProperty(c)&&
        (b[c]=a[c])};return b(a,c)};return function(a,c){function d(){this.constructor=a}b(a,c);a.prototype=null===c?Object.create(c):(d.prototype=c.prototype,new d)}}();d=d.noop;var m=c.series,l=c.seriesTypes.column,r=a.clamp,x=a.isNumber,b=a.extend,q=a.merge,k=a.pick,p=a.pInt;a=function(b){function a(){var a=null!==b&&b.apply(this,arguments)||this;a.data=void 0;a.points=void 0;a.options=void 0;a.yAxis=void 0;return a}t(a,b);a.prototype.translate=function(){var b=this.yAxis,a=this.options,c=b.center;this.generatePoints();
            this.points.forEach(function(d){var g=q(a.dial,d.dial),f=p(k(g.radius,"80%"))*c[2]/200,u=p(k(g.baseLength,"70%"))*f/100,n=p(k(g.rearLength,"10%"))*f/100,w=g.baseWidth||3,l=g.topWidth||1,h=a.overshoot,e=b.startAngleRad+b.translate(d.y,null,null,null,!0);if(x(h)||!1===a.wrap)h=x(h)?h/180*Math.PI:0,e=r(e,b.startAngleRad-h,b.endAngleRad+h);e=180*e/Math.PI;d.shapeType="path";d.shapeArgs={d:g.path||[["M",-n,-w/2],["L",u,-w/2],["L",f,-l/2],["L",f,l/2],["L",u,w/2],["L",-n,w/2],["Z"]],translateX:c[0],translateY:c[1],
                rotation:e};d.plotX=c[0];d.plotY=c[1]})};a.prototype.drawPoints=function(){var b=this,a=b.chart,c=b.yAxis.center,d=b.pivot,g=b.options,f=g.pivot,u=a.renderer;b.points.forEach(function(f){var c=f.graphic,d=f.shapeArgs,n=d.d,k=q(g.dial,f.dial);c?(c.animate(d),d.d=n):f.graphic=u[f.shapeType](d).attr({rotation:d.rotation,zIndex:1}).addClass("highcharts-dial").add(b.group);if(!a.styledMode)f.graphic[c?"animate":"attr"]({stroke:k.borderColor||"none","stroke-width":k.borderWidth||0,fill:k.backgroundColor||
                h.neutralColor100})});d?d.animate({translateX:c[0],translateY:c[1]}):(b.pivot=u.circle(0,0,k(f.radius,5)).attr({zIndex:2}).addClass("highcharts-pivot").translate(c[0],c[1]).add(b.group),a.styledMode||b.pivot.attr({"stroke-width":f.borderWidth||0,stroke:f.borderColor||h.neutralColor20,fill:f.backgroundColor||h.neutralColor100}))};a.prototype.animate=function(b){var a=this;b||a.points.forEach(function(b){var c=b.graphic;c&&(c.attr({rotation:180*a.yAxis.startAngleRad/Math.PI}),c.animate({rotation:b.shapeArgs.rotation},
            a.options.animation))})};a.prototype.render=function(){this.group=this.plotGroup("group","series",this.visible?"visible":"hidden",this.options.zIndex,this.chart.seriesGroup);m.prototype.render.call(this);this.group.clip(this.chart.clipRect)};a.prototype.setData=function(b,a){m.prototype.setData.call(this,b,!1);this.processData();this.generatePoints();k(a,!0)&&this.chart.redraw()};a.prototype.hasData=function(){return!!this.points.length};a.defaultOptions=q(m.defaultOptions,{dataLabels:{borderColor:h.neutralColor20,
                borderRadius:3,borderWidth:1,crop:!1,defer:!1,enabled:!0,verticalAlign:"top",y:15,zIndex:2},dial:{},pivot:{},tooltip:{headerFormat:""},showInLegend:!1});return a}(m);b(a.prototype,{angular:!0,directTouch:!0,drawGraph:d,drawTracker:l.prototype.drawTracker,fixedBox:!0,forceDL:!0,noSharedTooltip:!0,pointClass:e,trackerGroups:["group","dataLabelsGroup"]});c.registerSeriesType("gauge",a);"";return a});z(e,"Series/PackedBubble/PackedBubblePoint.js",[e["Core/Chart/Chart.js"],e["Core/Series/Point.js"],e["Core/Series/SeriesRegistry.js"]],
            function(e,d,h){var c=this&&this.__extends||function(){var a=function(c,d){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var d in c)c.hasOwnProperty(d)&&(a[d]=c[d])};return a(c,d)};return function(c,d){function l(){this.constructor=c}a(c,d);c.prototype=null===d?Object.create(d):(l.prototype=d.prototype,new l)}}();return function(a){function h(){var c=null!==a&&a.apply(this,arguments)||this;c.degree=NaN;c.mass=NaN;c.radius=NaN;c.options=void 0;
                c.series=void 0;c.value=null;return c}c(h,a);h.prototype.destroy=function(){this.series.layout&&this.series.layout.removeElementFromCollection(this,this.series.layout.nodes);return d.prototype.destroy.apply(this,arguments)};h.prototype.firePointEvent=function(){var a=this.series.options;if(this.isParentNode&&a.parentNode){var c=a.allowPointSelect;a.allowPointSelect=a.parentNode.allowPointSelect;d.prototype.firePointEvent.apply(this,arguments);a.allowPointSelect=c}else d.prototype.firePointEvent.apply(this,
                arguments)};h.prototype.select=function(){var a=this.series.chart;this.isParentNode?(a.getSelectedPoints=a.getSelectedParentNodes,d.prototype.select.apply(this,arguments),a.getSelectedPoints=e.prototype.getSelectedPoints):d.prototype.select.apply(this,arguments)};return h}(h.seriesTypes.bubble.prototype.pointClass)});z(e,"Series/Networkgraph/DraggableNodes.js",[e["Core/Chart/Chart.js"],e["Core/Globals.js"],e["Core/Utilities.js"]],function(e,d,h){var c=h.addEvent;d.dragNodesMixin={onMouseDown:function(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          c){c=this.chart.pointer.normalize(c);a.fixedPosition={chartX:c.chartX,chartY:c.chartY,plotX:a.plotX,plotY:a.plotY};a.inDragMode=!0},onMouseMove:function(a,c){if(a.fixedPosition&&a.inDragMode){var d=this.chart,h=d.pointer.normalize(c);c=a.fixedPosition.chartX-h.chartX;h=a.fixedPosition.chartY-h.chartY;var e=void 0,x=void 0,b=d.graphLayoutsLookup;if(5<Math.abs(c)||5<Math.abs(h))e=a.fixedPosition.plotX-c,x=a.fixedPosition.plotY-h,d.isInsidePlot(e,x)&&(a.plotX=e,a.plotY=x,a.hasDragged=!0,this.redrawHalo(a),
                b.forEach(function(b){b.restartSimulation()}))}},onMouseUp:function(a,c){a.fixedPosition&&(a.hasDragged&&(this.layout.enableSimulation?this.layout.start():this.chart.redraw()),a.inDragMode=a.hasDragged=!1,this.options.fixedDraggable||delete a.fixedPosition)},redrawHalo:function(a){a&&this.halo&&this.halo.attr({d:a.haloPath(this.options.states.hover.halo.size)})}};c(e,"load",function(){var a=this,d,h,e;a.container&&(d=c(a.container,"mousedown",function(d){var l=a.hoverPoint;l&&l.series&&l.series.hasDraggableNodes&&
        l.series.options.draggable&&(l.series.onMouseDown(l,d),h=c(a.container,"mousemove",function(b){return l&&l.series&&l.series.onMouseMove(l,b)}),e=c(a.container.ownerDocument,"mouseup",function(b){h();e();return l&&l.series&&l.series.onMouseUp(l,b)}))}));c(a,"destroy",function(){d()})})});z(e,"Series/Networkgraph/Integrations.js",[e["Core/Globals.js"]],function(e){e.networkgraphIntegrations={verlet:{attractiveForceFunction:function(d,h){return(h-d)/d},repulsiveForceFunction:function(d,h){return(h-d)/
                    d*(h>d?1:0)},barycenter:function(){var d=this.options.gravitationalConstant,h=this.barycenter.xFactor,c=this.barycenter.yFactor;h=(h-(this.box.left+this.box.width)/2)*d;c=(c-(this.box.top+this.box.height)/2)*d;this.nodes.forEach(function(a){a.fixedPosition||(a.plotX-=h/a.mass/a.degree,a.plotY-=c/a.mass/a.degree)})},repulsive:function(d,h,c){h=h*this.diffTemperature/d.mass/d.degree;d.fixedPosition||(d.plotX+=c.x*h,d.plotY+=c.y*h)},attractive:function(d,h,c){var a=d.getMass(),e=-c.x*h*this.diffTemperature;
                    h=-c.y*h*this.diffTemperature;d.fromNode.fixedPosition||(d.fromNode.plotX-=e*a.fromNode/d.fromNode.degree,d.fromNode.plotY-=h*a.fromNode/d.fromNode.degree);d.toNode.fixedPosition||(d.toNode.plotX+=e*a.toNode/d.toNode.degree,d.toNode.plotY+=h*a.toNode/d.toNode.degree)},integrate:function(d,h){var c=-d.options.friction,a=d.options.maxSpeed,e=(h.plotX+h.dispX-h.prevX)*c;c*=h.plotY+h.dispY-h.prevY;var m=Math.abs,l=m(e)/(e||1);m=m(c)/(c||1);e=l*Math.min(a,Math.abs(e));c=m*Math.min(a,Math.abs(c));h.prevX=
                    h.plotX+h.dispX;h.prevY=h.plotY+h.dispY;h.plotX+=e;h.plotY+=c;h.temperature=d.vectorLength({x:e,y:c})},getK:function(d){return Math.pow(d.box.width*d.box.height/d.nodes.length,.5)}},euler:{attractiveForceFunction:function(d,e){return d*d/e},repulsiveForceFunction:function(d,e){return e*e/d},barycenter:function(){var d=this.options.gravitationalConstant,e=this.barycenter.xFactor,c=this.barycenter.yFactor;this.nodes.forEach(function(a){if(!a.fixedPosition){var h=a.getDegree();h*=1+h/2;a.dispX+=(e-a.plotX)*
                    d*h/a.degree;a.dispY+=(c-a.plotY)*d*h/a.degree}})},repulsive:function(d,e,c,a){d.dispX+=c.x/a*e/d.degree;d.dispY+=c.y/a*e/d.degree},attractive:function(d,e,c,a){var h=d.getMass(),m=c.x/a*e;e*=c.y/a;d.fromNode.fixedPosition||(d.fromNode.dispX-=m*h.fromNode/d.fromNode.degree,d.fromNode.dispY-=e*h.fromNode/d.fromNode.degree);d.toNode.fixedPosition||(d.toNode.dispX+=m*h.toNode/d.toNode.degree,d.toNode.dispY+=e*h.toNode/d.toNode.degree)},integrate:function(d,e){e.dispX+=e.dispX*d.options.friction;e.dispY+=
                    e.dispY*d.options.friction;var c=e.temperature=d.vectorLength({x:e.dispX,y:e.dispY});0!==c&&(e.plotX+=e.dispX/c*Math.min(Math.abs(e.dispX),d.temperature),e.plotY+=e.dispY/c*Math.min(Math.abs(e.dispY),d.temperature))},getK:function(d){return Math.pow(d.box.width*d.box.height/d.nodes.length,.3)}}}});z(e,"Series/Networkgraph/QuadTree.js",[e["Core/Globals.js"],e["Core/Utilities.js"]],function(e,d){d=d.extend;var h=e.QuadTreeNode=function(c){this.box=c;this.boxSize=Math.min(c.width,c.height);this.nodes=
            [];this.body=this.isInternal=!1;this.isEmpty=!0};d(h.prototype,{insert:function(c,a){this.isInternal?this.nodes[this.getBoxPosition(c)].insert(c,a-1):(this.isEmpty=!1,this.body?a?(this.isInternal=!0,this.divideBox(),!0!==this.body&&(this.nodes[this.getBoxPosition(this.body)].insert(this.body,a-1),this.body=!0),this.nodes[this.getBoxPosition(c)].insert(c,a-1)):(a=new h({top:c.plotX,left:c.plotY,width:.1,height:.1}),a.body=c,a.isInternal=!1,this.nodes.push(a)):(this.isInternal=!1,this.body=c))},updateMassAndCenter:function(){var c=
                0,a=0,d=0;this.isInternal?(this.nodes.forEach(function(e){e.isEmpty||(c+=e.mass,a+=e.plotX*e.mass,d+=e.plotY*e.mass)}),a/=c,d/=c):this.body&&(c=this.body.mass,a=this.body.plotX,d=this.body.plotY);this.mass=c;this.plotX=a;this.plotY=d},divideBox:function(){var c=this.box.width/2,a=this.box.height/2;this.nodes[0]=new h({left:this.box.left,top:this.box.top,width:c,height:a});this.nodes[1]=new h({left:this.box.left+c,top:this.box.top,width:c,height:a});this.nodes[2]=new h({left:this.box.left+c,top:this.box.top+
                    a,width:c,height:a});this.nodes[3]=new h({left:this.box.left,top:this.box.top+a,width:c,height:a})},getBoxPosition:function(c){var a=c.plotY<this.box.top+this.box.height/2;return c.plotX<this.box.left+this.box.width/2?a?0:3:a?1:2}});e=e.QuadTree=function(c,a,d,e){this.box={left:c,top:a,width:d,height:e};this.maxDepth=25;this.root=new h(this.box,"0");this.root.isInternal=!0;this.root.isRoot=!0;this.root.divideBox()};d(e.prototype,{insertNodes:function(c){c.forEach(function(a){this.root.insert(a,this.maxDepth)},
                this)},visitNodeRecursive:function(c,a,d){var e;c||(c=this.root);c===this.root&&a&&(e=a(c));!1!==e&&(c.nodes.forEach(function(c){if(c.isInternal){a&&(e=a(c));if(!1===e)return;this.visitNodeRecursive(c,a,d)}else c.body&&a&&a(c.body);d&&d(c)},this),c===this.root&&d&&d(c))},calculateMassAndCenter:function(){this.visitNodeRecursive(null,null,function(c){c.updateMassAndCenter()})}})});z(e,"Series/Networkgraph/Layouts.js",[e["Core/Chart/Chart.js"],e["Core/Animation/AnimationUtilities.js"],e["Core/Globals.js"],
            e["Core/Utilities.js"]],function(e,d,h,c){var a=d.setAnimation;d=c.addEvent;var t=c.clamp,m=c.defined,l=c.extend,r=c.isFunction,x=c.pick;h.layouts={"reingold-fruchterman":function(){}};l(h.layouts["reingold-fruchterman"].prototype,{init:function(b){this.options=b;this.nodes=[];this.links=[];this.series=[];this.box={x:0,y:0,width:0,height:0};this.setInitialRendering(!0);this.integration=h.networkgraphIntegrations[b.integration];this.enableSimulation=b.enableSimulation;this.attractiveForce=x(b.attractiveForce,
                this.integration.attractiveForceFunction);this.repulsiveForce=x(b.repulsiveForce,this.integration.repulsiveForceFunction);this.approximation=b.approximation},updateSimulation:function(b){this.enableSimulation=x(b,this.options.enableSimulation)},start:function(){var b=this.series,a=this.options;this.currentStep=0;this.forces=b[0]&&b[0].forces||[];this.chart=b[0]&&b[0].chart;this.initialRendering&&(this.initPositions(),b.forEach(function(b){b.finishedAnimating=!0;b.render()}));this.setK();this.resetSimulation(a);
                this.enableSimulation&&this.step()},step:function(){var b=this,a=this.series;b.currentStep++;"barnes-hut"===b.approximation&&(b.createQuadTree(),b.quadTree.calculateMassAndCenter());b.forces.forEach(function(a){b[a+"Forces"](b.temperature)});b.applyLimits(b.temperature);b.temperature=b.coolDown(b.startTemperature,b.diffTemperature,b.currentStep);b.prevSystemTemperature=b.systemTemperature;b.systemTemperature=b.getSystemTemperature();b.enableSimulation&&(a.forEach(function(b){b.chart&&b.render()}),
                b.maxIterations--&&isFinite(b.temperature)&&!b.isStable()?(b.simulation&&h.win.cancelAnimationFrame(b.simulation),b.simulation=h.win.requestAnimationFrame(function(){b.step()})):b.simulation=!1)},stop:function(){this.simulation&&h.win.cancelAnimationFrame(this.simulation)},setArea:function(b,a,c,d){this.box={left:b,top:a,width:c,height:d}},setK:function(){this.k=this.options.linkLength||this.integration.getK(this)},addElementsToCollection:function(b,a){b.forEach(function(b){-1===a.indexOf(b)&&a.push(b)})},
            removeElementFromCollection:function(b,a){b=a.indexOf(b);-1!==b&&a.splice(b,1)},clear:function(){this.nodes.length=0;this.links.length=0;this.series.length=0;this.resetSimulation()},resetSimulation:function(){this.forcedStop=!1;this.systemTemperature=0;this.setMaxIterations();this.setTemperature();this.setDiffTemperature()},restartSimulation:function(){this.simulation?this.resetSimulation():(this.setInitialRendering(!1),this.enableSimulation?this.start():this.setMaxIterations(1),this.chart&&this.chart.redraw(),
                this.setInitialRendering(!0))},setMaxIterations:function(b){this.maxIterations=x(b,this.options.maxIterations)},setTemperature:function(){this.temperature=this.startTemperature=Math.sqrt(this.nodes.length)},setDiffTemperature:function(){this.diffTemperature=this.startTemperature/(this.options.maxIterations+1)},setInitialRendering:function(b){this.initialRendering=b},createQuadTree:function(){this.quadTree=new h.QuadTree(this.box.left,this.box.top,this.box.width,this.box.height);this.quadTree.insertNodes(this.nodes)},
            initPositions:function(){var b=this.options.initialPositions;r(b)?(b.call(this),this.nodes.forEach(function(b){m(b.prevX)||(b.prevX=b.plotX);m(b.prevY)||(b.prevY=b.plotY);b.dispX=0;b.dispY=0})):"circle"===b?this.setCircularPositions():this.setRandomPositions()},setCircularPositions:function(){function b(a){a.linksFrom.forEach(function(a){h[a.toNode.id]||(h[a.toNode.id]=!0,l.push(a.toNode),b(a.toNode))})}var a=this.box,c=this.nodes,d=2*Math.PI/(c.length+1),e=c.filter(function(b){return 0===b.linksTo.length}),
                l=[],h={},m=this.options.initialPositionRadius;e.forEach(function(a){l.push(a);b(a)});l.length?c.forEach(function(b){-1===l.indexOf(b)&&l.push(b)}):l=c;l.forEach(function(b,c){b.plotX=b.prevX=x(b.plotX,a.width/2+m*Math.cos(c*d));b.plotY=b.prevY=x(b.plotY,a.height/2+m*Math.sin(c*d));b.dispX=0;b.dispY=0})},setRandomPositions:function(){function b(b){b=b*b/Math.PI;return b-=Math.floor(b)}var a=this.box,c=this.nodes,d=c.length+1;c.forEach(function(c,e){c.plotX=c.prevX=x(c.plotX,a.width*b(e));c.plotY=
                c.prevY=x(c.plotY,a.height*b(d+e));c.dispX=0;c.dispY=0})},force:function(b){this.integration[b].apply(this,Array.prototype.slice.call(arguments,1))},barycenterForces:function(){this.getBarycenter();this.force("barycenter")},getBarycenter:function(){var b=0,a=0,c=0;this.nodes.forEach(function(d){a+=d.plotX*d.mass;c+=d.plotY*d.mass;b+=d.mass});return this.barycenter={x:a,y:c,xFactor:a/b,yFactor:c/b}},barnesHutApproximation:function(b,a){var c=this.getDistXY(b,a),d=this.vectorLength(c);if(b!==a&&0!==
                d)if(a.isInternal)if(a.boxSize/d<this.options.theta&&0!==d){var e=this.repulsiveForce(d,this.k);this.force("repulsive",b,e*a.mass,c,d);var l=!1}else l=!0;else e=this.repulsiveForce(d,this.k),this.force("repulsive",b,e*a.mass,c,d);return l},repulsiveForces:function(){var b=this;"barnes-hut"===b.approximation?b.nodes.forEach(function(a){b.quadTree.visitNodeRecursive(null,function(c){return b.barnesHutApproximation(a,c)})}):b.nodes.forEach(function(a){b.nodes.forEach(function(c){if(a!==c&&!a.fixedPosition){var d=
                b.getDistXY(a,c);var e=b.vectorLength(d);if(0!==e){var k=b.repulsiveForce(e,b.k);b.force("repulsive",a,k*c.mass,d,e)}}})})},attractiveForces:function(){var b=this,a,c,d;b.links.forEach(function(e){e.fromNode&&e.toNode&&(a=b.getDistXY(e.fromNode,e.toNode),c=b.vectorLength(a),0!==c&&(d=b.attractiveForce(c,b.k),b.force("attractive",e,d,a,c)))})},applyLimits:function(){var b=this;b.nodes.forEach(function(a){a.fixedPosition||(b.integration.integrate(b,a),b.applyLimitBox(a,b.box),a.dispX=0,a.dispY=0)})},
            applyLimitBox:function(b,a){var c=b.radius;b.plotX=t(b.plotX,a.left+c,a.width-c);b.plotY=t(b.plotY,a.top+c,a.height-c)},coolDown:function(a,c,d){return a-c*d},isStable:function(){return.00001>Math.abs(this.systemTemperature-this.prevSystemTemperature)||0>=this.temperature},getSystemTemperature:function(){return this.nodes.reduce(function(a,c){return a+c.temperature},0)},vectorLength:function(a){return Math.sqrt(a.x*a.x+a.y*a.y)},getDistR:function(a,c){a=this.getDistXY(a,c);return this.vectorLength(a)},
            getDistXY:function(a,c){var b=a.plotX-c.plotX;a=a.plotY-c.plotY;return{x:b,y:a,absX:Math.abs(b),absY:Math.abs(a)}}});d(e,"predraw",function(){this.graphLayoutsLookup&&this.graphLayoutsLookup.forEach(function(a){a.stop()})});d(e,"render",function(){function b(a){a.maxIterations--&&isFinite(a.temperature)&&!a.isStable()&&!a.enableSimulation&&(a.beforeStep&&a.beforeStep(),a.step(),d=!1,c=!0)}var c=!1;if(this.graphLayoutsLookup){a(!1,this);for(this.graphLayoutsLookup.forEach(function(a){a.start()});!d;){var d=
            !0;this.graphLayoutsLookup.forEach(b)}c&&this.series.forEach(function(a){a&&a.layout&&a.render()})}});d(e,"beforePrint",function(){this.graphLayoutsLookup&&(this.graphLayoutsLookup.forEach(function(a){a.updateSimulation(!1)}),this.redraw())});d(e,"afterPrint",function(){this.graphLayoutsLookup&&this.graphLayoutsLookup.forEach(function(a){a.updateSimulation()});this.redraw()})});z(e,"Series/PackedBubble/PackedBubbleComposition.js",[e["Core/Chart/Chart.js"],e["Core/Globals.js"],e["Core/Utilities.js"]],
            function(e,d,h){var c=d.layouts["reingold-fruchterman"],a=h.addEvent,t=h.extendClass,m=h.pick;e.prototype.getSelectedParentNodes=function(){var a=[];this.series.forEach(function(c){c.parentNode&&c.parentNode.selected&&a.push(c.parentNode)});return a};d.networkgraphIntegrations.packedbubble={repulsiveForceFunction:function(a,c,d,b){return Math.min(a,(d.marker.radius+b.marker.radius)/2)},barycenter:function(){var a=this,c=a.options.gravitationalConstant,d=a.box,b=a.nodes,e,k;b.forEach(function(l){a.options.splitSeries&&
                !l.isParentNode?(e=l.series.parentNode.plotX,k=l.series.parentNode.plotY):(e=d.width/2,k=d.height/2);l.fixedPosition||(l.plotX-=(l.plotX-e)*c/(l.mass*Math.sqrt(b.length)),l.plotY-=(l.plotY-k)*c/(l.mass*Math.sqrt(b.length)))})},repulsive:function(a,c,d,b){var e=c*this.diffTemperature/a.mass/a.degree;c=d.x*e;d=d.y*e;a.fixedPosition||(a.plotX+=c,a.plotY+=d);b.fixedPosition||(b.plotX-=c,b.plotY-=d)},integrate:d.networkgraphIntegrations.verlet.integrate,getK:d.noop};d.layouts.packedbubble=t(c,{beforeStep:function(){this.options.marker&&
                this.series.forEach(function(a){a&&a.calculateParentRadius()})},isStable:function(){var a=Math.abs(this.prevSystemTemperature-this.systemTemperature);return 1>Math.abs(10*this.systemTemperature/Math.sqrt(this.nodes.length))&&.00001>a||0>=this.temperature},setCircularPositions:function(){var a=this,c=a.box,d=a.nodes,b=2*Math.PI/(d.length+1),e,k,h=a.options.initialPositionRadius;d.forEach(function(d,l){a.options.splitSeries&&!d.isParentNode?(e=d.series.parentNode.plotX,k=d.series.parentNode.plotY):
                    (e=c.width/2,k=c.height/2);d.plotX=d.prevX=m(d.plotX,e+h*Math.cos(d.index||l*b));d.plotY=d.prevY=m(d.plotY,k+h*Math.sin(d.index||l*b));d.dispX=0;d.dispY=0})},repulsiveForces:function(){var a=this,c,d,b,e=a.options.bubblePadding;a.nodes.forEach(function(k){k.degree=k.mass;k.neighbours=0;a.nodes.forEach(function(h){c=0;k===h||k.fixedPosition||!a.options.seriesInteraction&&k.series!==h.series||(b=a.getDistXY(k,h),d=a.vectorLength(b)-(k.marker.radius+h.marker.radius+e),0>d&&(k.degree+=.01,k.neighbours++,
                    c=a.repulsiveForce(-d/Math.sqrt(k.neighbours),a.k,k,h)),a.force("repulsive",k,c*h.mass,b,h,d))})})},applyLimitBox:function(a){if(this.options.splitSeries&&!a.isParentNode&&this.options.parentNodeLimit){var d=this.getDistXY(a,a.series.parentNode);var e=a.series.parentNodeRadius-a.marker.radius-this.vectorLength(d);0>e&&e>-2*a.marker.radius&&(a.plotX-=.01*d.x,a.plotY-=.01*d.y)}c.prototype.applyLimitBox.apply(this,arguments)}});a(e,"beforeRedraw",function(){this.allDataPoints&&delete this.allDataPoints})});
        z(e,"Series/PackedBubble/PackedBubbleSeries.js",[e["Core/Color/Color.js"],e["Core/Globals.js"],e["Series/PackedBubble/PackedBubblePoint.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(e,d,h,c,a){var t=this&&this.__extends||function(){var a=function(b,f){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var f in b)b.hasOwnProperty(f)&&(a[f]=b[f])};return a(b,f)};return function(b,f){function c(){this.constructor=b}a(b,
            f);b.prototype=null===f?Object.create(f):(c.prototype=f.prototype,new c)}}(),m=e.parse,l=c.series,r=c.seriesTypes.bubble,x=a.addEvent,b=a.clamp,q=a.defined,k=a.extend,p=a.fireEvent,v=a.isArray,B=a.isNumber,z=a.merge,D=a.pick,y=d.dragNodesMixin;e=function(a){function c(){var b=null!==a&&a.apply(this,arguments)||this;b.chart=void 0;b.data=void 0;b.layout=void 0;b.options=void 0;b.points=void 0;b.xData=void 0;return b}t(c,a);c.prototype.accumulateAllPoints=function(a){var b=a.chart,c=[],f,d;for(f=0;f<
        b.series.length;f++)if(a=b.series[f],a.is("packedbubble")&&a.visible||!b.options.chart.ignoreHiddenSeries)for(d=0;d<a.yData.length;d++)c.push([null,null,a.yData[d],a.index,d,{id:d,marker:{radius:0}}]);return c};c.prototype.addLayout=function(){var a=this.options.layoutAlgorithm,b=this.chart.graphLayoutsStorage,c=this.chart.graphLayoutsLookup,g=this.chart.options.chart;b||(this.chart.graphLayoutsStorage=b={},this.chart.graphLayoutsLookup=c=[]);var e=b[a.type];e||(a.enableSimulation=q(g.forExport)?
            !g.forExport:a.enableSimulation,b[a.type]=e=new d.layouts[a.type],e.init(a),c.splice(e.index,0,e));this.layout=e;this.points.forEach(function(a){a.mass=2;a.degree=1;a.collisionNmb=1});e.setArea(0,0,this.chart.plotWidth,this.chart.plotHeight);e.addElementsToCollection([this],e.series);e.addElementsToCollection(this.points,e.nodes)};c.prototype.addSeriesLayout=function(){var a=this.options.layoutAlgorithm,b=this.chart.graphLayoutsStorage,c=this.chart.graphLayoutsLookup,g=z(a,a.parentNodeOptions,{enableSimulation:this.layout.options.enableSimulation});
            var e=b[a.type+"-series"];e||(b[a.type+"-series"]=e=new d.layouts[a.type],e.init(g),c.splice(e.index,0,e));this.parentNodeLayout=e;this.createParentNodes()};c.prototype.calculateParentRadius=function(){var a=this.seriesBox();this.parentNodeRadius=b(Math.sqrt(2*this.parentNodeMass/Math.PI)+20,20,a?Math.max(Math.sqrt(Math.pow(a.width,2)+Math.pow(a.height,2))/2+20,20):Math.sqrt(2*this.parentNodeMass/Math.PI)+20);this.parentNode&&(this.parentNode.marker.radius=this.parentNode.radius=this.parentNodeRadius)};
            c.prototype.calculateZExtremes=function(){var a=this.options.zMin,b=this.options.zMax,c=Infinity,d=-Infinity;if(a&&b)return[a,b];this.chart.series.forEach(function(a){a.yData.forEach(function(a){q(a)&&(a>d&&(d=a),a<c&&(c=a))})});a=D(a,c);b=D(b,d);return[a,b]};c.prototype.checkOverlap=function(a,b){var c=a[0]-b[0],f=a[1]-b[1];return-.001>Math.sqrt(c*c+f*f)-Math.abs(a[2]+b[2])};c.prototype.createParentNodes=function(){var a=this,b=a.chart,c=a.parentNodeLayout,d,g=a.parentNode,e=a.pointClass;a.parentNodeMass=
                0;a.points.forEach(function(b){a.parentNodeMass+=Math.PI*Math.pow(b.marker.radius,2)});a.calculateParentRadius();c.nodes.forEach(function(b){b.seriesIndex===a.index&&(d=!0)});c.setArea(0,0,b.plotWidth,b.plotHeight);d||(g||(g=(new e).init(this,{mass:a.parentNodeRadius/2,marker:{radius:a.parentNodeRadius},dataLabels:{inside:!1},dataLabelOnNull:!0,degree:a.parentNodeRadius,isParentNode:!0,seriesIndex:a.index})),a.parentNode&&(g.plotX=a.parentNode.plotX,g.plotY=a.parentNode.plotY),a.parentNode=g,c.addElementsToCollection([a],
                c.series),c.addElementsToCollection([g],c.nodes))};c.prototype.deferLayout=function(){var a=this.options.layoutAlgorithm;this.visible&&(this.addLayout(),a.splitSeries&&this.addSeriesLayout())};c.prototype.destroy=function(){this.chart.graphLayoutsLookup&&this.chart.graphLayoutsLookup.forEach(function(a){a.removeElementFromCollection(this,a.series)},this);this.parentNode&&this.parentNodeLayout&&(this.parentNodeLayout.removeElementFromCollection(this.parentNode,this.parentNodeLayout.nodes),this.parentNode.dataLabel&&
            (this.parentNode.dataLabel=this.parentNode.dataLabel.destroy()));l.prototype.destroy.apply(this,arguments)};c.prototype.drawDataLabels=function(){var a=this.options.dataLabels.textPath,b=this.points;l.prototype.drawDataLabels.apply(this,arguments);this.parentNode&&(this.parentNode.formatPrefix="parentNode",this.points=[this.parentNode],this.options.dataLabels.textPath=this.options.dataLabels.parentNodeTextPath,l.prototype.drawDataLabels.apply(this,arguments),this.points=b,this.options.dataLabels.textPath=
                a)};c.prototype.drawGraph=function(){if(this.layout&&this.layout.options.splitSeries){var a=this.chart;var b=this.layout.options.parentNodeOptions.marker;var c={fill:b.fillColor||m(this.color).brighten(.4).get(),opacity:b.fillOpacity,stroke:b.lineColor||this.color,"stroke-width":b.lineWidth};this.parentNodesGroup||(this.parentNodesGroup=this.plotGroup("parentNodesGroup","parentNode",this.visible?"inherit":"hidden",.1,a.seriesGroup),this.group.attr({zIndex:2}));this.calculateParentRadius();b=z({x:this.parentNode.plotX-
                    this.parentNodeRadius,y:this.parentNode.plotY-this.parentNodeRadius,width:2*this.parentNodeRadius,height:2*this.parentNodeRadius},c);this.parentNode.graphic||(this.graph=this.parentNode.graphic=a.renderer.symbol(c.symbol).add(this.parentNodesGroup));this.parentNode.graphic.attr(b)}};c.prototype.drawTracker=function(){var b=this.parentNode;a.prototype.drawTracker.call(this);if(b){var c=v(b.dataLabels)?b.dataLabels:b.dataLabel?[b.dataLabel]:[];b.graphic&&(b.graphic.element.point=b);c.forEach(function(a){a.div?
                a.div.point=b:a.element.point=b})}};c.prototype.getPointRadius=function(){var a=this,c=a.chart,d=a.options,g=d.useSimulation,e=Math.min(c.plotWidth,c.plotHeight),k={},h=[],l=c.allDataPoints,q,p,m,r;["minSize","maxSize"].forEach(function(a){var b=parseInt(d[a],10),c=/%$/.test(d[a]);k[a]=c?e*b/100:b*Math.sqrt(l.length)});c.minRadius=q=k.minSize/Math.sqrt(l.length);c.maxRadius=p=k.maxSize/Math.sqrt(l.length);var v=g?a.calculateZExtremes():[q,p];(l||[]).forEach(function(c,f){m=g?b(c[2],v[0],v[1]):c[2];
                r=a.getRadius(v[0],v[1],q,p,m);0===r&&(r=null);l[f][2]=r;h.push(r)});a.radii=h};c.prototype.init=function(){l.prototype.init.apply(this,arguments);this.eventsToUnbind.push(x(this,"updatedData",function(){this.chart.series.forEach(function(a){a.type===this.type&&(a.isDirty=!0)},this)}));return this};c.prototype.onMouseUp=function(a){if(a.fixedPosition&&!a.removed){var b,c,f=this.layout,d=this.parentNodeLayout;d&&f.options.dragBetweenSeries&&d.nodes.forEach(function(d){a&&a.marker&&d!==a.series.parentNode&&
            (b=f.getDistXY(a,d),c=f.vectorLength(b)-d.marker.radius-a.marker.radius,0>c&&(d.series.addPoint(z(a.options,{plotX:a.plotX,plotY:a.plotY}),!1),f.removeElementFromCollection(a,f.nodes),a.remove()))});y.onMouseUp.apply(this,arguments)}};c.prototype.placeBubbles=function(a){var b=this.checkOverlap,c=this.positionBubble,f=[],d=1,g=0,e=0;var k=[];var h;a=a.sort(function(a,b){return b[2]-a[2]});if(a.length){f.push([[0,0,a[0][2],a[0][3],a[0][4]]]);if(1<a.length)for(f.push([[0,0-a[1][2]-a[0][2],a[1][2],a[1][3],
                a[1][4]]]),h=2;h<a.length;h++)a[h][2]=a[h][2]||1,k=c(f[d][g],f[d-1][e],a[h]),b(k,f[d][0])?(f.push([]),e=0,f[d+1].push(c(f[d][g],f[d][0],a[h])),d++,g=0):1<d&&f[d-1][e+1]&&b(k,f[d-1][e+1])?(e++,f[d].push(c(f[d][g],f[d-1][e],a[h])),g++):(g++,f[d].push(k));this.chart.stages=f;this.chart.rawPositions=[].concat.apply([],f);this.resizeRadius();k=this.chart.rawPositions}return k};c.prototype.positionBubble=function(a,b,c){var f=Math.sqrt,d=Math.asin,g=Math.acos,e=Math.pow,k=Math.abs;f=f(e(a[0]-b[0],2)+e(a[1]-
                b[1],2));g=g((e(f,2)+e(c[2]+b[2],2)-e(c[2]+a[2],2))/(2*(c[2]+b[2])*f));d=d(k(a[0]-b[0])/f);a=(0>a[1]-b[1]?0:Math.PI)+g+d*(0>(a[0]-b[0])*(a[1]-b[1])?1:-1);return[b[0]+(b[2]+c[2])*Math.sin(a),b[1]-(b[2]+c[2])*Math.cos(a),c[2],c[3],c[4]]};c.prototype.render=function(){var a=[];l.prototype.render.apply(this,arguments);this.options.dataLabels.allowOverlap||(this.data.forEach(function(b){v(b.dataLabels)&&b.dataLabels.forEach(function(b){a.push(b)})}),this.options.useSimulation&&this.chart.hideOverlappingLabels(a))};
            c.prototype.resizeRadius=function(){var a=this.chart,b=a.rawPositions,c=Math.min,d=Math.max,g=a.plotLeft,e=a.plotTop,k=a.plotHeight,h=a.plotWidth,l,q,p;var m=l=Number.POSITIVE_INFINITY;var r=q=Number.NEGATIVE_INFINITY;for(p=0;p<b.length;p++){var v=b[p][2];m=c(m,b[p][0]-v);r=d(r,b[p][0]+v);l=c(l,b[p][1]-v);q=d(q,b[p][1]+v)}p=[r-m,q-l];c=c.apply([],[(h-g)/p[0],(k-e)/p[1]]);if(1e-10<Math.abs(c-1)){for(p=0;p<b.length;p++)b[p][2]*=c;this.placeBubbles(b)}else a.diffY=k/2+e-l-(q-l)/2,a.diffX=h/2+g-m-(r-
                m)/2};c.prototype.seriesBox=function(){var a=this.chart,b=Math.max,c=Math.min,d,g=[a.plotLeft,a.plotLeft+a.plotWidth,a.plotTop,a.plotTop+a.plotHeight];this.data.forEach(function(a){q(a.plotX)&&q(a.plotY)&&a.marker.radius&&(d=a.marker.radius,g[0]=c(g[0],a.plotX-d),g[1]=b(g[1],a.plotX+d),g[2]=c(g[2],a.plotY-d),g[3]=b(g[3],a.plotY+d))});return B(g.width/g.height)?g:null};c.prototype.setVisible=function(){var a=this;l.prototype.setVisible.apply(a,arguments);a.parentNodeLayout&&a.graph?a.visible?(a.graph.show(),
            a.parentNode.dataLabel&&a.parentNode.dataLabel.show()):(a.graph.hide(),a.parentNodeLayout.removeElementFromCollection(a.parentNode,a.parentNodeLayout.nodes),a.parentNode.dataLabel&&a.parentNode.dataLabel.hide()):a.layout&&(a.visible?a.layout.addElementsToCollection(a.points,a.layout.nodes):a.points.forEach(function(b){a.layout.removeElementFromCollection(b,a.layout.nodes)}))};c.prototype.translate=function(){var a=this.chart,b=this.data,c=this.index,d,g=this.options.useSimulation;this.processedXData=
                this.xData;this.generatePoints();q(a.allDataPoints)||(a.allDataPoints=this.accumulateAllPoints(this),this.getPointRadius());if(g)var e=a.allDataPoints;else e=this.placeBubbles(a.allDataPoints),this.options.draggable=!1;for(d=0;d<e.length;d++)if(e[d][3]===c){var h=b[e[d][4]];var l=D(e[d][2],void 0);g||(h.plotX=e[d][0]-a.plotLeft+a.diffX,h.plotY=e[d][1]-a.plotTop+a.diffY);B(l)&&(h.marker=k(h.marker,{radius:l,width:2*l,height:2*l}),h.radius=l)}g&&this.deferLayout();p(this,"afterTranslate")};c.defaultOptions=
                z(r.defaultOptions,{minSize:"10%",maxSize:"50%",sizeBy:"area",zoneAxis:"y",crisp:!1,tooltip:{pointFormat:"Value: {point.value}"},draggable:!0,useSimulation:!0,parentNode:{allowPointSelect:!1},dataLabels:{formatter:function(){var a=this.series.chart.numberFormatter,b=this.point.value;return B(b)?a(b,-1):""},parentNodeFormatter:function(){return this.name},parentNodeTextPath:{enabled:!0},padding:0,style:{transition:"opacity 2000ms"}},layoutAlgorithm:{initialPositions:"circle",initialPositionRadius:20,
                        bubblePadding:5,parentNodeLimit:!1,seriesInteraction:!0,dragBetweenSeries:!1,parentNodeOptions:{maxIterations:400,gravitationalConstant:.03,maxSpeed:50,initialPositionRadius:100,seriesInteraction:!0,marker:{fillColor:null,fillOpacity:1,lineWidth:1,lineColor:null,symbol:"circle"}},enableSimulation:!0,type:"packedbubble",integration:"packedbubble",maxIterations:1E3,splitSeries:!1,maxSpeed:5,gravitationalConstant:.01,friction:-.981}});return c}(r);k(e.prototype,{alignDataLabel:l.prototype.alignDataLabel,
            axisTypes:[],directTouch:!0,forces:["barycenter","repulsive"],hasDraggableNodes:!0,isCartesian:!1,noSharedTooltip:!0,onMouseDown:y.onMouseDown,onMouseMove:y.onMouseMove,pointArrayMap:["value"],pointClass:h,pointValKey:"value",redrawHalo:y.redrawHalo,requireSorting:!1,searchPoint:d.noop,trackerGroups:["group","dataLabelsGroup","parentNodesGroup"]});c.registerSeriesType("packedbubble",e);"";"";return e});z(e,"Series/Polygon/PolygonSeries.js",[e["Core/Globals.js"],e["Core/Legend/LegendSymbol.js"],e["Core/Series/SeriesRegistry.js"],
            e["Core/Utilities.js"]],function(e,d,h,c){var a=this&&this.__extends||function(){var a=function(b,c){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var c in b)b.hasOwnProperty(c)&&(a[c]=b[c])};return a(b,c)};return function(b,c){function d(){this.constructor=b}a(b,c);b.prototype=null===c?Object.create(c):(d.prototype=c.prototype,new d)}}();e=e.noop;var t=h.series,m=h.seriesTypes,l=m.area,r=m.line,x=m.scatter;m=c.extend;var b=c.merge;c=function(c){function d(){var a=
            null!==c&&c.apply(this,arguments)||this;a.data=void 0;a.options=void 0;a.points=void 0;return a}a(d,c);d.prototype.getGraphPath=function(){for(var a=r.prototype.getGraphPath.call(this),b=a.length+1;b--;)(b===a.length||"M"===a[b][0])&&0<b&&a.splice(b,0,["Z"]);return this.areaPath=a};d.prototype.drawGraph=function(){this.options.fillColor=this.color;l.prototype.drawGraph.call(this)};d.defaultOptions=b(x.defaultOptions,{marker:{enabled:!1,states:{hover:{enabled:!1}}},stickyTracking:!1,tooltip:{followPointer:!0,
                pointFormat:""},trackByArea:!0});return d}(x);m(c.prototype,{type:"polygon",drawLegendSymbol:d.drawRectangle,drawTracker:t.prototype.drawTracker,setStackedPoints:e});h.registerSeriesType("polygon",c);"";return c});z(e,"Core/Axis/WaterfallAxis.js",[e["Extensions/Stacking.js"],e["Core/Utilities.js"]],function(e,d){var h=d.addEvent,c=d.objectEach,a;(function(a){function d(){var a=this.waterfall.stacks;a&&(a.changed=!1,delete a.alreadyChanged)}function l(){var a=this.options.stackLabels;a&&a.enabled&&
        this.waterfall.stacks&&this.waterfall.renderStackTotals()}function r(){for(var a=this.axes,b=this.series,c=b.length;c--;)b[c].options.stacking&&(a.forEach(function(a){a.isXAxis||(a.waterfall.stacks.changed=!0)}),c=0)}function x(){this.waterfall||(this.waterfall=new b(this))}var b=function(){function a(a){this.axis=a;this.stacks={changed:!1}}a.prototype.renderStackTotals=function(){var a=this.axis,b=a.waterfall.stacks,d=a.stacking&&a.stacking.stackTotalGroup,h=new e(a,a.options.stackLabels,!1,0,void 0);
            this.dummyStackItem=h;c(b,function(a){c(a,function(a){h.total=a.stackTotal;a.label&&(h.label=a.label);e.prototype.render.call(h,d);a.label=h.label;delete h.label})});h.total=null};return a}();a.Composition=b;a.compose=function(a,b){h(a,"init",x);h(a,"afterBuildStacks",d);h(a,"afterRender",l);h(b,"beforeRedraw",r)}})(a||(a={}));return a});z(e,"Series/Waterfall/WaterfallPoint.js",[e["Series/Column/ColumnSeries.js"],e["Core/Series/Point.js"],e["Core/Utilities.js"]],function(e,d,h){var c=this&&this.__extends||
            function(){var a=function(c,d){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var b in c)c.hasOwnProperty(b)&&(a[b]=c[b])};return a(c,d)};return function(c,d){function e(){this.constructor=c}a(c,d);c.prototype=null===d?Object.create(d):(e.prototype=d.prototype,new e)}}(),a=h.isNumber;return function(e){function h(){var a=null!==e&&e.apply(this,arguments)||this;a.options=void 0;a.series=void 0;return a}c(h,e);h.prototype.getClassName=function(){var a=
            d.prototype.getClassName.call(this);this.isSum?a+=" highcharts-sum":this.isIntermediateSum&&(a+=" highcharts-intermediate-sum");return a};h.prototype.isValid=function(){return a(this.y)||this.isSum||!!this.isIntermediateSum};return h}(e.prototype.pointClass)});z(e,"Series/Waterfall/WaterfallSeries.js",[e["Core/Axis/Axis.js"],e["Core/Chart/Chart.js"],e["Core/Color/Palette.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"],e["Core/Axis/WaterfallAxis.js"],e["Series/Waterfall/WaterfallPoint.js"]],
            function(e,d,h,c,a,t,m){var l=this&&this.__extends||function(){var a=function(b,c){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var c in b)b.hasOwnProperty(c)&&(a[c]=b[c])};return a(b,c)};return function(b,c){function d(){this.constructor=b}a(b,c);b.prototype=null===c?Object.create(c):(d.prototype=c.prototype,new d)}}(),r=c.seriesTypes,x=r.column,b=r.line,q=a.arrayMax,k=a.arrayMin,p=a.correctFloat;r=a.extend;var v=a.isNumber,z=a.merge,D=
                a.objectEach,L=a.pick;a=function(a){function c(){var b=null!==a&&a.apply(this,arguments)||this;b.chart=void 0;b.data=void 0;b.options=void 0;b.points=void 0;b.stackedYNeg=void 0;b.stackedYPos=void 0;b.stackKey=void 0;b.xData=void 0;b.yAxis=void 0;b.yData=void 0;return b}l(c,a);c.prototype.generatePoints=function(){var a;x.prototype.generatePoints.apply(this);var b=0;for(a=this.points.length;b<a;b++){var c=this.points[b];var d=this.processedYData[b];if(c.isIntermediateSum||c.isSum)c.y=p(d)}};c.prototype.translate=
                function(){var a=this.options,b=this.yAxis,c=L(a.minPointLength,5),d=c/2,e=a.threshold||0,h=e,k=e;a=a.stacking;var l=b.waterfall.stacks[this.stackKey];x.prototype.translate.apply(this);for(var q=this.points,p=0;p<q.length;p++){var m=q[p];var r=this.processedYData[p];var C=m.shapeArgs;if(C&&v(r)){var t=[0,r];var G=m.y;if(a){if(l){t=l[p];if("overlap"===a){var y=t.stackState[t.stateIndex--];y=0<=G?y:y-G;Object.hasOwnProperty.call(t,"absolutePos")&&delete t.absolutePos;Object.hasOwnProperty.call(t,"absoluteNeg")&&
                delete t.absoluteNeg}else 0<=G?(y=t.threshold+t.posTotal,t.posTotal-=G):(y=t.threshold+t.negTotal,t.negTotal-=G,y-=G),!t.posTotal&&Object.hasOwnProperty.call(t,"absolutePos")&&(t.posTotal=t.absolutePos,delete t.absolutePos),!t.negTotal&&Object.hasOwnProperty.call(t,"absoluteNeg")&&(t.negTotal=t.absoluteNeg,delete t.absoluteNeg);m.isSum||(t.connectorThreshold=t.threshold+t.stackTotal);b.reversed?(r=0<=G?y-G:y+G,G=y):(r=y,G=y-G);m.below=r<=e;C.y=b.translate(r,!1,!0,!1,!0)||0;C.height=Math.abs(C.y-(b.translate(G,
                    !1,!0,!1,!0)||0));if(G=b.waterfall.dummyStackItem)G.x=p,G.label=l[p].label,G.setOffset(this.pointXOffset||0,this.barW||0,this.stackedYNeg[p],this.stackedYPos[p])}}else y=Math.max(h,h+G)+t[0],C.y=b.translate(y,!1,!0,!1,!0)||0,m.isSum?(C.y=b.translate(t[1],!1,!0,!1,!0)||0,C.height=Math.min(b.translate(t[0],!1,!0,!1,!0)||0,b.len)-C.y,m.below=t[1]<=e):m.isIntermediateSum?(0<=G?(r=t[1]+k,G=k):(r=k,G=t[1]+k),b.reversed&&(r^=G,G^=r,r^=G),C.y=b.translate(r,!1,!0,!1,!0)||0,C.height=Math.abs(C.y-Math.min(b.translate(G,
                    !1,!0,!1,!0)||0,b.len)),k+=t[1],m.below=r<=e):(C.height=0<r?(b.translate(h,!1,!0,!1,!0)||0)-C.y:(b.translate(h,!1,!0,!1,!0)||0)-(b.translate(h-r,!1,!0,!1,!0)||0),h+=r,m.below=h<e),0>C.height&&(C.y+=C.height,C.height*=-1);m.plotY=C.y=Math.round(C.y||0)-this.borderWidth%2/2;C.height=Math.max(Math.round(C.height||0),.001);m.yBottom=C.y+C.height;C.height<=c&&!m.isNull?(C.height=c,C.y-=d,m.plotY=C.y,m.minPointLengthOffset=0>m.y?-d:d):(m.isNull&&(C.width=0),m.minPointLengthOffset=0);G=m.plotY+(m.negative?
                    C.height:0);m.below&&(m.plotY+=C.height);m.tooltipPos&&(this.chart.inverted?m.tooltipPos[0]=b.len-G:m.tooltipPos[1]=G)}}};c.prototype.processData=function(b){var c=this.options,d=this.yData,g=c.data,e=d.length,h=c.threshold||0,k,l,m,q,r;for(r=l=k=m=q=0;r<e;r++){var t=d[r];var v=g&&g[r]?g[r]:{};"sum"===t||v.isSum?d[r]=p(l):"intermediateSum"===t||v.isIntermediateSum?(d[r]=p(k),k=0):(l+=t,k+=t);m=Math.min(l,m);q=Math.max(l,q)}a.prototype.processData.call(this,b);c.stacking||(this.dataMin=m+h,this.dataMax=
                q)};c.prototype.toYData=function(a){return a.isSum?"sum":a.isIntermediateSum?"intermediateSum":a.y};c.prototype.updateParallelArrays=function(b,c){a.prototype.updateParallelArrays.call(this,b,c);if("sum"===this.yData[0]||"intermediateSum"===this.yData[0])this.yData[0]=null};c.prototype.pointAttribs=function(a,b){var c=this.options.upColor;c&&!a.options.color&&(a.color=0<a.y?c:null);a=x.prototype.pointAttribs.call(this,a,b);delete a.dashstyle;return a};c.prototype.getGraphPath=function(){return[["M",
                0,0]]};c.prototype.getCrispPath=function(){var a=this.data,b=this.yAxis,c=a.length,d=Math.round(this.graph.strokeWidth())%2/2,e=Math.round(this.borderWidth)%2/2,h=this.xAxis.reversed,k=this.yAxis.reversed,l=this.options.stacking,m=[],p;for(p=1;p<c;p++){var q=a[p].shapeArgs;var r=a[p-1];var t=a[p-1].shapeArgs;var v=b.waterfall.stacks[this.stackKey];var x=0<r.y?-t.height:0;v&&t&&q&&(v=v[p-1],l?(v=v.connectorThreshold,x=Math.round(b.translate(v,0,1,0,1)+(k?x:0))-d):x=t.y+r.minPointLengthOffset+e-d,m.push(["M",
                (t.x||0)+(h?0:t.width||0),x],["L",(q.x||0)+(h?q.width||0:0),x]));t&&m.length&&(!l&&0>r.y&&!k||0<r.y&&k)&&((r=m[m.length-2])&&"number"===typeof r[2]&&(r[2]+=t.height||0),(r=m[m.length-1])&&"number"===typeof r[2]&&(r[2]+=t.height||0))}return m};c.prototype.drawGraph=function(){b.prototype.drawGraph.call(this);this.graph.attr({d:this.getCrispPath()})};c.prototype.setStackedPoints=function(){function a(a,b,c,d){if(H)for(c;c<H;c++)z.stackState[c]+=d;else z.stackState[0]=a,H=z.stackState.length;z.stackState.push(z.stackState[H-
            1]+b)}var b=this.options,c=this.yAxis.waterfall.stacks,d=b.threshold,e=d||0,h=e,k=this.stackKey,l=this.xData,m=l.length,p,q,r;this.yAxis.stacking.usePercentage=!1;var t=q=r=e;if(this.visible||!this.chart.options.chart.ignoreHiddenSeries){var v=c.changed;(p=c.alreadyChanged)&&0>p.indexOf(k)&&(v=!0);c[k]||(c[k]={});p=c[k];for(var x=0;x<m;x++){var y=l[x];if(!p[y]||v)p[y]={negTotal:0,posTotal:0,stackTotal:0,threshold:0,stateIndex:0,stackState:[],label:v&&p[y]?p[y].label:void 0};var z=p[y];var E=this.yData[x];
                0<=E?z.posTotal+=E:z.negTotal+=E;var B=b.data[x];y=z.absolutePos=z.posTotal;var D=z.absoluteNeg=z.negTotal;z.stackTotal=y+D;var H=z.stackState.length;B&&B.isIntermediateSum?(a(r,q,0,r),r=q,q=d,e^=h,h^=e,e^=h):B&&B.isSum?(a(d,t,H),e=d):(a(e,E,0,t),B&&(t+=E,q+=E));z.stateIndex++;z.threshold=e;e+=z.stackTotal}c.changed=!1;c.alreadyChanged||(c.alreadyChanged=[]);c.alreadyChanged.push(k)}};c.prototype.getExtremes=function(){var a=this.options.stacking;if(a){var b=this.yAxis;b=b.waterfall.stacks;var c=
                this.stackedYNeg=[];var d=this.stackedYPos=[];"overlap"===a?D(b[this.stackKey],function(a){c.push(k(a.stackState));d.push(q(a.stackState))}):D(b[this.stackKey],function(a){c.push(a.negTotal+a.threshold);d.push(a.posTotal+a.threshold)});return{dataMin:k(c),dataMax:q(d)}}return{dataMin:this.dataMin,dataMax:this.dataMax}};c.defaultOptions=z(x.defaultOptions,{dataLabels:{inside:!0},lineWidth:1,lineColor:h.neutralColor80,dashStyle:"Dot",borderColor:h.neutralColor80,states:{hover:{lineWidthPlus:0}}});return c}(x);
                r(a.prototype,{getZonesGraphs:b.prototype.getZonesGraphs,pointValKey:"y",showLine:!0,pointClass:m});c.registerSeriesType("waterfall",a);t.compose(e,d);"";return a});z(e,"Extensions/Polar.js",[e["Core/Animation/AnimationUtilities.js"],e["Core/Chart/Chart.js"],e["Core/Globals.js"],e["Extensions/Pane.js"],e["Core/Pointer.js"],e["Core/Series/Series.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Renderer/SVG/SVGRenderer.js"],e["Core/Utilities.js"]],function(e,d,h,c,a,t,m,l,r){var x=e.animObject;m=m.seriesTypes;
            var b=r.addEvent,q=r.defined,k=r.find,p=r.isNumber,v=r.pick,z=r.splat,H=r.uniqueKey;e=r.wrap;var D=t.prototype;a=a.prototype;D.searchPointByAngle=function(a){var b=this.chart,c=this.xAxis.pane.center;return this.searchKDTree({clientX:180+-180/Math.PI*Math.atan2(a.chartX-c[0]-b.plotLeft,a.chartY-c[1]-b.plotTop)})};D.getConnectors=function(a,b,c,d){var f=d?1:0;var e=0<=b&&b<=a.length-1?b:0>b?a.length-1+b:0;b=0>e-1?a.length-(1+f):e-1;f=e+1>a.length-1?f:e+1;var g=a[b];f=a[f];var h=g.plotX;g=g.plotY;var k=
                f.plotX;var l=f.plotY;f=a[e].plotX;e=a[e].plotY;h=(1.5*f+h)/2.5;g=(1.5*e+g)/2.5;k=(1.5*f+k)/2.5;var n=(1.5*e+l)/2.5;l=Math.sqrt(Math.pow(h-f,2)+Math.pow(g-e,2));var m=Math.sqrt(Math.pow(k-f,2)+Math.pow(n-e,2));h=Math.atan2(g-e,h-f);n=Math.PI/2+(h+Math.atan2(n-e,k-f))/2;Math.abs(h-n)>Math.PI/2&&(n-=Math.PI);h=f+Math.cos(n)*l;g=e+Math.sin(n)*l;k=f+Math.cos(Math.PI+n)*m;n=e+Math.sin(Math.PI+n)*m;f={rightContX:k,rightContY:n,leftContX:h,leftContY:g,plotX:f,plotY:e};c&&(f.prevPointCont=this.getConnectors(a,
                b,!1,d));return f};D.toXY=function(a){var b=this.chart,c=this.xAxis,d=this.yAxis,e=a.plotX,g=a.plotY,h=a.series,k=b.inverted,l=a.y,m=k?e:d.len-g;k&&h&&!h.isRadialBar&&(a.plotY=g="number"===typeof l?d.translate(l)||0:0);a.rectPlotX=e;a.rectPlotY=g;d.center&&(m+=d.center[3]/2);p(g)&&(d=k?d.postTranslate(g,m):c.postTranslate(e,m),a.plotX=a.polarPlotX=d.x-b.plotLeft,a.plotY=a.polarPlotY=d.y-b.plotTop);this.kdByAngle?(b=(e/Math.PI*180+c.pane.options.startAngle)%360,0>b&&(b+=360),a.clientX=b):a.clientX=
                a.plotX};m.spline&&(e(m.spline.prototype,"getPointSpline",function(a,b,c,d){this.chart.polar?d?(a=this.getConnectors(b,d,!0,this.connectEnds),b=a.prevPointCont&&a.prevPointCont.rightContX,c=a.prevPointCont&&a.prevPointCont.rightContY,a=["C",p(b)?b:a.plotX,p(c)?c:a.plotY,p(a.leftContX)?a.leftContX:a.plotX,p(a.leftContY)?a.leftContY:a.plotY,a.plotX,a.plotY]):a=["M",c.plotX,c.plotY]:a=a.call(this,b,c,d);return a}),m.areasplinerange&&(m.areasplinerange.prototype.getPointSpline=m.spline.prototype.getPointSpline));
            b(t,"afterTranslate",function(){var a=this.chart;if(a.polar&&this.xAxis){(this.kdByAngle=a.tooltip&&a.tooltip.shared)?this.searchPoint=this.searchPointByAngle:this.options.findNearestPointBy="xy";if(!this.preventPostTranslate)for(var c=this.points,d=c.length;d--;)this.toXY(c[d]),!a.hasParallelCoordinates&&!this.yAxis.reversed&&c[d].y<this.yAxis.min&&(c[d].isNull=!0);this.hasClipCircleSetter||(this.hasClipCircleSetter=!!this.eventsToUnbind.push(b(this,"afterRender",function(){if(a.polar){var b=this.yAxis.pane.center;
                this.clipCircle?this.clipCircle.animate({x:b[0],y:b[1],r:b[2]/2,innerR:b[3]/2}):this.clipCircle=a.renderer.clipCircle(b[0],b[1],b[2]/2,b[3]/2);this.group.clip(this.clipCircle);this.setClip=h.noop}})))}},{order:2});e(m.line.prototype,"getGraphPath",function(a,b){var c=this,d;if(this.chart.polar){b=b||this.points;for(d=0;d<b.length;d++)if(!b[d].isNull){var e=d;break}if(!1!==this.options.connectEnds&&"undefined"!==typeof e){this.connectEnds=!0;b.splice(b.length,0,b[e]);var f=!0}b.forEach(function(a){"undefined"===
            typeof a.polarPlotY&&c.toXY(a)})}d=a.apply(this,[].slice.call(arguments,1));f&&b.pop();return d});var y=function(a,b){var c=this,d=this.chart,e=this.options.animation,f=this.group,g=this.markerGroup,k=this.xAxis.center,l=d.plotLeft,m=d.plotTop,p,q,r,t;if(d.polar)if(c.isRadialBar)b||(c.startAngleRad=v(c.translatedThreshold,c.xAxis.startAngleRad),h.seriesTypes.pie.prototype.animate.call(c,b));else{if(d.renderer.isSVG)if(e=x(e),c.is("column")){if(!b){var y=k[3]/2;c.points.forEach(function(a){p=a.graphic;
                r=(q=a.shapeArgs)&&q.r;t=q&&q.innerR;p&&q&&(p.attr({r:y,innerR:y}),p.animate({r:r,innerR:t},c.options.animation))})}}else b?(a={translateX:k[0]+l,translateY:k[1]+m,scaleX:.001,scaleY:.001},f.attr(a),g&&g.attr(a)):(a={translateX:l,translateY:m,scaleX:1,scaleY:1},f.animate(a,e),g&&g.animate(a,e))}else a.call(this,b)};e(D,"animate",y);if(m.column){var I=m.arearange.prototype;m=m.column.prototype;m.polarArc=function(a,b,c,d){var e=this.xAxis.center,f=this.yAxis.len,g=e[3]/2;b=f-b+g;a=f-v(a,f)+g;this.yAxis.reversed&&
            (0>b&&(b=g),0>a&&(a=g));return{x:e[0],y:e[1],r:b,innerR:a,start:c,end:d}};e(m,"animate",y);e(m,"translate",function(a){var b=this.options,c=b.stacking,d=this.chart,e=this.xAxis,g=this.yAxis,h=g.reversed,k=g.center,l=e.startAngleRad,m=e.endAngleRad-l;this.preventPostTranslate=!0;a.call(this);if(e.isRadial){a=this.points;e=a.length;var t=g.translate(g.min);var v=g.translate(g.max);b=b.threshold||0;if(d.inverted&&p(b)){var x=g.translate(b);q(x)&&(0>x?x=0:x>m&&(x=m),this.translatedThreshold=x+l)}for(;e--;){b=
                a[e];var y=b.barX;var z=b.x;var B=b.y;b.shapeType="arc";if(d.inverted){b.plotY=g.translate(B);if(c&&g.stacking){if(B=g.stacking.stacks[(0>B?"-":"")+this.stackKey],this.visible&&B&&B[z]&&!b.isNull){var D=B[z].points[this.getStackIndicator(void 0,z,this.index).key];var E=g.translate(D[0]);D=g.translate(D[1]);q(E)&&(E=r.clamp(E,0,m))}}else E=x,D=b.plotY;E>D&&(D=[E,E=D][0]);if(!h)if(E<t)E=t;else if(D>v)D=v;else{if(D<t||E>v)E=D=0}else if(D>t)D=t;else if(E<v)E=v;else if(E>t||D<v)E=D=m;g.min>g.max&&(E=D=
                h?m:0);E+=l;D+=l;k&&(b.barX=y+=k[3]/2);z=Math.max(y,0);B=Math.max(y+b.pointWidth,0);b.shapeArgs={x:k&&k[0],y:k&&k[1],r:B,innerR:z,start:E,end:D};b.opacity=E===D?0:void 0;b.plotY=(q(this.translatedThreshold)&&(E<this.translatedThreshold?E:D))-l}else E=y+l,b.shapeArgs=this.polarArc(b.yBottom,b.plotY,E,E+b.pointWidth);this.toXY(b);d.inverted?(y=g.postTranslate(b.rectPlotY,y+b.pointWidth/2),b.tooltipPos=[y.x-d.plotLeft,y.y-d.plotTop]):b.tooltipPos=[b.plotX,b.plotY];k&&(b.ttBelow=b.plotY>k[1])}}});m.findAlignments=
                function(a,b){null===b.align&&(b.align=20<a&&160>a?"left":200<a&&340>a?"right":"center");null===b.verticalAlign&&(b.verticalAlign=45>a||315<a?"bottom":135<a&&225>a?"top":"middle");return b};I&&(I.findAlignments=m.findAlignments);e(m,"alignDataLabel",function(a,b,c,d,e,h){var f=this.chart,g=v(d.inside,!!this.options.stacking);f.polar?(a=b.rectPlotX/Math.PI*180,f.inverted?(this.forceDL=f.isInsidePlot(b.plotX,Math.round(b.plotY)),g&&b.shapeArgs?(e=b.shapeArgs,e=this.yAxis.postTranslate(((e.start||0)+
                (e.end||0))/2-this.xAxis.startAngleRad,b.barX+b.pointWidth/2),e={x:e.x-f.plotLeft,y:e.y-f.plotTop}):b.tooltipPos&&(e={x:b.tooltipPos[0],y:b.tooltipPos[1]}),d.align=v(d.align,"center"),d.verticalAlign=v(d.verticalAlign,"middle")):this.findAlignments&&(d=this.findAlignments(a,d)),D.alignDataLabel.call(this,b,c,d,e,h),this.isRadialBar&&b.shapeArgs&&b.shapeArgs.start===b.shapeArgs.end&&c.hide(!0)):a.call(this,b,c,d,e,h)})}e(a,"getCoordinates",function(a,b){var c=this.chart,d={xAxis:[],yAxis:[]};c.polar?
                c.axes.forEach(function(a){var e=a.isXAxis,f=a.center;if("colorAxis"!==a.coll){var g=b.chartX-f[0]-c.plotLeft;f=b.chartY-f[1]-c.plotTop;d[e?"xAxis":"yAxis"].push({axis:a,value:a.translate(e?Math.PI-Math.atan2(g,f):Math.sqrt(Math.pow(g,2)+Math.pow(f,2)),!0)})}}):d=a.call(this,b);return d});l.prototype.clipCircle=function(a,b,c,d){var e=H(),f=this.createElement("clipPath").attr({id:e}).add(this.defs);a=d?this.arc(a,b,c,d,0,2*Math.PI).add(f):this.circle(a,b,c).add(f);a.id=e;a.clipPath=f;return a};b(d,
                "getAxes",function(){this.pane||(this.pane=[]);this.options.pane=z(this.options.pane);this.options.pane.forEach(function(a){new c(a,this)},this)});b(d,"afterDrawChartBox",function(){this.pane.forEach(function(a){a.render()})});b(t,"afterInit",function(){var a=this.chart;a.inverted&&a.polar&&(this.isRadialSeries=!0,this.is("column")&&(this.isRadialBar=!0))});e(d.prototype,"get",function(a,b){return k(this.pane||[],function(a){return a.options.id===b})||a.call(this,b)})});z(e,"masters/highcharts-more.src.js",
            [e["Core/Globals.js"],e["Core/Axis/RadialAxis.js"],e["Series/Bubble/BubbleSeries.js"]],function(e,d,h){d.compose(e.Axis,e.Tick);h.compose(e.Chart,e.Legend,e.Series)})});
    //# sourceMappingURL=highcharts-more.js.map
</script>
{{--highchart-accessibility--}}
<script>
    /*
 Highcharts JS v9.1.2 (2021-06-16)

 Accessibility module

 (c) 2010-2021 Highsoft AS
 Author: Oystein Moseng

 License: www.highcharts.com/license
*/
    'use strict';
    (function (b) {
        "object" === typeof module && module.exports ? (b["default"] = b, module.exports = b) : "function" === typeof define && define.amd ? define("highcharts/modules/accessibility", ["highcharts"], function (v) {
            b(v);
            b.Highcharts = v;
            return b
        }) : b("undefined" !== typeof Highcharts ? Highcharts : void 0)
    })(function (b) {
        function v(b, e, r, p) {
            b.hasOwnProperty(e) || (b[e] = p.apply(null, r))
        }

        b = b ? b._modules : {};
        v(b, "Accessibility/Utils/HTMLUtilities.js", [b["Core/Globals.js"], b["Core/Utilities.js"]], function (b, e) {
            var w = b.doc,
                p = b.win, u = e.merge;
            return {
                addClass: function (b, l) {
                    b.classList ? b.classList.add(l) : 0 > b.className.indexOf(l) && (b.className += l)
                }, escapeStringForHTML: function (b) {
                    return b.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#x27;").replace(/\//g, "&#x2F;")
                }, getElement: function (b) {
                    return w.getElementById(b)
                }, getFakeMouseEvent: function (b) {
                    if ("function" === typeof p.MouseEvent) return new p.MouseEvent(b);
                    if (w.createEvent) {
                        var t = w.createEvent("MouseEvent");
                        if (t.initMouseEvent) return t.initMouseEvent(b,
                            !0, !0, p, "click" === b ? 1 : 0, 0, 0, 0, 0, !1, !1, !1, !1, 0, null), t
                    }
                    return {type: b}
                }, getHeadingTagNameForElement: function (b) {
                    var t = function (b) {
                        b = parseInt(b.slice(1), 10);
                        return "h" + Math.min(6, b + 1)
                    }, m = function (b) {
                        var h;
                        a:{
                            for (h = b; h = h.previousSibling;) {
                                var g = h.tagName || "";
                                if (/H[1-6]/.test(g)) {
                                    h = g;
                                    break a
                                }
                            }
                            h = ""
                        }
                        if (h) return t(h);
                        b = b.parentElement;
                        if (!b) return "p";
                        h = b.tagName;
                        return /H[1-6]/.test(h) ? t(h) : m(b)
                    };
                    return m(b)
                }, removeElement: function (b) {
                    b && b.parentNode && b.parentNode.removeChild(b)
                }, reverseChildNodes: function (b) {
                    for (var t =
                        b.childNodes.length; t--;) b.appendChild(b.childNodes[t])
                }, setElAttrs: function (b, e) {
                    Object.keys(e).forEach(function (m) {
                        var h = e[m];
                        null === h ? b.removeAttribute(m) : b.setAttribute(m, h)
                    })
                }, stripHTMLTagsFromString: function (b) {
                    return "string" === typeof b ? b.replace(/<\/?[^>]+(>|$)/g, "") : b
                }, visuallyHideElement: function (b) {
                    u(!0, b.style, {
                        position: "absolute", width: "1px", height: "1px", overflow: "hidden", whiteSpace: "nowrap", clip: "rect(1px, 1px, 1px, 1px)", marginTop: "-3px", "-ms-filter": "progid:DXImageTransform.Microsoft.Alpha(Opacity=1)",
                        filter: "alpha(opacity=1)", opacity: "0.01"
                    })
                }
            }
        });
        v(b, "Accessibility/Utils/ChartUtilities.js", [b["Accessibility/Utils/HTMLUtilities.js"], b["Core/Utilities.js"]], function (b, e) {
            function w(a) {
                var c = a.chart, d = {}, f = "Seconds";
                d.Seconds = ((a.max || 0) - (a.min || 0)) / 1E3;
                d.Minutes = d.Seconds / 60;
                d.Hours = d.Minutes / 60;
                d.Days = d.Hours / 24;
                ["Minutes", "Hours", "Days"].forEach(function (a) {
                    2 < d[a] && (f = a)
                });
                var n = d[f].toFixed("Seconds" !== f && "Minutes" !== f ? 1 : 0);
                return c.langFormat("accessibility.axis.timeRange" + f, {
                    chart: c, axis: a,
                    range: n.replace(".0", "")
                })
            }

            function p(a) {
                var c = a.chart, d = c.options && c.options.accessibility && c.options.accessibility.screenReaderSection.axisRangeDateFormat || "", f = function (f) {
                    return a.dateTime ? c.time.dateFormat(d, a[f]) : a[f]
                };
                return c.langFormat("accessibility.axis.rangeFromTo", {chart: c, axis: a, rangeFrom: f("min"), rangeTo: f("max")})
            }

            function u(a) {
                if (a.points && a.points.length) return (a = q(a.points, function (a) {
                    return !!a.graphic
                })) && a.graphic && a.graphic.element
            }

            function t(a) {
                var c = u(a);
                return c && c.parentNode ||
                    a.graph && a.graph.element || a.group && a.group.element
            }

            function l(a, c) {
                c.setAttribute("aria-hidden", !1);
                c !== a.renderTo && c.parentNode && (Array.prototype.forEach.call(c.parentNode.childNodes, function (a) {
                    a.hasAttribute("aria-hidden") || a.setAttribute("aria-hidden", !0)
                }), l(a, c.parentNode))
            }

            var m = b.stripHTMLTagsFromString, h = e.defined, q = e.find, g = e.fireEvent;
            return {
                getChartTitle: function (a) {
                    return m(a.options.title.text || a.langFormat("accessibility.defaultChartTitle", {chart: a}))
                }, getAxisDescription: function (a) {
                    return a &&
                        (a.userOptions && a.userOptions.accessibility && a.userOptions.accessibility.description || a.axisTitle && a.axisTitle.textStr || a.options.id || a.categories && "categories" || a.dateTime && "Time" || "values")
                }, getAxisRangeDescription: function (a) {
                    var c = a.options || {};
                    return c.accessibility && "undefined" !== typeof c.accessibility.rangeDescription ? c.accessibility.rangeDescription : a.categories ? (c = a.chart, a = a.dataMax && a.dataMin ? c.langFormat("accessibility.axis.rangeCategories", {
                        chart: c, axis: a, numCategories: a.dataMax - a.dataMin +
                            1
                    }) : "", a) : !a.dateTime || 0 !== a.min && 0 !== a.dataMin ? p(a) : w(a)
                }, getPointFromXY: function (a, c, d) {
                    for (var f = a.length, n; f--;) if (n = q(a[f].points || [], function (a) {
                        return a.x === c && a.y === d
                    })) return n
                }, getSeriesFirstPointElement: u, getSeriesFromName: function (a, c) {
                    return c ? (a.series || []).filter(function (a) {
                        return a.name === c
                    }) : a.series
                }, getSeriesA11yElement: t, unhideChartElementFromAT: l, hideSeriesFromAT: function (a) {
                    (a = t(a)) && a.setAttribute("aria-hidden", !0)
                }, scrollToPoint: function (a) {
                    var c = a.series.xAxis, d = a.series.yAxis,
                        f = c && c.scrollbar ? c : d;
                    if ((c = f && f.scrollbar) && h(c.to) && h(c.from)) {
                        d = c.to - c.from;
                        if (h(f.dataMin) && h(f.dataMax)) {
                            var n = f.toPixels(f.dataMin), b = f.toPixels(f.dataMax);
                            a = (f.toPixels(a["xAxis" === f.coll ? "x" : "y"] || 0) - n) / (b - n)
                        } else a = 0;
                        c.updatePosition(a - d / 2, a + d / 2);
                        g(c, "changed", {from: c.from, to: c.to, trigger: "scrollbar", DOMEvent: null})
                    }
                }
            }
        });
        v(b, "Accessibility/KeyboardNavigationHandler.js", [b["Core/Utilities.js"]], function (b) {
            function e(b, e) {
                this.chart = b;
                this.keyCodeMap = e.keyCodeMap || [];
                this.validate = e.validate;
                this.init = e.init;
                this.terminate = e.terminate;
                this.response = {success: 1, prev: 2, next: 3, noHandler: 4, fail: 5}
            }

            var w = b.find;
            e.prototype = {
                run: function (b) {
                    var e = b.which || b.keyCode, t = this.response.noHandler, l = w(this.keyCodeMap, function (b) {
                        return -1 < b[0].indexOf(e)
                    });
                    l ? t = l[1].call(this, e, b) : 9 === e && (t = this.response[b.shiftKey ? "prev" : "next"]);
                    return t
                }
            };
            return e
        });
        v(b, "Accessibility/Utils/DOMElementProvider.js", [b["Core/Globals.js"], b["Accessibility/Utils/HTMLUtilities.js"], b["Core/Utilities.js"]], function (b, e,
                                                                                                                                                               r) {
            var w = b.doc, u = e.removeElement;
            b = r.extend;
            e = function () {
                this.elements = []
            };
            b(e.prototype, {
                createElement: function () {
                    var b = w.createElement.apply(w, arguments);
                    this.elements.push(b);
                    return b
                }, destroyCreatedElements: function () {
                    this.elements.forEach(function (b) {
                        u(b)
                    });
                    this.elements = []
                }
            });
            return e
        });
        v(b, "Accessibility/Utils/EventProvider.js", [b["Core/Globals.js"], b["Core/Utilities.js"]], function (b, e) {
            var w = e.addEvent;
            e = e.extend;
            var p = function () {
                this.eventRemovers = []
            };
            e(p.prototype, {
                addEvent: function () {
                    var e =
                        w.apply(b, arguments);
                    this.eventRemovers.push(e);
                    return e
                }, removeAddedEvents: function () {
                    this.eventRemovers.forEach(function (b) {
                        b()
                    });
                    this.eventRemovers = []
                }
            });
            return p
        });
        v(b, "Accessibility/AccessibilityComponent.js", [b["Accessibility/Utils/ChartUtilities.js"], b["Accessibility/Utils/DOMElementProvider.js"], b["Accessibility/Utils/EventProvider.js"], b["Core/Globals.js"], b["Accessibility/Utils/HTMLUtilities.js"], b["Core/Utilities.js"]], function (b, e, r, p, u, t) {
            function l() {
            }

            var m = b.unhideChartElementFromAT,
                h = p.doc, q = p.win, g = u.removeElement, a = u.getFakeMouseEvent;
            b = t.extend;
            var c = t.fireEvent, d = t.merge;
            l.prototype = {
                initBase: function (a) {
                    this.chart = a;
                    this.eventProvider = new r;
                    this.domElementProvider = new e;
                    this.keyCodes = {left: 37, right: 39, up: 38, down: 40, enter: 13, space: 32, esc: 27, tab: 9}
                }, addEvent: function () {
                    return this.eventProvider.addEvent.apply(this.eventProvider, arguments)
                }, createElement: function () {
                    return this.domElementProvider.createElement.apply(this.domElementProvider, arguments)
                }, fireEventOnWrappedOrUnwrappedElement: function (a,
                                                                   n) {
                    var f = n.type;
                    h.createEvent && (a.dispatchEvent || a.fireEvent) ? a.dispatchEvent ? a.dispatchEvent(n) : a.fireEvent(f, n) : c(a, f, n)
                }, fakeClickEvent: function (c) {
                    if (c) {
                        var f = a("click");
                        this.fireEventOnWrappedOrUnwrappedElement(c, f)
                    }
                }, addProxyGroup: function (a) {
                    this.createOrUpdateProxyContainer();
                    var c = this.createElement("div");
                    Object.keys(a || {}).forEach(function (f) {
                        null !== a[f] && c.setAttribute(f, a[f])
                    });
                    this.chart.a11yProxyContainer.appendChild(c);
                    return c
                }, createOrUpdateProxyContainer: function () {
                    var a = this.chart,
                        c = a.renderer.box;
                    a.a11yProxyContainer = a.a11yProxyContainer || this.createProxyContainerElement();
                    c.nextSibling !== a.a11yProxyContainer && a.container.insertBefore(a.a11yProxyContainer, c.nextSibling)
                }, createProxyContainerElement: function () {
                    var a = h.createElement("div");
                    a.className = "highcharts-a11y-proxy-container";
                    return a
                }, createProxyButton: function (a, c, b, g, h) {
                    var f = a.element, n = this.createElement("button"), E = d({"aria-label": f.getAttribute("aria-label")}, b);
                    Object.keys(E).forEach(function (a) {
                        null !== E[a] &&
                        n.setAttribute(a, E[a])
                    });
                    n.className = "highcharts-a11y-proxy-button";
                    a.hasClass("highcharts-no-tooltip") && (n.className += " highcharts-no-tooltip");
                    h && this.addEvent(n, "click", h);
                    this.setProxyButtonStyle(n);
                    this.updateProxyButtonPosition(n, g || a);
                    this.proxyMouseEventsForButton(f, n);
                    c.appendChild(n);
                    E["aria-hidden"] || m(this.chart, n);
                    return n
                }, getElementPosition: function (a) {
                    var c = a.element;
                    return (a = this.chart.renderTo) && c && c.getBoundingClientRect ? (c = c.getBoundingClientRect(), a = a.getBoundingClientRect(),
                        {x: c.left - a.left, y: c.top - a.top, width: c.right - c.left, height: c.bottom - c.top}) : {x: 0, y: 0, width: 1, height: 1}
                }, setProxyButtonStyle: function (a) {
                    d(!0, a.style, {borderWidth: "0", backgroundColor: "transparent", cursor: "pointer", outline: "none", opacity: "0.001", filter: "alpha(opacity=1)", zIndex: "999", overflow: "hidden", padding: "0", margin: "0", display: "block", position: "absolute"});
                    a.style["-ms-filter"] = "progid:DXImageTransform.Microsoft.Alpha(Opacity=1)"
                }, updateProxyButtonPosition: function (a, c) {
                    c = this.getElementPosition(c);
                    d(!0, a.style, {width: (c.width || 1) + "px", height: (c.height || 1) + "px", left: (Math.round(c.x) || 0) + "px", top: (Math.round(c.y) || 0) + "px"})
                }, proxyMouseEventsForButton: function (a, c) {
                    var b = this;
                    "click touchstart touchend touchcancel touchmove mouseover mouseenter mouseleave mouseout".split(" ").forEach(function (n) {
                        var f = 0 === n.indexOf("touch");
                        b.addEvent(c, n, function (c) {
                            var d = f ? b.cloneTouchEvent(c) : b.cloneMouseEvent(c);
                            a && b.fireEventOnWrappedOrUnwrappedElement(a, d);
                            c.stopPropagation();
                            "touchstart" !== n && "touchmove" !==
                            n && "touchend" !== n && c.preventDefault()
                        }, {passive: !1})
                    })
                }, cloneMouseEvent: function (c) {
                    if ("function" === typeof q.MouseEvent) return new q.MouseEvent(c.type, c);
                    if (h.createEvent) {
                        var b = h.createEvent("MouseEvent");
                        if (b.initMouseEvent) return b.initMouseEvent(c.type, c.bubbles, c.cancelable, c.view || q, c.detail, c.screenX, c.screenY, c.clientX, c.clientY, c.ctrlKey, c.altKey, c.shiftKey, c.metaKey, c.button, c.relatedTarget), b
                    }
                    return a(c.type)
                }, cloneTouchEvent: function (a) {
                    var c = function (a) {
                        for (var c = [], b = 0; b < a.length; ++b) {
                            var d =
                                a.item(b);
                            d && c.push(d)
                        }
                        return c
                    };
                    if ("function" === typeof q.TouchEvent) return c = new q.TouchEvent(a.type, {
                        touches: c(a.touches),
                        targetTouches: c(a.targetTouches),
                        changedTouches: c(a.changedTouches),
                        ctrlKey: a.ctrlKey,
                        shiftKey: a.shiftKey,
                        altKey: a.altKey,
                        metaKey: a.metaKey,
                        bubbles: a.bubbles,
                        cancelable: a.cancelable,
                        composed: a.composed,
                        detail: a.detail,
                        view: a.view
                    }), a.defaultPrevented && c.preventDefault(), c;
                    c = this.cloneMouseEvent(a);
                    c.touches = a.touches;
                    c.changedTouches = a.changedTouches;
                    c.targetTouches = a.targetTouches;
                    return c
                }, destroyBase: function () {
                    g(this.chart.a11yProxyContainer);
                    this.domElementProvider.destroyCreatedElements();
                    this.eventProvider.removeAddedEvents()
                }
            };
            b(l.prototype, {
                init: function () {
                }, getKeyboardNavigation: function () {
                }, onChartUpdate: function () {
                }, onChartRender: function () {
                }, destroy: function () {
                }
            });
            return l
        });
        v(b, "Accessibility/KeyboardNavigation.js", [b["Core/Chart/Chart.js"], b["Core/Globals.js"], b["Core/Utilities.js"], b["Accessibility/Utils/HTMLUtilities.js"], b["Accessibility/Utils/EventProvider.js"]],
            function (b, e, r, p, u) {
                function t(a, c) {
                    this.init(a, c)
                }

                var l = e.doc, m = e.win, h = r.addEvent, q = r.fireEvent, g = p.getElement;
                h(l, "keydown", function (a) {
                    27 === (a.which || a.keyCode) && e.charts && e.charts.forEach(function (a) {
                        a && a.dismissPopupContent && a.dismissPopupContent()
                    })
                });
                b.prototype.dismissPopupContent = function () {
                    var a = this;
                    q(this, "dismissPopupContent", {}, function () {
                        a.tooltip && a.tooltip.hide(0);
                        a.hideExportMenu()
                    })
                };
                t.prototype = {
                    init: function (a, c) {
                        var b = this, g = this.eventProvider = new u;
                        this.chart = a;
                        this.components =
                            c;
                        this.modules = [];
                        this.currentModuleIx = 0;
                        this.update();
                        g.addEvent(this.tabindexContainer, "keydown", function (a) {
                            return b.onKeydown(a)
                        });
                        g.addEvent(this.tabindexContainer, "focus", function (a) {
                            return b.onFocus(a)
                        });
                        ["mouseup", "touchend"].forEach(function (a) {
                            return g.addEvent(l, a, function () {
                                return b.onMouseUp()
                            })
                        });
                        ["mousedown", "touchstart"].forEach(function (c) {
                            return g.addEvent(a.renderTo, c, function () {
                                b.isClickingChart = !0
                            })
                        });
                        g.addEvent(a.renderTo, "mouseover", function () {
                            b.pointerIsOverChart = !0
                        });
                        g.addEvent(a.renderTo,
                            "mouseout", function () {
                                b.pointerIsOverChart = !1
                            });
                        this.modules.length && this.modules[0].init(1)
                    }, update: function (a) {
                        var c = this.chart.options.accessibility;
                        c = c && c.keyboardNavigation;
                        var b = this.components;
                        this.updateContainerTabindex();
                        c && c.enabled && a && a.length ? (this.modules = a.reduce(function (a, c) {
                            c = b[c].getKeyboardNavigation();
                            return a.concat(c)
                        }, []), this.updateExitAnchor()) : (this.modules = [], this.currentModuleIx = 0, this.removeExitAnchor())
                    }, onFocus: function (a) {
                        var c = this.chart;
                        a = a.relatedTarget && c.container.contains(a.relatedTarget);
                        this.exiting || this.tabbingInBackwards || this.isClickingChart || a || !this.modules[0] || this.modules[0].init(1);
                        this.exiting = !1
                    }, onMouseUp: function () {
                        delete this.isClickingChart;
                        if (!this.keyboardReset && !this.pointerIsOverChart) {
                            var a = this.chart, c = this.modules && this.modules[this.currentModuleIx || 0];
                            c && c.terminate && c.terminate();
                            a.focusElement && a.focusElement.removeFocusBorder();
                            this.currentModuleIx = 0;
                            this.keyboardReset = !0
                        }
                    }, onKeydown: function (a) {
                        a = a || m.event;
                        var c, b = this.modules && this.modules.length && this.modules[this.currentModuleIx];
                        this.exiting = this.keyboardReset = !1;
                        if (b) {
                            var g = b.run(a);
                            g === b.response.success ? c = !0 : g === b.response.prev ? c = this.prev() : g === b.response.next && (c = this.next());
                            c && (a.preventDefault(), a.stopPropagation())
                        }
                    }, prev: function () {
                        return this.move(-1)
                    }, next: function () {
                        return this.move(1)
                    }, move: function (a) {
                        var c = this.modules && this.modules[this.currentModuleIx];
                        c && c.terminate && c.terminate(a);
                        this.chart.focusElement && this.chart.focusElement.removeFocusBorder();
                        this.currentModuleIx += a;
                        if (c = this.modules && this.modules[this.currentModuleIx]) {
                            if (c.validate &&
                                !c.validate()) return this.move(a);
                            if (c.init) return c.init(a), !0
                        }
                        this.currentModuleIx = 0;
                        this.exiting = !0;
                        0 < a ? this.exitAnchor.focus() : this.tabindexContainer.focus();
                        return !1
                    }, updateExitAnchor: function () {
                        var a = g("highcharts-end-of-chart-marker-" + this.chart.index);
                        this.removeExitAnchor();
                        a ? (this.makeElementAnExitAnchor(a), this.exitAnchor = a) : this.createExitAnchor()
                    }, updateContainerTabindex: function () {
                        var a = this.chart.options.accessibility;
                        a = a && a.keyboardNavigation;
                        a = !(a && !1 === a.enabled);
                        var c = this.chart,
                            b = c.container;
                        c.renderTo.hasAttribute("tabindex") && (b.removeAttribute("tabindex"), b = c.renderTo);
                        this.tabindexContainer = b;
                        var g = b.getAttribute("tabindex");
                        a && !g ? b.setAttribute("tabindex", "0") : a || c.container.removeAttribute("tabindex")
                    }, makeElementAnExitAnchor: function (a) {
                        var c = this.tabindexContainer.getAttribute("tabindex") || 0;
                        a.setAttribute("class", "highcharts-exit-anchor");
                        a.setAttribute("tabindex", c);
                        a.setAttribute("aria-hidden", !1);
                        this.addExitAnchorEventsToEl(a)
                    }, createExitAnchor: function () {
                        var a =
                            this.chart, c = this.exitAnchor = l.createElement("div");
                        a.renderTo.appendChild(c);
                        this.makeElementAnExitAnchor(c)
                    }, removeExitAnchor: function () {
                        this.exitAnchor && this.exitAnchor.parentNode && (this.exitAnchor.parentNode.removeChild(this.exitAnchor), delete this.exitAnchor)
                    }, addExitAnchorEventsToEl: function (a) {
                        var c = this.chart, b = this;
                        this.eventProvider.addEvent(a, "focus", function (a) {
                            a = a || m.event;
                            a.relatedTarget && c.container.contains(a.relatedTarget) || b.exiting ? b.exiting = !1 : (b.tabbingInBackwards = !0, b.tabindexContainer.focus(),
                                delete b.tabbingInBackwards, a.preventDefault(), b.modules && b.modules.length && (b.currentModuleIx = b.modules.length - 1, (a = b.modules[b.currentModuleIx]) && a.validate && !a.validate() ? b.prev() : a && a.init(-1)))
                        })
                    }, destroy: function () {
                        this.removeExitAnchor();
                        this.eventProvider.removeAddedEvents();
                        this.chart.container.removeAttribute("tabindex")
                    }
                };
                return t
            });
        v(b, "Accessibility/Components/LegendComponent.js", [b["Core/Chart/Chart.js"], b["Core/Globals.js"], b["Core/Legend.js"], b["Core/Utilities.js"], b["Accessibility/AccessibilityComponent.js"],
            b["Accessibility/KeyboardNavigationHandler.js"], b["Accessibility/Utils/HTMLUtilities.js"]], function (b, e, r, p, u, t, l) {
            function m(a) {
                var c = a.legend && a.legend.allItems, b = a.options.legend.accessibility || {};
                return !(!c || !c.length || a.colorAxis && a.colorAxis.length || !1 === b.enabled)
            }

            var h = p.addEvent, q = p.extend, g = p.find, a = p.fireEvent, c = p.isNumber, d = l.removeElement, f = l.stripHTMLTagsFromString;
            b.prototype.highlightLegendItem = function (b) {
                var g = this.legend.allItems, d = this.accessibility && this.accessibility.components.legend.highlightedLegendItemIx;
                if (g[b]) {
                    c(d) && g[d] && a(g[d].legendGroup.element, "mouseout");
                    d = this.legend;
                    var n = d.allItems[b].pageIx, f = d.currentPage;
                    "undefined" !== typeof n && n + 1 !== f && d.scroll(1 + n - f);
                    this.setFocusToElement(g[b].legendItem, g[b].a11yProxyElement);
                    a(g[b].legendGroup.element, "mouseover");
                    return !0
                }
                return !1
            };
            h(r, "afterColorizeItem", function (a) {
                var c = a.item;
                this.chart.options.accessibility.enabled && c && c.a11yProxyElement && c.a11yProxyElement.setAttribute("aria-pressed", a.visible ? "true" : "false")
            });
            b = function () {
            };
            b.prototype =
                new u;
            q(b.prototype, {
                init: function () {
                    var a = this;
                    this.proxyElementsList = [];
                    this.recreateProxies();
                    this.addEvent(r, "afterScroll", function () {
                        this.chart === a.chart && (a.updateProxiesPositions(), a.updateLegendItemProxyVisibility(), this.chart.highlightLegendItem(a.highlightedLegendItemIx))
                    });
                    this.addEvent(r, "afterPositionItem", function (c) {
                        this.chart === a.chart && this.chart.renderer && a.updateProxyPositionForItem(c.item)
                    })
                }, updateLegendItemProxyVisibility: function () {
                    var a = this.chart.legend, c = a.currentPage || 1,
                        b = a.clipHeight || 0;
                    (a.allItems || []).forEach(function (g) {
                        var d = g.pageIx || 0, n = g._legendItemPos ? g._legendItemPos[1] : 0, f = g.legendItem ? Math.round(g.legendItem.getBBox().height) : 0;
                        d = n + f - a.pages[d] > b || d !== c - 1;
                        g.a11yProxyElement && (g.a11yProxyElement.style.visibility = d ? "hidden" : "visible")
                    })
                }, onChartRender: function () {
                    m(this.chart) ? this.updateProxiesPositions() : this.removeProxies()
                }, onChartUpdate: function () {
                    this.updateLegendTitle()
                }, updateProxiesPositions: function () {
                    for (var a = 0, c = this.proxyElementsList; a < c.length; a++) {
                        var b =
                            c[a];
                        this.updateProxyButtonPosition(b.element, b.posElement)
                    }
                }, updateProxyPositionForItem: function (a) {
                    var c = g(this.proxyElementsList, function (c) {
                        return c.item === a
                    });
                    c && this.updateProxyButtonPosition(c.element, c.posElement)
                }, recreateProxies: function () {
                    this.removeProxies();
                    m(this.chart) && (this.addLegendProxyGroup(), this.addLegendListContainer(), this.proxyLegendItems(), this.updateLegendItemProxyVisibility())
                }, removeProxies: function () {
                    d(this.legendProxyGroup);
                    this.proxyElementsList = []
                }, updateLegendTitle: function () {
                    var a =
                        this.chart, c = f((a.legend && a.legend.options.title && a.legend.options.title.text || "").replace(/<br ?\/?>/g, " "));
                    a = a.langFormat("accessibility.legend.legendLabel" + (c ? "" : "NoTitle"), {chart: a, legendTitle: c});
                    this.legendProxyGroup && this.legendProxyGroup.setAttribute("aria-label", a)
                }, addLegendProxyGroup: function () {
                    this.legendProxyGroup = this.addProxyGroup({"aria-label": "_placeholder_", role: "all" === this.chart.options.accessibility.landmarkVerbosity ? "region" : null})
                }, addLegendListContainer: function () {
                    if (this.legendProxyGroup) {
                        var a =
                            this.legendListContainer = this.createElement("ul");
                        a.style.listStyle = "none";
                        this.legendProxyGroup.appendChild(a)
                    }
                }, proxyLegendItems: function () {
                    var a = this;
                    (this.chart.legend && this.chart.legend.allItems || []).forEach(function (c) {
                        c.legendItem && c.legendItem.element && a.proxyLegendItem(c)
                    })
                }, proxyLegendItem: function (a) {
                    if (a.legendItem && a.legendGroup && this.legendListContainer) {
                        var c = this.chart.langFormat("accessibility.legend.legendItem", {chart: this.chart, itemName: f(a.name), item: a});
                        c = {
                            tabindex: -1, "aria-pressed": a.visible,
                            "aria-label": c
                        };
                        var b = a.legendGroup.div ? a.legendItem : a.legendGroup, g = this.createElement("li");
                        this.legendListContainer.appendChild(g);
                        a.a11yProxyElement = this.createProxyButton(a.legendItem, g, c, b);
                        this.proxyElementsList.push({item: a, element: a.a11yProxyElement, posElement: b})
                    }
                }, getKeyboardNavigation: function () {
                    var a = this.keyCodes, c = this, b = this.chart;
                    return new t(b, {
                        keyCodeMap: [[[a.left, a.right, a.up, a.down], function (a) {
                            return c.onKbdArrowKey(this, a)
                        }], [[a.enter, a.space], function (b) {
                            return e.isFirefox &&
                            b === a.space ? this.response.success : c.onKbdClick(this)
                        }]], validate: function () {
                            return c.shouldHaveLegendNavigation()
                        }, init: function (a) {
                            return c.onKbdNavigationInit(a)
                        }, terminate: function () {
                            b.legend.allItems.forEach(function (a) {
                                return a.setState("", !0)
                            })
                        }
                    })
                }, onKbdArrowKey: function (a, c) {
                    var b = this.keyCodes, g = a.response, d = this.chart, f = d.options.accessibility, n = d.legend.allItems.length;
                    c = c === b.left || c === b.up ? -1 : 1;
                    return d.highlightLegendItem(this.highlightedLegendItemIx + c) ? (this.highlightedLegendItemIx +=
                        c, g.success) : 1 < n && f.keyboardNavigation.wrapAround ? (a.init(c), g.success) : g[0 < c ? "next" : "prev"]
                }, onKbdClick: function (c) {
                    var b = this.chart.legend.allItems[this.highlightedLegendItemIx];
                    b && b.a11yProxyElement && a(b.a11yProxyElement, "click");
                    return c.response.success
                }, shouldHaveLegendNavigation: function () {
                    var a = this.chart, c = a.colorAxis && a.colorAxis.length, b = (a.options.legend || {}).accessibility || {};
                    return !!(a.legend && a.legend.allItems && a.legend.display && !c && b.enabled && b.keyboardNavigation && b.keyboardNavigation.enabled)
                },
                onKbdNavigationInit: function (a) {
                    var c = this.chart, b = c.legend.allItems.length - 1;
                    a = 0 < a ? 0 : b;
                    c.highlightLegendItem(a);
                    this.highlightedLegendItemIx = a
                }
            });
            return b
        });
        v(b, "Accessibility/Components/MenuComponent.js", [b["Core/Chart/Chart.js"], b["Core/Utilities.js"], b["Accessibility/AccessibilityComponent.js"], b["Accessibility/KeyboardNavigationHandler.js"], b["Accessibility/Utils/ChartUtilities.js"], b["Accessibility/Utils/HTMLUtilities.js"]], function (b, e, r, p, u, t) {
            function l(b) {
                return b.exportSVGElements && b.exportSVGElements[0]
            }

            e = e.extend;
            var m = u.unhideChartElementFromAT, h = t.removeElement, q = t.getFakeMouseEvent;
            b.prototype.showExportMenu = function () {
                var b = l(this);
                if (b && (b = b.element, b.onclick)) b.onclick(q("click"))
            };
            b.prototype.hideExportMenu = function () {
                var b = this.exportDivElements;
                b && this.exportContextMenu && (b.forEach(function (a) {
                    if ("highcharts-menu-item" === a.className && a.onmouseout) a.onmouseout(q("mouseout"))
                }), this.highlightedExportItemIx = 0, this.exportContextMenu.hideMenu(), this.container.focus())
            };
            b.prototype.highlightExportItem =
                function (b) {
                    var a = this.exportDivElements && this.exportDivElements[b], c = this.exportDivElements && this.exportDivElements[this.highlightedExportItemIx];
                    if (a && "LI" === a.tagName && (!a.children || !a.children.length)) {
                        var g = !!(this.renderTo.getElementsByTagName("g")[0] || {}).focus;
                        a.focus && g && a.focus();
                        if (c && c.onmouseout) c.onmouseout(q("mouseout"));
                        if (a.onmouseover) a.onmouseover(q("mouseover"));
                        this.highlightedExportItemIx = b;
                        return !0
                    }
                    return !1
                };
            b.prototype.highlightLastExportItem = function () {
                var b;
                if (this.exportDivElements) for (b =
                                                     this.exportDivElements.length; b--;) if (this.highlightExportItem(b)) return !0;
                return !1
            };
            b = function () {
            };
            b.prototype = new r;
            e(b.prototype, {
                init: function () {
                    var b = this.chart, a = this;
                    this.addEvent(b, "exportMenuShown", function () {
                        a.onMenuShown()
                    });
                    this.addEvent(b, "exportMenuHidden", function () {
                        a.onMenuHidden()
                    })
                }, onMenuHidden: function () {
                    var b = this.chart.exportContextMenu;
                    b && b.setAttribute("aria-hidden", "true");
                    this.isExportMenuShown = !1;
                    this.setExportButtonExpandedState("false")
                }, onMenuShown: function () {
                    var b = this.chart,
                        a = b.exportContextMenu;
                    a && (this.addAccessibleContextMenuAttribs(), m(b, a));
                    this.isExportMenuShown = !0;
                    this.setExportButtonExpandedState("true")
                }, setExportButtonExpandedState: function (b) {
                    var a = this.exportButtonProxy;
                    a && a.setAttribute("aria-expanded", b)
                }, onChartRender: function () {
                    var b = this.chart, a = b.options.accessibility;
                    h(this.exportProxyGroup);
                    var c = b.options.exporting, d = l(b);
                    c && !1 !== c.enabled && c.accessibility && c.accessibility.enabled && d && d.element && (this.exportProxyGroup = this.addProxyGroup("all" ===
                    a.landmarkVerbosity ? {"aria-label": b.langFormat("accessibility.exporting.exportRegionLabel", {chart: b}), role: "region"} : {}), a = l(this.chart), this.exportButtonProxy = this.createProxyButton(a, this.exportProxyGroup, {"aria-label": b.langFormat("accessibility.exporting.menuButtonLabel", {chart: b}), "aria-expanded": !1}))
                }, addAccessibleContextMenuAttribs: function () {
                    var b = this.chart, a = b.exportDivElements;
                    a && a.length && (a.forEach(function (a) {
                        "LI" !== a.tagName || a.children && a.children.length ? a.setAttribute("aria-hidden",
                            "true") : a.setAttribute("tabindex", -1)
                    }), a = a[0].parentNode, a.removeAttribute("aria-hidden"), a.setAttribute("aria-label", b.langFormat("accessibility.exporting.chartMenuLabel", {chart: b})))
                }, getKeyboardNavigation: function () {
                    var b = this.keyCodes, a = this.chart, c = this;
                    return new p(a, {
                        keyCodeMap: [[[b.left, b.up], function () {
                            return c.onKbdPrevious(this)
                        }], [[b.right, b.down], function () {
                            return c.onKbdNext(this)
                        }], [[b.enter, b.space], function () {
                            return c.onKbdClick(this)
                        }]], validate: function () {
                            return a.exportChart &&
                                !1 !== a.options.exporting.enabled && !1 !== a.options.exporting.accessibility.enabled
                        }, init: function () {
                            var b = c.exportButtonProxy, g = a.exportingGroup;
                            g && b && a.setFocusToElement(g, b)
                        }, terminate: function () {
                            a.hideExportMenu()
                        }
                    })
                }, onKbdPrevious: function (b) {
                    var a = this.chart, c = a.options.accessibility;
                    b = b.response;
                    for (var d = a.highlightedExportItemIx || 0; d--;) if (a.highlightExportItem(d)) return b.success;
                    return c.keyboardNavigation.wrapAround ? (a.highlightLastExportItem(), b.success) : b.prev
                }, onKbdNext: function (b) {
                    var a =
                        this.chart, c = a.options.accessibility;
                    b = b.response;
                    for (var d = (a.highlightedExportItemIx || 0) + 1; d < a.exportDivElements.length; ++d) if (a.highlightExportItem(d)) return b.success;
                    return c.keyboardNavigation.wrapAround ? (a.highlightExportItem(0), b.success) : b.next
                }, onKbdClick: function (b) {
                    var a = this.chart, c = a.exportDivElements[a.highlightedExportItemIx], d = l(a).element;
                    this.isExportMenuShown ? this.fakeClickEvent(c) : (this.fakeClickEvent(d), a.highlightExportItem(0));
                    return b.response.success
                }
            });
            return b
        });
        v(b, "Accessibility/Components/SeriesComponent/SeriesKeyboardNavigation.js",
            [b["Core/Chart/Chart.js"], b["Core/Series/Point.js"], b["Core/Series/Series.js"], b["Core/Series/SeriesRegistry.js"], b["Core/Globals.js"], b["Core/Utilities.js"], b["Accessibility/KeyboardNavigationHandler.js"], b["Accessibility/Utils/EventProvider.js"], b["Accessibility/Utils/ChartUtilities.js"]], function (b, e, r, p, u, t, l, m, h) {
                function q(a) {
                    var c = a.index, b = a.series.points, d = b.length;
                    if (b[c] !== a) for (; d--;) {
                        if (b[d] === a) return d
                    } else return c
                }

                function g(a) {
                    var c = a.chart.options.accessibility.keyboardNavigation.seriesNavigation,
                        b = a.options.accessibility || {}, d = b.keyboardNavigation;
                    return d && !1 === d.enabled || !1 === b.enabled || !1 === a.options.enableMouseTracking || !a.visible || c.pointNavigationEnabledThreshold && c.pointNavigationEnabledThreshold <= a.points.length
                }

                function a(a) {
                    var c = a.series.chart.options.accessibility, b = a.options.accessibility && !1 === a.options.accessibility.enabled;
                    return a.isNull && c.keyboardNavigation.seriesNavigation.skipNullPoints || !1 === a.visible || !1 === a.isInside || b || g(a.series)
                }

                function c(a, c, b, d) {
                    var g = Infinity,
                        f = c.points.length, y = function (a) {
                            return !(C(a.plotX) && C(a.plotY))
                        };
                    if (!y(a)) {
                        for (; f--;) {
                            var k = c.points[f];
                            if (!y(k) && (k = (a.plotX - k.plotX) * (a.plotX - k.plotX) * (b || 1) + (a.plotY - k.plotY) * (a.plotY - k.plotY) * (d || 1), k < g)) {
                                g = k;
                                var A = f
                            }
                        }
                        return C(A) ? c.points[A] : void 0
                    }
                }

                function d(a) {
                    var c = !1;
                    delete a.highlightedPoint;
                    return c = a.series.reduce(function (a, c) {
                        return a || c.highlightFirstValidPoint()
                    }, !1)
                }

                function f(a, c) {
                    this.keyCodes = c;
                    this.chart = a
                }

                var n = p.seriesTypes, E = u.doc, C = t.defined;
                p = t.extend;
                var w = t.fireEvent, v =
                    h.getPointFromXY, H = h.getSeriesFromName, F = h.scrollToPoint;
                r.prototype.keyboardMoveVertical = !0;
                ["column", "pie"].forEach(function (a) {
                    n[a] && (n[a].prototype.keyboardMoveVertical = !1)
                });
                e.prototype.highlight = function () {
                    var a = this.series.chart;
                    if (this.isNull) a.tooltip && a.tooltip.hide(0); else this.onMouseOver();
                    F(this);
                    this.graphic && a.setFocusToElement(this.graphic);
                    a.highlightedPoint = this;
                    return this
                };
                b.prototype.highlightAdjacentPoint = function (c) {
                    var b = this.series, d = this.highlightedPoint, f = d && q(d) || 0, n =
                        d && d.series.points, h = this.series && this.series[this.series.length - 1];
                    h = h && h.points && h.points[h.points.length - 1];
                    if (!b[0] || !b[0].points) return !1;
                    if (d) {
                        if (b = b[d.series.index + (c ? 1 : -1)], f = n[f + (c ? 1 : -1)], !f && b && (f = b.points[c ? 0 : b.points.length - 1]), !f) return !1
                    } else f = c ? b[0].points[0] : h;
                    return a(f) ? (b = f.series, g(b) ? this.highlightedPoint = c ? b.points[b.points.length - 1] : b.points[0] : this.highlightedPoint = f, this.highlightAdjacentPoint(c)) : f.highlight()
                };
                r.prototype.highlightFirstValidPoint = function () {
                    var c = this.chart.highlightedPoint,
                        b = (c && c.series) === this ? q(c) : 0;
                    c = this.points;
                    var d = c.length;
                    if (c && d) {
                        for (var f = b; f < d; ++f) if (!a(c[f])) return c[f].highlight();
                        for (; 0 <= b; --b) if (!a(c[b])) return c[b].highlight()
                    }
                    return !1
                };
                b.prototype.highlightAdjacentSeries = function (a) {
                    var b = this.highlightedPoint, d = this.series && this.series[this.series.length - 1], f = d && d.points && d.points[d.points.length - 1];
                    if (!this.highlightedPoint) return d = a ? this.series && this.series[0] : d, (f = a ? d && d.points && d.points[0] : f) ? f.highlight() : !1;
                    d = this.series[b.series.index + (a ?
                        -1 : 1)];
                    if (!d) return !1;
                    f = c(b, d, 4);
                    if (!f) return !1;
                    if (g(d)) return f.highlight(), a = this.highlightAdjacentSeries(a), a ? a : (b.highlight(), !1);
                    f.highlight();
                    return f.series.highlightFirstValidPoint()
                };
                b.prototype.highlightAdjacentPointVertical = function (c) {
                    var b = this.highlightedPoint, d = Infinity, f;
                    if (!C(b.plotX) || !C(b.plotY)) return !1;
                    this.series.forEach(function (h) {
                        g(h) || h.points.forEach(function (g) {
                            if (C(g.plotY) && C(g.plotX) && g !== b) {
                                var n = g.plotY - b.plotY, k = Math.abs(g.plotX - b.plotX);
                                k = Math.abs(n) * Math.abs(n) +
                                    k * k * 4;
                                h.yAxis && h.yAxis.reversed && (n *= -1);
                                !(0 >= n && c || 0 <= n && !c || 5 > k || a(g)) && k < d && (d = k, f = g)
                            }
                        })
                    });
                    return f ? f.highlight() : !1
                };
                p(f.prototype, {
                    init: function () {
                        var a = this, c = this.chart, b = this.eventProvider = new m;
                        b.addEvent(r, "destroy", function () {
                            return a.onSeriesDestroy(this)
                        });
                        b.addEvent(c, "afterDrilldown", function () {
                            d(this);
                            this.focusElement && this.focusElement.removeFocusBorder()
                        });
                        b.addEvent(c, "drilldown", function (c) {
                            c = c.point;
                            var b = c.series;
                            a.lastDrilledDownPoint = {x: c.x, y: c.y, seriesName: b ? b.name : ""}
                        });
                        b.addEvent(c, "drillupall", function () {
                            setTimeout(function () {
                                a.onDrillupAll()
                            }, 10)
                        });
                        b.addEvent(e, "afterSetState", function () {
                            var a = this.graphic && this.graphic.element;
                            c.highlightedPoint === this && E.activeElement !== a && a && a.focus && a.focus()
                        })
                    }, onDrillupAll: function () {
                        var a = this.lastDrilledDownPoint, c = this.chart, b = a && H(c, a.seriesName), d;
                        a && b && C(a.x) && C(a.y) && (d = v(b, a.x, a.y));
                        c.container && c.container.focus();
                        d && d.highlight && d.highlight();
                        c.focusElement && c.focusElement.removeFocusBorder()
                    }, getKeyboardNavigationHandler: function () {
                        var a =
                            this, c = this.keyCodes, b = this.chart, d = b.inverted;
                        return new l(b, {
                            keyCodeMap: [[d ? [c.up, c.down] : [c.left, c.right], function (c) {
                                return a.onKbdSideways(this, c)
                            }], [d ? [c.left, c.right] : [c.up, c.down], function (c) {
                                return a.onKbdVertical(this, c)
                            }], [[c.enter, c.space], function (a, c) {
                                if (a = b.highlightedPoint) c.point = a, w(a.series, "click", c), a.firePointEvent("click");
                                return this.response.success
                            }]], init: function (c) {
                                return a.onHandlerInit(this, c)
                            }, terminate: function () {
                                return a.onHandlerTerminate()
                            }
                        })
                    }, onKbdSideways: function (a,
                                                c) {
                        var b = this.keyCodes;
                        return this.attemptHighlightAdjacentPoint(a, c === b.right || c === b.down)
                    }, onKbdVertical: function (a, c) {
                        var b = this.chart, d = this.keyCodes;
                        c = c === d.down || c === d.right;
                        d = b.options.accessibility.keyboardNavigation.seriesNavigation;
                        if (d.mode && "serialize" === d.mode) return this.attemptHighlightAdjacentPoint(a, c);
                        b[b.highlightedPoint && b.highlightedPoint.series.keyboardMoveVertical ? "highlightAdjacentPointVertical" : "highlightAdjacentSeries"](c);
                        return a.response.success
                    }, onHandlerInit: function (a,
                                                c) {
                        var b = this.chart;
                        if (0 < c) d(b); else {
                            c = b.series.length;
                            for (var f; c-- && !(b.highlightedPoint = b.series[c].points[b.series[c].points.length - 1], f = b.series[c].highlightFirstValidPoint());) ;
                        }
                        return a.response.success
                    }, onHandlerTerminate: function () {
                        var a = this.chart;
                        a.tooltip && a.tooltip.hide(0);
                        var c = a.highlightedPoint && a.highlightedPoint.series;
                        if (c && c.onMouseOut) c.onMouseOut();
                        if (a.highlightedPoint && a.highlightedPoint.onMouseOut) a.highlightedPoint.onMouseOut();
                        delete a.highlightedPoint
                    }, attemptHighlightAdjacentPoint: function (a,
                                                                c) {
                        var b = this.chart, d = b.options.accessibility.keyboardNavigation.wrapAround;
                        return b.highlightAdjacentPoint(c) ? a.response.success : d ? a.init(c ? 1 : -1) : a.response[c ? "next" : "prev"]
                    }, onSeriesDestroy: function (a) {
                        var c = this.chart;
                        c.highlightedPoint && c.highlightedPoint.series === a && (delete c.highlightedPoint, c.focusElement && c.focusElement.removeFocusBorder())
                    }, destroy: function () {
                        this.eventProvider.removeAddedEvents()
                    }
                });
                return f
            });
        v(b, "Accessibility/Components/AnnotationsA11y.js", [b["Accessibility/Utils/HTMLUtilities.js"]],
            function (b) {
                function e(b) {
                    return (b.annotations || []).reduce(function (b, m) {
                        m.options && !1 !== m.options.visible && (b = b.concat(m.labels));
                        return b
                    }, [])
                }

                function r(b) {
                    return b.options && b.options.accessibility && b.options.accessibility.description || b.graphic && b.graphic.text && b.graphic.text.textStr || ""
                }

                function p(b) {
                    var h = b.options && b.options.accessibility && b.options.accessibility.description;
                    if (h) return h;
                    h = b.chart;
                    var m = r(b), g = b.points.filter(function (a) {
                        return !!a.graphic
                    }).map(function (a) {
                        var c = a.accessibility &&
                            a.accessibility.valueDescription || a.graphic && a.graphic.element && a.graphic.element.getAttribute("aria-label") || "";
                        a = a && a.series.name || "";
                        return (a ? a + ", " : "") + "data point " + c
                    }).filter(function (a) {
                        return !!a
                    }), a = g.length, c = "accessibility.screenReaderSection.annotations.description" + (1 < a ? "MultiplePoints" : a ? "SinglePoint" : "NoPoints");
                    b = {annotationText: m, annotation: b, numPoints: a, annotationPoint: g[0], additionalAnnotationPoints: g.slice(1)};
                    return h.langFormat(c, b)
                }

                function u(b) {
                    return e(b).map(function (b) {
                        return (b =
                            t(l(p(b)))) ? "<li>" + b + "</li>" : ""
                    })
                }

                var t = b.escapeStringForHTML, l = b.stripHTMLTagsFromString;
                return {
                    getAnnotationsInfoHTML: function (b) {
                        var h = b.annotations;
                        return h && h.length ? '<ul style="list-style-type: none">' + u(b).join(" ") + "</ul>" : ""
                    }, getAnnotationLabelDescription: p, getAnnotationListItems: u, getPointAnnotationTexts: function (b) {
                        var h = e(b.series.chart).filter(function (h) {
                            return -1 < h.points.indexOf(b)
                        });
                        return h.length ? h.map(function (b) {
                            return "" + r(b)
                        }) : []
                    }
                }
            });
        v(b, "Accessibility/Components/SeriesComponent/SeriesDescriber.js",
            [b["Accessibility/Components/AnnotationsA11y.js"], b["Accessibility/Utils/ChartUtilities.js"], b["Core/FormatUtilities.js"], b["Accessibility/Utils/HTMLUtilities.js"], b["Core/Tooltip.js"], b["Core/Utilities.js"]], function (b, e, r, p, u, t) {
                function l(a) {
                    var b = a.index;
                    return a.series && a.series.data && I(b) ? A(a.series.data, function (a) {
                        return !!(a && "undefined" !== typeof a.index && a.index > b && a.graphic && a.graphic.element)
                    }) || null : null
                }

                function m(a) {
                    var b = a.chart.options.accessibility.series.pointDescriptionEnabledThreshold;
                    return !!(!1 !== b && a.points && a.points.length >= b)
                }

                function h(a) {
                    var b = a.options.accessibility || {};
                    return !m(a) && !b.exposeAsGroupOnly
                }

                function q(a) {
                    var b = a.chart.options.accessibility.keyboardNavigation.seriesNavigation;
                    return !(!a.points || !(a.points.length < b.pointNavigationEnabledThreshold || !1 === b.pointNavigationEnabledThreshold))
                }

                function g(a, b) {
                    var c = a.series.chart, k = c.options.accessibility.point || {};
                    a = a.series.tooltipOptions || {};
                    c = c.options.lang;
                    return L(b) ? K(b, k.valueDecimals || a.valueDecimals || -1,
                        c.decimalPoint, c.accessibility.thousandsSep || c.thousandsSep) : b
                }

                function a(a) {
                    var b = (a.options.accessibility || {}).description;
                    return b && a.chart.langFormat("accessibility.series.description", {description: b, series: a}) || ""
                }

                function c(a, b) {
                    return a.chart.langFormat("accessibility.series." + b + "Description", {name: B(a[b]), series: a})
                }

                function d(a) {
                    var b = a.series, c = b.chart, k = c.options.accessibility.point || {};
                    if (b.xAxis && b.xAxis.dateTime) return b = u.prototype.getXDateFormat.call({
                        getDateFormat: u.prototype.getDateFormat,
                        chart: c
                    }, a, c.options.tooltip, b.xAxis), k = k.dateFormatter && k.dateFormatter(a) || k.dateFormat || b, c.time.dateFormat(k, a.x, void 0)
                }

                function f(a) {
                    var b = d(a), c = (a.series.xAxis || {}).categories && I(a.category) && ("" + a.category).replace("<br/>", " "), k = a.id && 0 > a.id.indexOf("highcharts-"), f = "x, " + a.x;
                    return a.name || b || c || (k ? a.id : f)
                }

                function n(a, b, c) {
                    var k = b || "", d = c || "";
                    return a.series.pointArrayMap.reduce(function (b, c) {
                        b += b.length ? ", " : "";
                        var f = g(a, G(a[c], a.options[c]));
                        return b + (c + ": " + k + f + d)
                    }, "")
                }

                function E(a) {
                    var b =
                        a.series, c = b.chart.options.accessibility.point || {}, k = b.tooltipOptions || {}, d = c.valuePrefix || k.valuePrefix || "";
                    c = c.valueSuffix || k.valueSuffix || "";
                    k = g(a, a["undefined" !== typeof a.value ? "value" : "y"]);
                    return a.isNull ? b.chart.langFormat("accessibility.series.nullPointValue", {point: a}) : b.pointArrayMap ? n(a, d, c) : d + k + c
                }

                function C(a) {
                    var b = a.series, c = b.chart, k = c.options.accessibility.point.valueDescriptionFormat, d = (b = G(b.xAxis && b.xAxis.options.accessibility && b.xAxis.options.accessibility.enabled, !c.angular)) ?
                        f(a) : "";
                    a = {point: a, index: I(a.index) ? a.index + 1 : "", xDescription: d, value: E(a), separator: b ? ", " : ""};
                    return z(k, a, c)
                }

                function w(a) {
                    var b = a.series, c = b.chart, k = C(a), d = a.options && a.options.accessibility && a.options.accessibility.description;
                    d = d ? " " + d : "";
                    b = 1 < c.series.length && b.name ? " " + b.name + "." : "";
                    c = a.series.chart;
                    var f = F(a), g = {point: a, annotations: f};
                    c = f.length ? c.langFormat("accessibility.series.pointAnnotationsDescription", g) : "";
                    a.accessibility = a.accessibility || {};
                    a.accessibility.valueDescription = k;
                    return k +
                        d + b + (c ? " " + c : "")
                }

                function v(a) {
                    var b = h(a), c = q(a);
                    (b || c) && a.points.forEach(function (a) {
                        var c;
                        if (!(c = a.graphic && a.graphic.element) && (c = a.series && a.series.is("sunburst"), c = a.isNull && !c)) {
                            var d = a.series, f = l(a);
                            d = (c = f && f.graphic) ? c.parentGroup : d.graph || d.group;
                            f = f ? {x: G(a.plotX, f.plotX, 0), y: G(a.plotY, f.plotY, 0)} : {x: G(a.plotX, 0), y: G(a.plotY, 0)};
                            f = a.series.chart.renderer.rect(f.x, f.y, 1, 1);
                            f.attr({"class": "highcharts-a11y-dummy-point", fill: "none", opacity: 0, "fill-opacity": 0, "stroke-opacity": 0});
                            d && d.element ?
                                (a.graphic = f, a.hasDummyGraphic = !0, f.add(d), d.element.insertBefore(f.element, c ? c.element : null), c = f.element) : c = void 0
                        }
                        d = a.options && a.options.accessibility && !1 === a.options.accessibility.enabled;
                        c && (c.setAttribute("tabindex", "-1"), c.style.outline = "0", b && !d ? (f = a.series, d = f.chart.options.accessibility.point || {}, f = f.options.accessibility || {}, a = k(f.pointDescriptionFormatter && f.pointDescriptionFormatter(a) || d.descriptionFormatter && d.descriptionFormatter(a) || w(a)), c.setAttribute("role", "img"), c.setAttribute("aria-label",
                            a)) : c.setAttribute("aria-hidden", !0))
                    })
                }

                function H(b) {
                    var k = b.chart, d = k.types || [], f = a(b), g = function (a) {
                        return k[a] && 1 < k[a].length && b[a]
                    }, A = c(b, "xAxis"), n = c(b, "yAxis"), h = {name: b.name || "", ix: b.index + 1, numSeries: k.series && k.series.length, numPoints: b.points && b.points.length, series: b};
                    d = 1 < d.length ? "Combination" : "";
                    return (k.langFormat("accessibility.series.summary." + b.type + d, h) || k.langFormat("accessibility.series.summary.default" + d, h)) + (f ? " " + f : "") + (g("yAxis") ? " " + n : "") + (g("xAxis") ? " " + A : "")
                }

                var F = b.getPointAnnotationTexts,
                    B = e.getAxisDescription, D = e.getSeriesFirstPointElement, y = e.getSeriesA11yElement, x = e.unhideChartElementFromAT, z = r.format, K = r.numberFormat, M = p.reverseChildNodes, k = p.stripHTMLTagsFromString, A = t.find, L = t.isNumber, G = t.pick, I = t.defined;
                return {
                    describeSeries: function (a) {
                        var b = a.chart, c = D(a), d = y(a), f = b.is3d && b.is3d();
                        if (d) {
                            d.lastChild !== c || f || M(d);
                            v(a);
                            x(b, d);
                            f = a.chart;
                            b = f.options.chart;
                            c = 1 < f.series.length;
                            f = f.options.accessibility.series.describeSingleSeries;
                            var g = (a.options.accessibility || {}).exposeAsGroupOnly;
                            b.options3d && b.options3d.enabled && c || !(c || f || g || m(a)) ? d.setAttribute("aria-label", "") : (b = a.chart.options.accessibility, c = b.landmarkVerbosity, (a.options.accessibility || {}).exposeAsGroupOnly ? d.setAttribute("role", "img") : "all" === c && d.setAttribute("role", "region"), d.setAttribute("tabindex", "-1"), d.style.outline = "0", d.setAttribute("aria-label", k(b.series.descriptionFormatter && b.series.descriptionFormatter(a) || H(a))))
                        }
                    }, defaultPointDescriptionFormatter: w, defaultSeriesDescriptionFormatter: H, getPointA11yTimeDescription: d,
                    getPointXDescription: f, getPointValue: E, getPointValueDescription: C
                }
            });
        v(b, "Accessibility/Utils/Announcer.js", [b["Core/Globals.js"], b["Core/Renderer/HTML/AST.js"], b["Accessibility/Utils/DOMElementProvider.js"], b["Accessibility/Utils/HTMLUtilities.js"]], function (b, e, r, p) {
            var u = b.doc, t = p.setElAttrs, l = p.visuallyHideElement;
            p = function () {
                function b(b, q) {
                    this.chart = b;
                    this.domElementProvider = new r;
                    this.announceRegion = this.addAnnounceRegion(q)
                }

                b.prototype.destroy = function () {
                    this.domElementProvider.destroyCreatedElements()
                };
                b.prototype.announce = function (b) {
                    var h = this;
                    e.setElementHTML(this.announceRegion, b);
                    this.clearAnnouncementRegionTimer && clearTimeout(this.clearAnnouncementRegionTimer);
                    this.clearAnnouncementRegionTimer = setTimeout(function () {
                        h.announceRegion.innerHTML = "";
                        delete h.clearAnnouncementRegionTimer
                    }, 1E3)
                };
                b.prototype.addAnnounceRegion = function (b) {
                    var h = this.chart.announcerContainer || this.createAnnouncerContainer(), g = this.domElementProvider.createElement("div");
                    t(g, {"aria-hidden": !1, "aria-live": b});
                    l(g);
                    h.appendChild(g);
                    return g
                };
                b.prototype.createAnnouncerContainer = function () {
                    var b = this.chart, e = u.createElement("div");
                    t(e, {"aria-hidden": !1, style: "position:relative", "class": "highcharts-announcer-container"});
                    b.renderTo.insertBefore(e, b.renderTo.firstChild);
                    return b.announcerContainer = e
                };
                return b
            }();
            return b.Announcer = p
        });
        v(b, "Accessibility/Components/SeriesComponent/NewDataAnnouncer.js", [b["Core/Globals.js"], b["Core/Series/Series.js"], b["Core/Utilities.js"], b["Accessibility/Utils/ChartUtilities.js"], b["Accessibility/Components/SeriesComponent/SeriesDescriber.js"],
            b["Accessibility/Utils/Announcer.js"], b["Accessibility/Utils/EventProvider.js"]], function (b, e, r, p, u, t, l) {
            function m(a) {
                var b = a.series.data.filter(function (b) {
                    return a.x === b.x && a.y === b.y
                });
                return 1 === b.length ? b[0] : a
            }

            function h(a, b) {
                var c = (a || []).concat(b || []).reduce(function (a, b) {
                    a[b.name + b.index] = b;
                    return a
                }, {});
                return Object.keys(c).map(function (a) {
                    return c[a]
                })
            }

            var q = r.extend, g = r.defined, a = p.getChartTitle, c = u.defaultPointDescriptionFormatter, d = u.defaultSeriesDescriptionFormatter;
            r = function (a) {
                this.chart =
                    a
            };
            q(r.prototype, {
                init: function () {
                    var a = this.chart, b = a.options.accessibility.announceNewData.interruptUser ? "assertive" : "polite";
                    this.lastAnnouncementTime = 0;
                    this.dirty = {allSeries: {}};
                    this.eventProvider = new l;
                    this.announcer = new t(a, b);
                    this.addEventListeners()
                }, destroy: function () {
                    this.eventProvider.removeAddedEvents();
                    this.announcer.destroy()
                }, addEventListeners: function () {
                    var a = this, b = this.chart, c = this.eventProvider;
                    c.addEvent(b, "afterDrilldown", function () {
                        a.lastAnnouncementTime = 0
                    });
                    c.addEvent(e, "updatedData",
                        function () {
                            a.onSeriesUpdatedData(this)
                        });
                    c.addEvent(b, "afterAddSeries", function (b) {
                        a.onSeriesAdded(b.series)
                    });
                    c.addEvent(e, "addPoint", function (b) {
                        a.onPointAdded(b.point)
                    });
                    c.addEvent(b, "redraw", function () {
                        a.announceDirtyData()
                    })
                }, onSeriesUpdatedData: function (a) {
                    var b = this.chart;
                    a.chart === b && b.options.accessibility.announceNewData.enabled && (this.dirty.hasDirty = !0, this.dirty.allSeries[a.name + a.index] = a)
                }, onSeriesAdded: function (a) {
                    this.chart.options.accessibility.announceNewData.enabled && (this.dirty.hasDirty =
                        !0, this.dirty.allSeries[a.name + a.index] = a, this.dirty.newSeries = g(this.dirty.newSeries) ? void 0 : a)
                }, onPointAdded: function (a) {
                    var b = a.series.chart;
                    this.chart === b && b.options.accessibility.announceNewData.enabled && (this.dirty.newPoint = g(this.dirty.newPoint) ? void 0 : a)
                }, announceDirtyData: function () {
                    var a = this;
                    if (this.chart.options.accessibility.announceNewData && this.dirty.hasDirty) {
                        var b = this.dirty.newPoint;
                        b && (b = m(b));
                        this.queueAnnouncement(Object.keys(this.dirty.allSeries).map(function (b) {
                                return a.dirty.allSeries[b]
                            }),
                            this.dirty.newSeries, b);
                        this.dirty = {allSeries: {}}
                    }
                }, queueAnnouncement: function (a, b, c) {
                    var d = this, f = this.chart.options.accessibility.announceNewData;
                    if (f.enabled) {
                        var g = +new Date;
                        f = Math.max(0, f.minAnnounceInterval - (g - this.lastAnnouncementTime));
                        a = h(this.queuedAnnouncement && this.queuedAnnouncement.series, a);
                        if (b = this.buildAnnouncementMessage(a, b, c)) this.queuedAnnouncement && clearTimeout(this.queuedAnnouncementTimer), this.queuedAnnouncement = {time: g, message: b, series: a}, this.queuedAnnouncementTimer = setTimeout(function () {
                            d &&
                            d.announcer && (d.lastAnnouncementTime = +new Date, d.announcer.announce(d.queuedAnnouncement.message), delete d.queuedAnnouncement, delete d.queuedAnnouncementTimer)
                        }, f)
                    }
                }, buildAnnouncementMessage: function (f, g, h) {
                    var n = this.chart, e = n.options.accessibility.announceNewData;
                    if (e.announcementFormatter && (f = e.announcementFormatter(f, g, h), !1 !== f)) return f.length ? f : null;
                    f = b.charts && 1 < b.charts.length ? "Multiple" : "Single";
                    f = g ? "newSeriesAnnounce" + f : h ? "newPointAnnounce" + f : "newDataAnnounce";
                    e = a(n);
                    return n.langFormat("accessibility.announceNewData." +
                        f, {chartTitle: e, seriesDesc: g ? d(g) : null, pointDesc: h ? c(h) : null, point: h, series: g})
                }
            });
            return r
        });
        v(b, "Accessibility/Components/SeriesComponent/ForcedMarkers.js", [b["Core/Series/Series.js"], b["Core/Utilities.js"]], function (b, e) {
            function r(b) {
                u(!0, b, {marker: {enabled: !0, states: {normal: {opacity: 0}}}})
            }

            var p = e.addEvent, u = e.merge;
            return function () {
                p(b, "render", function () {
                    var b = this.options, e = !1 !== (this.options.accessibility && this.options.accessibility.enabled);
                    if (e = this.chart.options.accessibility.enabled &&
                        e) e = this.chart.options.accessibility, e = this.points.length < e.series.pointDescriptionEnabledThreshold || !1 === e.series.pointDescriptionEnabledThreshold;
                    if (e) {
                        if (b.marker && !1 === b.marker.enabled && (this.a11yMarkersForced = !0, r(this.options)), this._hasPointMarkers && this.points && this.points.length) for (b = this.points.length; b--;) {
                            e = this.points[b];
                            var m = e.options;
                            delete e.hasForcedA11yMarker;
                            m.marker && (m.marker.enabled ? (u(!0, m.marker, {
                                states: {
                                    normal: {
                                        opacity: m.marker.states && m.marker.states.normal && m.marker.states.normal.opacity ||
                                            1
                                    }
                                }
                            }), e.hasForcedA11yMarker = !1) : (r(m), e.hasForcedA11yMarker = !0))
                        }
                    } else this.a11yMarkersForced && (delete this.a11yMarkersForced, (b = this.resetA11yMarkerOptions) && u(!0, this.options, {marker: {enabled: b.enabled, states: {normal: {opacity: b.states && b.states.normal && b.states.normal.opacity}}}}))
                });
                p(b, "afterSetOptions", function (b) {
                    this.resetA11yMarkerOptions = u(b.options.marker || {}, this.userOptions.marker || {})
                });
                p(b, "afterRender", function () {
                    if (this.chart.styledMode) {
                        if (this.markerGroup) this.markerGroup[this.a11yMarkersForced ?
                            "addClass" : "removeClass"]("highcharts-a11y-markers-hidden");
                        this._hasPointMarkers && this.points && this.points.length && this.points.forEach(function (b) {
                            b.graphic && (b.graphic[b.hasForcedA11yMarker ? "addClass" : "removeClass"]("highcharts-a11y-marker-hidden"), b.graphic[!1 === b.hasForcedA11yMarker ? "addClass" : "removeClass"]("highcharts-a11y-marker-visible"))
                        })
                    }
                })
            }
        });
        v(b, "Accessibility/Components/SeriesComponent/SeriesComponent.js", [b["Core/Globals.js"], b["Core/Utilities.js"], b["Accessibility/AccessibilityComponent.js"],
            b["Accessibility/Components/SeriesComponent/SeriesKeyboardNavigation.js"], b["Accessibility/Components/SeriesComponent/NewDataAnnouncer.js"], b["Accessibility/Components/SeriesComponent/ForcedMarkers.js"], b["Accessibility/Utils/ChartUtilities.js"], b["Accessibility/Components/SeriesComponent/SeriesDescriber.js"], b["Core/Tooltip.js"]], function (b, e, r, p, u, t, l, m, h) {
            e = e.extend;
            var q = l.hideSeriesFromAT, g = m.describeSeries;
            b.SeriesAccessibilityDescriber = m;
            t();
            b = function () {
            };
            b.prototype = new r;
            e(b.prototype, {
                init: function () {
                    this.newDataAnnouncer =
                        new u(this.chart);
                    this.newDataAnnouncer.init();
                    this.keyboardNavigation = new p(this.chart, this.keyCodes);
                    this.keyboardNavigation.init();
                    this.hideTooltipFromATWhenShown();
                    this.hideSeriesLabelsFromATWhenShown()
                }, hideTooltipFromATWhenShown: function () {
                    var a = this;
                    this.addEvent(h, "refresh", function () {
                        this.chart === a.chart && this.label && this.label.element && this.label.element.setAttribute("aria-hidden", !0)
                    })
                }, hideSeriesLabelsFromATWhenShown: function () {
                    this.addEvent(this.chart, "afterDrawSeriesLabels", function () {
                        this.series.forEach(function (a) {
                            a.labelBySeries &&
                            a.labelBySeries.attr("aria-hidden", !0)
                        })
                    })
                }, onChartRender: function () {
                    this.chart.series.forEach(function (a) {
                        !1 !== (a.options.accessibility && a.options.accessibility.enabled) && a.visible ? g(a) : q(a)
                    })
                }, getKeyboardNavigation: function () {
                    return this.keyboardNavigation.getKeyboardNavigationHandler()
                }, destroy: function () {
                    this.newDataAnnouncer.destroy();
                    this.keyboardNavigation.destroy()
                }
            });
            return b
        });
        v(b, "Accessibility/Components/ZoomComponent.js", [b["Accessibility/AccessibilityComponent.js"], b["Accessibility/Utils/ChartUtilities.js"],
            b["Core/Globals.js"], b["Accessibility/Utils/HTMLUtilities.js"], b["Accessibility/KeyboardNavigationHandler.js"], b["Core/Utilities.js"]], function (b, e, r, p, u, t) {
            var l = e.unhideChartElementFromAT;
            e = r.noop;
            var m = p.removeElement, h = p.setElAttrs;
            p = t.extend;
            var q = t.pick;
            r.Axis.prototype.panStep = function (b, a) {
                var c = a || 3;
                a = this.getExtremes();
                var d = (a.max - a.min) / c * b;
                c = a.max + d;
                d = a.min + d;
                var f = c - d;
                0 > b && d < a.dataMin ? (d = a.dataMin, c = d + f) : 0 < b && c > a.dataMax && (c = a.dataMax, d = c - f);
                this.setExtremes(d, c)
            };
            e.prototype = new b;
            p(e.prototype, {
                init: function () {
                    var b = this, a = this.chart;
                    ["afterShowResetZoom", "afterDrilldown", "drillupall"].forEach(function (c) {
                        b.addEvent(a, c, function () {
                            b.updateProxyOverlays()
                        })
                    })
                }, onChartUpdate: function () {
                    var b = this.chart, a = this;
                    b.mapNavButtons && b.mapNavButtons.forEach(function (c, d) {
                        l(b, c.element);
                        a.setMapNavButtonAttrs(c.element, "accessibility.zoom.mapZoom" + (d ? "Out" : "In"))
                    })
                }, setMapNavButtonAttrs: function (b, a) {
                    var c = this.chart;
                    a = c.langFormat(a, {chart: c});
                    h(b, {tabindex: -1, role: "button", "aria-label": a})
                },
                onChartRender: function () {
                    this.updateProxyOverlays()
                }, updateProxyOverlays: function () {
                    var b = this.chart;
                    m(this.drillUpProxyGroup);
                    m(this.resetZoomProxyGroup);
                    b.resetZoomButton && this.recreateProxyButtonAndGroup(b.resetZoomButton, "resetZoomProxyButton", "resetZoomProxyGroup", b.langFormat("accessibility.zoom.resetZoomButton", {chart: b}));
                    b.drillUpButton && this.recreateProxyButtonAndGroup(b.drillUpButton, "drillUpProxyButton", "drillUpProxyGroup", b.langFormat("accessibility.drillUpButton", {chart: b, buttonText: b.getDrilldownBackText()}))
                },
                recreateProxyButtonAndGroup: function (b, a, c, d) {
                    m(this[c]);
                    this[c] = this.addProxyGroup();
                    this[a] = this.createProxyButton(b, this[c], {"aria-label": d, tabindex: -1})
                }, getMapZoomNavigation: function () {
                    var b = this.keyCodes, a = this.chart, c = this;
                    return new u(a, {
                        keyCodeMap: [[[b.up, b.down, b.left, b.right], function (a) {
                            return c.onMapKbdArrow(this, a)
                        }], [[b.tab], function (a, b) {
                            return c.onMapKbdTab(this, b)
                        }], [[b.space, b.enter], function () {
                            return c.onMapKbdClick(this)
                        }]], validate: function () {
                            return !!(a.mapZoom && a.mapNavButtons &&
                                a.mapNavButtons.length)
                        }, init: function (a) {
                            return c.onMapNavInit(a)
                        }
                    })
                }, onMapKbdArrow: function (b, a) {
                    var c = this.keyCodes;
                    this.chart[a === c.up || a === c.down ? "yAxis" : "xAxis"][0].panStep(a === c.left || a === c.up ? -1 : 1);
                    return b.response.success
                }, onMapKbdTab: function (b, a) {
                    var c = this.chart;
                    b = b.response;
                    var d = (a = a.shiftKey) && !this.focusedMapNavButtonIx || !a && this.focusedMapNavButtonIx;
                    c.mapNavButtons[this.focusedMapNavButtonIx].setState(0);
                    if (d) return c.mapZoom(), b[a ? "prev" : "next"];
                    this.focusedMapNavButtonIx += a ? -1 :
                        1;
                    a = c.mapNavButtons[this.focusedMapNavButtonIx];
                    c.setFocusToElement(a.box, a.element);
                    a.setState(2);
                    return b.success
                }, onMapKbdClick: function (b) {
                    this.fakeClickEvent(this.chart.mapNavButtons[this.focusedMapNavButtonIx].element);
                    return b.response.success
                }, onMapNavInit: function (b) {
                    var a = this.chart, c = a.mapNavButtons[0], d = a.mapNavButtons[1];
                    c = 0 < b ? c : d;
                    a.setFocusToElement(c.box, c.element);
                    c.setState(2);
                    this.focusedMapNavButtonIx = 0 < b ? 0 : 1
                }, simpleButtonNavigation: function (b, a, c) {
                    var d = this.keyCodes, f = this, g =
                        this.chart;
                    return new u(g, {
                        keyCodeMap: [[[d.tab, d.up, d.down, d.left, d.right], function (a, b) {
                            return this.response[a === d.tab && b.shiftKey || a === d.left || a === d.up ? "prev" : "next"]
                        }], [[d.space, d.enter], function () {
                            var a = c(this, g);
                            return q(a, this.response.success)
                        }]], validate: function () {
                            return g[b] && g[b].box && f[a]
                        }, init: function () {
                            g.setFocusToElement(g[b].box, f[a])
                        }
                    })
                }, getKeyboardNavigation: function () {
                    return [this.simpleButtonNavigation("resetZoomButton", "resetZoomProxyButton", function (b, a) {
                        a.zoomOut()
                    }), this.simpleButtonNavigation("drillUpButton",
                        "drillUpProxyButton", function (b, a) {
                            a.drillUp();
                            return b.response.prev
                        }), this.getMapZoomNavigation()]
                }
            });
            return e
        });
        v(b, "Extensions/RangeSelector.js", [b["Core/Axis/Axis.js"], b["Core/Chart/Chart.js"], b["Core/Globals.js"], b["Core/DefaultOptions.js"], b["Core/Color/Palette.js"], b["Core/Renderer/SVG/SVGElement.js"], b["Core/Utilities.js"]], function (b, e, r, p, u, t, l) {
            function m(a) {
                if (-1 !== a.indexOf("%L")) return "text";
                var b = "aAdewbBmoyY".split("").some(function (b) {
                    return -1 !== a.indexOf("%" + b)
                }), c = "HkIlMS".split("").some(function (b) {
                    return -1 !==
                        a.indexOf("%" + b)
                });
                return b && c ? "datetime-local" : b ? "date" : c ? "time" : "text"
            }

            var h = p.defaultOptions, q = l.addEvent, g = l.createElement, a = l.css, c = l.defined, d = l.destroyObjectProperties, f = l.discardElement, n = l.extend, E = l.find, C = l.fireEvent, w = l.isNumber, v = l.merge, H = l.objectEach, F = l.pad, B = l.pick, D = l.pInt, y = l.splat;
            n(h, {
                rangeSelector: {
                    allButtonsEnabled: !1,
                    buttons: void 0,
                    buttonSpacing: 5,
                    dropdown: "responsive",
                    enabled: void 0,
                    verticalAlign: "top",
                    buttonTheme: {width: 28, height: 18, padding: 2, zIndex: 7},
                    floating: !1,
                    x: 0,
                    y: 0,
                    height: void 0,
                    inputBoxBorderColor: "none",
                    inputBoxHeight: 17,
                    inputBoxWidth: void 0,
                    inputDateFormat: "%b %e, %Y",
                    inputDateParser: void 0,
                    inputEditDateFormat: "%Y-%m-%d",
                    inputEnabled: !0,
                    inputPosition: {align: "right", x: 0, y: 0},
                    inputSpacing: 5,
                    selected: void 0,
                    buttonPosition: {align: "left", x: 0, y: 0},
                    inputStyle: {color: u.highlightColor80, cursor: "pointer"},
                    labelStyle: {color: u.neutralColor60}
                }
            });
            n(h.lang, {rangeSelectorZoom: "Zoom", rangeSelectorFrom: "", rangeSelectorTo: "\u2192"});
            var x = function () {
                function e(a) {
                    this.buttons =
                        void 0;
                    this.buttonOptions = e.prototype.defaultButtons;
                    this.initialButtonGroupWidth = 0;
                    this.options = void 0;
                    this.chart = a;
                    this.init(a)
                }

                e.prototype.clickButton = function (a, d) {
                    var k = this.chart, f = this.buttonOptions[a], g = k.xAxis[0], e = k.scroller && k.scroller.getUnionExtremes() || g || {}, A = e.dataMin, h = e.dataMax, n = g && Math.round(Math.min(g.max, B(h, g.max))), m = f.type;
                    e = f._range;
                    var x, z = f.dataGrouping;
                    if (null !== A && null !== h) {
                        k.fixedRange = e;
                        this.setSelected(a);
                        z && (this.forcedDataGrouping = !0, b.prototype.setDataGrouping.call(g ||
                            {chart: this.chart}, z, !1), this.frozenStates = f.preserveDataGrouping);
                        if ("month" === m || "year" === m) if (g) {
                            m = {range: f, max: n, chart: k, dataMin: A, dataMax: h};
                            var p = g.minFromRange.call(m);
                            w(m.newMax) && (n = m.newMax)
                        } else e = f; else if (e) p = Math.max(n - e, A), n = Math.min(p + e, h); else if ("ytd" === m) if (g) "undefined" === typeof h && (A = Number.MAX_VALUE, h = Number.MIN_VALUE, k.series.forEach(function (a) {
                            a = a.xData;
                            A = Math.min(a[0], A);
                            h = Math.max(a[a.length - 1], h)
                        }), d = !1), n = this.getYTDExtremes(h, A, k.time.useUTC), p = x = n.min, n = n.max; else {
                            this.deferredYTDClick =
                                a;
                            return
                        } else "all" === m && g && (k.navigator && k.navigator.baseSeries[0] && (k.navigator.baseSeries[0].xAxis.options.range = void 0), p = A, n = h);
                        c(p) && (p += f._offsetMin);
                        c(n) && (n += f._offsetMax);
                        this.dropdown && (this.dropdown.selectedIndex = a + 1);
                        if (g) g.setExtremes(p, n, B(d, !0), void 0, {trigger: "rangeSelectorButton", rangeSelectorButton: f}); else {
                            var l = y(k.options.xAxis)[0];
                            var r = l.range;
                            l.range = e;
                            var u = l.min;
                            l.min = x;
                            q(k, "load", function () {
                                l.range = r;
                                l.min = u
                            })
                        }
                        C(this, "afterBtnClick")
                    }
                };
                e.prototype.setSelected = function (a) {
                    this.selected =
                        this.options.selected = a
                };
                e.prototype.init = function (a) {
                    var b = this, c = a.options.rangeSelector, d = c.buttons || b.defaultButtons.slice(), k = c.selected, f = function () {
                        var a = b.minInput, c = b.maxInput;
                        a && a.blur && C(a, "blur");
                        c && c.blur && C(c, "blur")
                    };
                    b.chart = a;
                    b.options = c;
                    b.buttons = [];
                    b.buttonOptions = d;
                    this.eventsToUnbind = [];
                    this.eventsToUnbind.push(q(a.container, "mousedown", f));
                    this.eventsToUnbind.push(q(a, "resize", f));
                    d.forEach(b.computeButtonRange);
                    "undefined" !== typeof k && d[k] && this.clickButton(k, !1);
                    this.eventsToUnbind.push(q(a,
                        "load", function () {
                            a.xAxis && a.xAxis[0] && q(a.xAxis[0], "setExtremes", function (c) {
                                this.max - this.min !== a.fixedRange && "rangeSelectorButton" !== c.trigger && "updatedData" !== c.trigger && b.forcedDataGrouping && !b.frozenStates && this.setDataGrouping(!1, !1)
                            })
                        }))
                };
                e.prototype.updateButtonStates = function () {
                    var a = this, b = this.chart, c = this.dropdown, d = b.xAxis[0], f = Math.round(d.max - d.min), g = !d.hasVisibleSeries, e = b.scroller && b.scroller.getUnionExtremes() || d, h = e.dataMin, n = e.dataMax;
                    b = a.getYTDExtremes(n, h, b.time.useUTC);
                    var m =
                        b.min, y = b.max, q = a.selected, x = w(q), p = a.options.allButtonsEnabled, z = a.buttons;
                    a.buttonOptions.forEach(function (b, k) {
                        var e = b._range, A = b.type, G = b.count || 1, L = z[k], I = 0, l = b._offsetMax - b._offsetMin;
                        b = k === q;
                        var O = e > n - h, r = e < d.minRange, u = !1, t = !1;
                        e = e === f;
                        ("month" === A || "year" === A) && f + 36E5 >= 864E5 * {month: 28, year: 365}[A] * G - l && f - 36E5 <= 864E5 * {month: 31, year: 366}[A] * G + l ? e = !0 : "ytd" === A ? (e = y - m + l === f, u = !b) : "all" === A && (e = d.max - d.min >= n - h, t = !b && x && e);
                        A = !p && (O || r || t || g);
                        G = b && e || e && !x && !u || b && a.frozenStates;
                        A ? I = 3 : G && (x = !0,
                            I = 2);
                        L.state !== I && (L.setState(I), c && (c.options[k + 1].disabled = A, 2 === I && (c.selectedIndex = k + 1)), 0 === I && q === k && a.setSelected())
                    })
                };
                e.prototype.computeButtonRange = function (a) {
                    var b = a.type, c = a.count || 1, d = {millisecond: 1, second: 1E3, minute: 6E4, hour: 36E5, day: 864E5, week: 6048E5};
                    if (d[b]) a._range = d[b] * c; else if ("month" === b || "year" === b) a._range = 864E5 * {month: 30, year: 365}[b] * c;
                    a._offsetMin = B(a.offsetMin, 0);
                    a._offsetMax = B(a.offsetMax, 0);
                    a._range += a._offsetMax - a._offsetMin
                };
                e.prototype.getInputValue = function (a) {
                    a =
                        "min" === a ? this.minInput : this.maxInput;
                    var b = this.chart.options.rangeSelector, c = this.chart.time;
                    return a ? ("text" === a.type && b.inputDateParser || this.defaultInputDateParser)(a.value, c.useUTC, c) : 0
                };
                e.prototype.setInputValue = function (a, b) {
                    var d = this.options, k = this.chart.time, f = "min" === a ? this.minInput : this.maxInput;
                    a = "min" === a ? this.minDateBox : this.maxDateBox;
                    if (f) {
                        var g = f.getAttribute("data-hc-time");
                        g = c(g) ? Number(g) : void 0;
                        c(b) && (c(g) && f.setAttribute("data-hc-time-previous", g), f.setAttribute("data-hc-time",
                            b), g = b);
                        f.value = k.dateFormat(this.inputTypeFormats[f.type] || d.inputEditDateFormat, g);
                        a && a.attr({text: k.dateFormat(d.inputDateFormat, g)})
                    }
                };
                e.prototype.setInputExtremes = function (a, b, c) {
                    if (a = "min" === a ? this.minInput : this.maxInput) {
                        var d = this.inputTypeFormats[a.type], k = this.chart.time;
                        d && (b = k.dateFormat(d, b), a.min !== b && (a.min = b), c = k.dateFormat(d, c), a.max !== c && (a.max = c))
                    }
                };
                e.prototype.showInput = function (b) {
                    var c = "min" === b ? this.minDateBox : this.maxDateBox;
                    if ((b = "min" === b ? this.minInput : this.maxInput) && c &&
                        this.inputGroup) {
                        var d = "text" === b.type, k = this.inputGroup, f = k.translateX;
                        k = k.translateY;
                        var g = this.options.inputBoxWidth;
                        a(b, {width: d ? c.width + (g ? -2 : 20) + "px" : "auto", height: d ? c.height - 2 + "px" : "auto", border: "2px solid silver"});
                        d && g ? a(b, {left: f + c.x + "px", top: k + "px"}) : a(b, {left: Math.min(Math.round(c.x + f - (b.offsetWidth - c.width) / 2), this.chart.chartWidth - b.offsetWidth) + "px", top: k - (b.offsetHeight - c.height) / 2 + "px"})
                    }
                };
                e.prototype.hideInput = function (b) {
                    (b = "min" === b ? this.minInput : this.maxInput) && a(b, {
                        top: "-9999em",
                        border: 0, width: "1px", height: "1px"
                    })
                };
                e.prototype.defaultInputDateParser = function (a, b, c) {
                    var d = a.split("/").join("-").split(" ").join("T");
                    -1 === d.indexOf("T") && (d += "T00:00");
                    if (b) d += "Z"; else {
                        var k;
                        if (k = r.isSafari) k = d, k = !(6 < k.length && (k.lastIndexOf("-") === k.length - 6 || k.lastIndexOf("+") === k.length - 6));
                        k && (k = (new Date(d)).getTimezoneOffset() / 60, d += 0 >= k ? "+" + F(-k) + ":00" : "-" + F(k) + ":00")
                    }
                    d = Date.parse(d);
                    w(d) || (a = a.split("-"), d = Date.UTC(D(a[0]), D(a[1]) - 1, D(a[2])));
                    c && b && w(d) && (d += c.getTimezoneOffset(d));
                    return d
                };
                e.prototype.drawInput = function (b) {
                    function c() {
                        var a = e.getInputValue(b), c = d.xAxis[0], k = d.scroller && d.scroller.xAxis ? d.scroller.xAxis : c, f = k.dataMin;
                        k = k.dataMax;
                        var g = e.maxInput, h = e.minInput;
                        a !== Number(l.getAttribute("data-hc-time-previous")) && w(a) && (l.setAttribute("data-hc-time-previous", a), p && g && w(f) ? a > Number(g.getAttribute("data-hc-time")) ? a = void 0 : a < f && (a = f) : h && w(k) && (a < Number(h.getAttribute("data-hc-time")) ? a = void 0 : a > k && (a = k)), "undefined" !== typeof a && c.setExtremes(p ? a : c.min, p ? c.max : a, void 0, void 0,
                            {trigger: "rangeSelectorInput"}))
                    }

                    var d = this.chart, k = this.div, f = this.inputGroup, e = this, y = d.renderer.style || {}, q = d.renderer, x = d.options.rangeSelector, p = "min" === b, z = h.lang[p ? "rangeSelectorFrom" : "rangeSelectorTo"];
                    z = q.label(z, 0).addClass("highcharts-range-label").attr({padding: z ? 2 : 0, height: z ? x.inputBoxHeight : 0}).add(f);
                    q = q.label("", 0).addClass("highcharts-range-input").attr({padding: 2, width: x.inputBoxWidth, height: x.inputBoxHeight, "text-align": "center"}).on("click", function () {
                        e.showInput(b);
                        e[b + "Input"].focus()
                    });
                    d.styledMode || q.attr({stroke: x.inputBoxBorderColor, "stroke-width": 1});
                    q.add(f);
                    var l = g("input", {name: b, className: "highcharts-range-selector"}, void 0, k);
                    l.setAttribute("type", m(x.inputDateFormat || "%b %e, %Y"));
                    d.styledMode || (z.css(v(y, x.labelStyle)), q.css(v({color: u.neutralColor80}, y, x.inputStyle)), a(l, n({position: "absolute", border: 0, boxShadow: "0 0 15px rgba(0,0,0,0.3)", width: "1px", height: "1px", padding: 0, textAlign: "center", fontSize: y.fontSize, fontFamily: y.fontFamily, top: "-9999em"}, x.inputStyle)));
                    l.onfocus = function () {
                        e.showInput(b)
                    };
                    l.onblur = function () {
                        l === r.doc.activeElement && c();
                        e.hideInput(b);
                        e.setInputValue(b);
                        l.blur()
                    };
                    var t = !1;
                    l.onchange = function () {
                        t || (c(), e.hideInput(b), l.blur())
                    };
                    l.onkeypress = function (a) {
                        13 === a.keyCode && c()
                    };
                    l.onkeydown = function (a) {
                        t = !0;
                        38 !== a.keyCode && 40 !== a.keyCode || c()
                    };
                    l.onkeyup = function () {
                        t = !1
                    };
                    return {dateBox: q, input: l, label: z}
                };
                e.prototype.getPosition = function () {
                    var a = this.chart, b = a.options.rangeSelector;
                    a = "top" === b.verticalAlign ? a.plotTop - a.axisOffset[0] : 0;
                    return {buttonTop: a + b.buttonPosition.y, inputTop: a + b.inputPosition.y - 10}
                };
                e.prototype.getYTDExtremes = function (a, b, c) {
                    var d = this.chart.time, f = new d.Date(a), k = d.get("FullYear", f);
                    c = c ? d.Date.UTC(k, 0, 1) : +new d.Date(k, 0, 1);
                    b = Math.max(b, c);
                    f = f.getTime();
                    return {max: Math.min(a || f, f), min: b}
                };
                e.prototype.render = function (a, b) {
                    var d = this.chart, f = d.renderer, k = d.container, e = d.options, h = e.rangeSelector, n = B(e.chart.style && e.chart.style.zIndex, 0) + 1;
                    e = h.inputEnabled;
                    if (!1 !== h.enabled) {
                        this.rendered || (this.group = f.g("range-selector-group").attr({zIndex: 7}).add(),
                            this.div = g("div", void 0, {
                                position: "relative",
                                height: 0,
                                zIndex: n
                            }), this.buttonOptions.length && this.renderButtons(), k.parentNode && k.parentNode.insertBefore(this.div, k), e && (this.inputGroup = f.g("input-group").add(this.group), f = this.drawInput("min"), this.minDateBox = f.dateBox, this.minLabel = f.label, this.minInput = f.input, f = this.drawInput("max"), this.maxDateBox = f.dateBox, this.maxLabel = f.label, this.maxInput = f.input));
                        if (e && (this.setInputValue("min", a), this.setInputValue("max", b), a = d.scroller && d.scroller.getUnionExtremes() ||
                            d.xAxis[0] || {}, c(a.dataMin) && c(a.dataMax) && (d = d.xAxis[0].minRange || 0, this.setInputExtremes("min", a.dataMin, Math.min(a.dataMax, this.getInputValue("max")) - d), this.setInputExtremes("max", Math.max(a.dataMin, this.getInputValue("min")) + d, a.dataMax)), this.inputGroup)) {
                            var y = 0;
                            [this.minLabel, this.minDateBox, this.maxLabel, this.maxDateBox].forEach(function (a) {
                                if (a) {
                                    var b = a.getBBox().width;
                                    b && (a.attr({x: y}), y += b + h.inputSpacing)
                                }
                            })
                        }
                        this.alignElements();
                        this.rendered = !0
                    }
                };
                e.prototype.renderButtons = function () {
                    var a =
                        this, b = this.buttons, c = this.options, d = h.lang, f = this.chart.renderer, e = v(c.buttonTheme), n = e && e.states, y = e.width || 28;
                    delete e.width;
                    delete e.states;
                    this.buttonGroup = f.g("range-selector-buttons").add(this.group);
                    var m = this.dropdown = g("select", void 0, {position: "absolute", width: "1px", height: "1px", padding: 0, border: 0, top: "-9999em", cursor: "pointer", opacity: .0001}, this.div);
                    q(m, "touchstart", function () {
                        m.style.fontSize = "16px"
                    });
                    [[r.isMS ? "mouseover" : "mouseenter"], [r.isMS ? "mouseout" : "mouseleave"], ["change", "click"]].forEach(function (c) {
                        var d =
                            c[0], f = c[1];
                        q(m, d, function () {
                            var c = b[a.currentButtonIndex()];
                            c && C(c.element, f || d)
                        })
                    });
                    this.zoomText = f.label(d && d.rangeSelectorZoom || "", 0).attr({padding: c.buttonTheme.padding, height: c.buttonTheme.height, paddingLeft: 0, paddingRight: 0}).add(this.buttonGroup);
                    this.chart.styledMode || (this.zoomText.css(c.labelStyle), e["stroke-width"] = B(e["stroke-width"], 0));
                    g("option", {textContent: this.zoomText.textStr, disabled: !0}, void 0, m);
                    this.buttonOptions.forEach(function (c, d) {
                        g("option", {textContent: c.title || c.text},
                            void 0, m);
                        b[d] = f.button(c.text, 0, 0, function (b) {
                            var f = c.events && c.events.click, k;
                            f && (k = f.call(c, b));
                            !1 !== k && a.clickButton(d);
                            a.isActive = !0
                        }, e, n && n.hover, n && n.select, n && n.disabled).attr({"text-align": "center", width: y}).add(a.buttonGroup);
                        c.title && b[d].attr("title", c.title)
                    })
                };
                e.prototype.alignElements = function () {
                    var a = this, b = this.buttonGroup, c = this.buttons, d = this.chart, f = this.group, e = this.inputGroup, g = this.options, h = this.zoomText, n = d.options, y = n.exporting && !1 !== n.exporting.enabled && n.navigation && n.navigation.buttonOptions;
                    n = g.buttonPosition;
                    var m = g.inputPosition, q = g.verticalAlign, l = function (b, c) {
                        return y && a.titleCollision(d) && "top" === q && "right" === c.align && c.y - b.getBBox().height - 12 < (y.y || 0) + (y.height || 0) + d.spacing[0] ? -40 : 0
                    }, x = d.plotLeft;
                    if (f && n && m) {
                        var z = n.x - d.spacing[3];
                        if (b) {
                            this.positionButtons();
                            if (!this.initialButtonGroupWidth) {
                                var p = 0;
                                h && (p += h.getBBox().width + 5);
                                c.forEach(function (a, b) {
                                    p += a.width;
                                    b !== c.length - 1 && (p += g.buttonSpacing)
                                });
                                this.initialButtonGroupWidth = p
                            }
                            x -= d.spacing[3];
                            this.updateButtonStates();
                            h =
                                l(b, n);
                            this.alignButtonGroup(h);
                            f.placed = b.placed = d.hasLoaded
                        }
                        b = 0;
                        e && (b = l(e, m), "left" === m.align ? z = x : "right" === m.align && (z = -Math.max(d.axisOffset[1], -b)), e.align({y: m.y, width: e.getBBox().width, align: m.align, x: m.x + z - 2}, !0, d.spacingBox), e.placed = d.hasLoaded);
                        this.handleCollision(b);
                        f.align({verticalAlign: q}, !0, d.spacingBox);
                        e = f.alignAttr.translateY;
                        b = f.getBBox().height + 20;
                        l = 0;
                        "bottom" === q && (l = (l = d.legend && d.legend.options) && "bottom" === l.verticalAlign && l.enabled && !l.floating ? d.legend.legendHeight + B(l.margin,
                            10) : 0, b = b + l - 20, l = e - b - (g.floating ? 0 : g.y) - (d.titleOffset ? d.titleOffset[2] : 0) - 10);
                        if ("top" === q) g.floating && (l = 0), d.titleOffset && d.titleOffset[0] && (l = d.titleOffset[0]), l += d.margin[0] - d.spacing[0] || 0; else if ("middle" === q) if (m.y === n.y) l = e; else if (m.y || n.y) l = 0 > m.y || 0 > n.y ? l - Math.min(m.y, n.y) : e - b;
                        f.translate(g.x, g.y + Math.floor(l));
                        n = this.minInput;
                        m = this.maxInput;
                        e = this.dropdown;
                        g.inputEnabled && n && m && (n.style.marginTop = f.translateY + "px", m.style.marginTop = f.translateY + "px");
                        e && (e.style.marginTop = f.translateY +
                            "px")
                    }
                };
                e.prototype.alignButtonGroup = function (a, b) {
                    var c = this.chart, d = this.buttonGroup, f = this.options.buttonPosition, k = c.plotLeft - c.spacing[3], e = f.x - c.spacing[3];
                    "right" === f.align ? e += a - k : "center" === f.align && (e -= k / 2);
                    d && d.align({y: f.y, width: B(b, this.initialButtonGroupWidth), align: f.align, x: e}, !0, c.spacingBox)
                };
                e.prototype.positionButtons = function () {
                    var a = this.buttons, b = this.chart, c = this.options, d = this.zoomText, f = b.hasLoaded ? "animate" : "attr", e = c.buttonPosition, g = b.plotLeft, h = g;
                    d && "hidden" !== d.visibility &&
                    (d[f]({x: B(g + e.x, g)}), h += e.x + d.getBBox().width + 5);
                    this.buttonOptions.forEach(function (b, d) {
                        if ("hidden" !== a[d].visibility) a[d][f]({x: h}), h += a[d].width + c.buttonSpacing; else a[d][f]({x: g})
                    })
                };
                e.prototype.handleCollision = function (a) {
                    var b = this, c = this.chart, d = this.buttonGroup, f = this.inputGroup, k = this.options, e = k.buttonPosition, g = k.dropdown, h = k.inputPosition;
                    k = function () {
                        var a = 0;
                        b.buttons.forEach(function (b) {
                            b = b.getBBox();
                            b.width > a && (a = b.width)
                        });
                        return a
                    };
                    var n = function (b) {
                        if (f && d) {
                            var c = f.alignAttr.translateX +
                                f.alignOptions.x - a + f.getBBox().x + 2, k = f.alignOptions.width, g = d.alignAttr.translateX + d.getBBox().x;
                            return g + b > c && c + k > g && e.y < h.y + f.getBBox().height
                        }
                        return !1
                    }, m = function () {
                        f && d && f.attr({translateX: f.alignAttr.translateX + (c.axisOffset[1] >= -a ? 0 : -a), translateY: f.alignAttr.translateY + d.getBBox().height + 10})
                    };
                    if (d) {
                        if ("always" === g) {
                            this.collapseButtons(a);
                            n(k()) && m();
                            return
                        }
                        "never" === g && this.expandButtons()
                    }
                    f && d ? h.align === e.align || n(this.initialButtonGroupWidth + 20) ? "responsive" === g ? (this.collapseButtons(a),
                    n(k()) && m()) : m() : "responsive" === g && this.expandButtons() : d && "responsive" === g && (this.initialButtonGroupWidth > c.plotWidth ? this.collapseButtons(a) : this.expandButtons())
                };
                e.prototype.collapseButtons = function (a) {
                    var b = this.buttons, c = this.buttonOptions, d = this.chart, f = this.dropdown, k = this.options, e = this.zoomText, g = d.userOptions.rangeSelector && d.userOptions.rangeSelector.buttonTheme || {}, h = function (a) {
                        return {
                            text: a ? a + " \u25be" : "\u25be", width: "auto", paddingLeft: B(k.buttonTheme.paddingLeft, g.padding, 8), paddingRight: B(k.buttonTheme.paddingRight,
                                g.padding, 8)
                        }
                    };
                    e && e.hide();
                    var n = !1;
                    c.forEach(function (a, c) {
                        c = b[c];
                        2 !== c.state ? c.hide() : (c.show(), c.attr(h(a.text)), n = !0)
                    });
                    n || (f && (f.selectedIndex = 0), b[0].show(), b[0].attr(h(this.zoomText && this.zoomText.textStr)));
                    c = k.buttonPosition.align;
                    this.positionButtons();
                    "right" !== c && "center" !== c || this.alignButtonGroup(a, b[this.currentButtonIndex()].getBBox().width);
                    this.showDropdown()
                };
                e.prototype.expandButtons = function () {
                    var a = this.buttons, b = this.buttonOptions, c = this.options, d = this.zoomText;
                    this.hideDropdown();
                    d && d.show();
                    b.forEach(function (b, d) {
                        d = a[d];
                        d.show();
                        d.attr({text: b.text, width: c.buttonTheme.width || 28, paddingLeft: B(c.buttonTheme.paddingLeft, "unset"), paddingRight: B(c.buttonTheme.paddingRight, "unset")});
                        2 > d.state && d.setState(0)
                    });
                    this.positionButtons()
                };
                e.prototype.currentButtonIndex = function () {
                    var a = this.dropdown;
                    return a && 0 < a.selectedIndex ? a.selectedIndex - 1 : 0
                };
                e.prototype.showDropdown = function () {
                    var b = this.buttonGroup, c = this.buttons, d = this.chart, f = this.dropdown;
                    if (b && f) {
                        var e = b.translateX;
                        b = b.translateY;
                        c = c[this.currentButtonIndex()].getBBox();
                        a(f, {left: d.plotLeft + e + "px", top: b + .5 + "px", width: c.width + "px", height: c.height + "px"});
                        this.hasVisibleDropdown = !0
                    }
                };
                e.prototype.hideDropdown = function () {
                    var b = this.dropdown;
                    b && (a(b, {top: "-9999em", width: "1px", height: "1px"}), this.hasVisibleDropdown = !1)
                };
                e.prototype.getHeight = function () {
                    var a = this.options, b = this.group, c = a.y, d = a.buttonPosition.y, f = a.inputPosition.y;
                    if (a.height) return a.height;
                    this.alignElements();
                    a = b ? b.getBBox(!0).height + 13 + c : 0;
                    b = Math.min(f, d);
                    if (0 >
                        f && 0 > d || 0 < f && 0 < d) a += Math.abs(b);
                    return a
                };
                e.prototype.titleCollision = function (a) {
                    return !(a.options.title.text || a.options.subtitle.text)
                };
                e.prototype.update = function (a) {
                    var b = this.chart;
                    v(!0, b.options.rangeSelector, a);
                    this.destroy();
                    this.init(b);
                    this.render()
                };
                e.prototype.destroy = function () {
                    var a = this, b = a.minInput, c = a.maxInput;
                    a.eventsToUnbind && (a.eventsToUnbind.forEach(function (a) {
                        return a()
                    }), a.eventsToUnbind = void 0);
                    d(a.buttons);
                    b && (b.onfocus = b.onblur = b.onchange = null);
                    c && (c.onfocus = c.onblur = c.onchange =
                        null);
                    H(a, function (b, c) {
                        b && "chart" !== c && (b instanceof t ? b.destroy() : b instanceof window.HTMLElement && f(b));
                        b !== e.prototype[c] && (a[c] = null)
                    }, this)
                };
                return e
            }();
            x.prototype.defaultButtons = [{type: "month", count: 1, text: "1m", title: "View 1 month"}, {type: "month", count: 3, text: "3m", title: "View 3 months"}, {type: "month", count: 6, text: "6m", title: "View 6 months"}, {type: "ytd", text: "YTD", title: "View year to date"}, {
                type: "year",
                count: 1,
                text: "1y",
                title: "View 1 year"
            }, {type: "all", text: "All", title: "View all"}];
            x.prototype.inputTypeFormats =
                {"datetime-local": "%Y-%m-%dT%H:%M:%S", date: "%Y-%m-%d", time: "%H:%M:%S"};
            b.prototype.minFromRange = function () {
                var a = this.range, b = a.type, c = this.max, d = this.chart.time, f = function (a, c) {
                    var f = "year" === b ? "FullYear" : "Month", e = new d.Date(a), g = d.get(f, e);
                    d.set(f, e, g + c);
                    g === d.get(f, e) && d.set("Date", e, 0);
                    return e.getTime() - a
                };
                if (w(a)) {
                    var e = c - a;
                    var g = a
                } else e = c + f(c, -a.count), this.chart && (this.chart.fixedRange = c - e);
                var h = B(this.dataMin, Number.MIN_VALUE);
                w(e) || (e = h);
                e <= h && (e = h, "undefined" === typeof g && (g = f(e, a.count)),
                    this.newMax = Math.min(e + g, this.dataMax));
                w(c) || (e = void 0);
                return e
            };
            if (!r.RangeSelector) {
                var z = [], K = function (a) {
                    function b() {
                        d && (c = a.xAxis[0].getExtremes(), f = a.legend, g = d && d.options.verticalAlign, w(c.min) && d.render(c.min, c.max), f.display && "top" === g && g === f.options.verticalAlign && (e = v(a.spacingBox), e.y = "vertical" === f.options.layout ? a.plotTop : e.y + d.getHeight(), f.group.placed = !1, f.align(e)))
                    }

                    var c, d = a.rangeSelector, f, e, g;
                    d && (E(z, function (b) {
                        return b[0] === a
                    }) || z.push([a, [q(a.xAxis[0], "afterSetExtremes",
                        function (a) {
                            d && d.render(a.min, a.max)
                        }), q(a, "redraw", b)]]), b())
                };
                q(e, "afterGetContainer", function () {
                    this.options.rangeSelector && this.options.rangeSelector.enabled && (this.rangeSelector = new x(this))
                });
                q(e, "beforeRender", function () {
                    var a = this.axes, b = this.rangeSelector;
                    b && (w(b.deferredYTDClick) && (b.clickButton(b.deferredYTDClick), delete b.deferredYTDClick), a.forEach(function (a) {
                        a.updateNames();
                        a.setScale()
                    }), this.getAxisMargins(), b.render(), a = b.options.verticalAlign, b.options.floating || ("bottom" === a ? this.extraBottomMargin =
                        !0 : "middle" !== a && (this.extraTopMargin = !0)))
                });
                q(e, "update", function (a) {
                    var b = a.options.rangeSelector;
                    a = this.rangeSelector;
                    var d = this.extraBottomMargin, f = this.extraTopMargin;
                    b && b.enabled && !c(a) && this.options.rangeSelector && (this.options.rangeSelector.enabled = !0, this.rangeSelector = a = new x(this));
                    this.extraTopMargin = this.extraBottomMargin = !1;
                    a && (K(this), b = b && b.verticalAlign || a.options && a.options.verticalAlign, a.options.floating || ("bottom" === b ? this.extraBottomMargin = !0 : "middle" !== b && (this.extraTopMargin =
                        !0)), this.extraBottomMargin !== d || this.extraTopMargin !== f) && (this.isDirtyBox = !0)
                });
                q(e, "render", function () {
                    var a = this.rangeSelector;
                    a && !a.options.floating && (a.render(), a = a.options.verticalAlign, "bottom" === a ? this.extraBottomMargin = !0 : "middle" !== a && (this.extraTopMargin = !0))
                });
                q(e, "getMargins", function () {
                    var a = this.rangeSelector;
                    a && (a = a.getHeight(), this.extraTopMargin && (this.plotTop += a), this.extraBottomMargin && (this.marginBottom += a))
                });
                e.prototype.callbacks.push(K);
                q(e, "destroy", function () {
                    for (var a =
                        0; a < z.length; a++) {
                        var b = z[a];
                        if (b[0] === this) {
                            b[1].forEach(function (a) {
                                return a()
                            });
                            z.splice(a, 1);
                            break
                        }
                    }
                });
                r.RangeSelector = x
            }
            return x
        });
        v(b, "Accessibility/Components/RangeSelectorComponent.js", [b["Accessibility/AccessibilityComponent.js"], b["Accessibility/Utils/ChartUtilities.js"], b["Accessibility/Utils/Announcer.js"], b["Core/Chart/Chart.js"], b["Accessibility/Utils/HTMLUtilities.js"], b["Accessibility/KeyboardNavigationHandler.js"], b["Core/Utilities.js"], b["Extensions/RangeSelector.js"]], function (b,
                                                                                                                                                                                                                                                                                                                                                                                                e, r, p, u, t, l, m) {
            var h = e.unhideChartElementFromAT, q = e.getAxisRangeDescription, g = u.setElAttrs, a = l.addEvent;
            e = l.extend;
            p.prototype.highlightRangeSelectorButton = function (a) {
                var b = this.rangeSelector && this.rangeSelector.buttons || [], c = this.highlightedRangeSelectorItemIx, e = this.rangeSelector && this.rangeSelector.selected;
                "undefined" !== typeof c && b[c] && c !== e && b[c].setState(this.oldRangeSelectorItemState || 0);
                this.highlightedRangeSelectorItemIx = a;
                return b[a] ? (this.setFocusToElement(b[a].box, b[a].element), a !== e &&
                (this.oldRangeSelectorItemState = b[a].state, b[a].setState(1)), !0) : !1
            };
            a(m, "afterBtnClick", function () {
                if (this.chart.accessibility && this.chart.accessibility.components.rangeSelector) return this.chart.accessibility.components.rangeSelector.onAfterBtnClick()
            });
            p = function () {
            };
            p.prototype = new b;
            e(p.prototype, {
                init: function () {
                    this.announcer = new r(this.chart, "polite")
                }, onChartUpdate: function () {
                    var a = this.chart, b = this, f = a.rangeSelector;
                    f && (this.updateSelectorVisibility(), this.setDropdownAttrs(), f.buttons &&
                    f.buttons.length && f.buttons.forEach(function (a) {
                        b.setRangeButtonAttrs(a)
                    }), f.maxInput && f.minInput && ["minInput", "maxInput"].forEach(function (c, d) {
                        if (c = f[c]) h(a, c), b.setRangeInputAttrs(c, "accessibility.rangeSelector." + (d ? "max" : "min") + "InputLabel")
                    }))
                }, updateSelectorVisibility: function () {
                    var a = this.chart, b = a.rangeSelector, f = b && b.dropdown, e = b && b.buttons || [];
                    b && b.hasVisibleDropdown && f ? (h(a, f), e.forEach(function (a) {
                        return a.element.setAttribute("aria-hidden", !0)
                    })) : (f && f.setAttribute("aria-hidden", !0),
                        e.forEach(function (b) {
                            return h(a, b.element)
                        }))
                }, setDropdownAttrs: function () {
                    var a = this.chart, b = a.rangeSelector && a.rangeSelector.dropdown;
                    b && (a = a.langFormat("accessibility.rangeSelector.dropdownLabel", {rangeTitle: a.options.lang.rangeSelectorZoom}), b.setAttribute("aria-label", a), b.setAttribute("tabindex", -1))
                }, setRangeButtonAttrs: function (a) {
                    g(a.element, {tabindex: -1, role: "button"})
                }, setRangeInputAttrs: function (a, b) {
                    var c = this.chart;
                    g(a, {tabindex: -1, "aria-label": c.langFormat(b, {chart: c})})
                }, onButtonNavKbdArrowKey: function (a,
                                                     b) {
                    var c = a.response, d = this.keyCodes, e = this.chart, g = e.options.accessibility.keyboardNavigation.wrapAround;
                    b = b === d.left || b === d.up ? -1 : 1;
                    return e.highlightRangeSelectorButton(e.highlightedRangeSelectorItemIx + b) ? c.success : g ? (a.init(b), c.success) : c[0 < b ? "next" : "prev"]
                }, onButtonNavKbdClick: function (a) {
                    a = a.response;
                    var b = this.chart;
                    3 !== b.oldRangeSelectorItemState && this.fakeClickEvent(b.rangeSelector.buttons[b.highlightedRangeSelectorItemIx].element);
                    return a.success
                }, onAfterBtnClick: function () {
                    var a = this.chart,
                        b = q(a.xAxis[0]);
                    (a = a.langFormat("accessibility.rangeSelector.clickButtonAnnouncement", {chart: a, axisRangeDescription: b})) && this.announcer.announce(a)
                }, onInputKbdMove: function (a) {
                    var b = this.chart, c = b.rangeSelector, e = b.highlightedInputRangeIx = (b.highlightedInputRangeIx || 0) + a;
                    1 < e || 0 > e ? b.accessibility && (b.accessibility.keyboardNavigation.tabindexContainer.focus(), b.accessibility.keyboardNavigation[0 > a ? "prev" : "next"]()) : c && (a = c[e ? "maxDateBox" : "minDateBox"], c = c[e ? "maxInput" : "minInput"], a && c && b.setFocusToElement(a,
                        c))
                }, onInputNavInit: function (b) {
                    var c = this, f = this, e = this.chart, g = 0 < b ? 0 : 1, h = e.rangeSelector, m = h && h[g ? "maxDateBox" : "minDateBox"];
                    b = h && h.minInput;
                    h = h && h.maxInput;
                    e.highlightedInputRangeIx = g;
                    if (m && b && h) {
                        e.setFocusToElement(m, g ? h : b);
                        this.removeInputKeydownHandler && this.removeInputKeydownHandler();
                        e = function (a) {
                            (a.which || a.keyCode) === c.keyCodes.tab && (a.preventDefault(), a.stopPropagation(), f.onInputKbdMove(a.shiftKey ? -1 : 1))
                        };
                        var q = a(b, "keydown", e), l = a(h, "keydown", e);
                        this.removeInputKeydownHandler = function () {
                            q();
                            l()
                        }
                    }
                }, onInputNavTerminate: function () {
                    var a = this.chart.rangeSelector || {};
                    a.maxInput && a.hideInput("max");
                    a.minInput && a.hideInput("min");
                    this.removeInputKeydownHandler && (this.removeInputKeydownHandler(), delete this.removeInputKeydownHandler)
                }, initDropdownNav: function () {
                    var b = this, d = this.chart, f = d.rangeSelector, e = f && f.dropdown;
                    f && e && (d.setFocusToElement(f.buttonGroup, e), this.removeDropdownKeydownHandler && this.removeDropdownKeydownHandler(), this.removeDropdownKeydownHandler = a(e, "keydown", function (a) {
                        (a.which ||
                            a.keyCode) === b.keyCodes.tab && (a.preventDefault(), a.stopPropagation(), d.accessibility && (d.accessibility.keyboardNavigation.tabindexContainer.focus(), d.accessibility.keyboardNavigation[a.shiftKey ? "prev" : "next"]()))
                    }))
                }, getRangeSelectorButtonNavigation: function () {
                    var a = this.chart, b = this.keyCodes, f = this;
                    return new t(a, {
                        keyCodeMap: [[[b.left, b.right, b.up, b.down], function (a) {
                            return f.onButtonNavKbdArrowKey(this, a)
                        }], [[b.enter, b.space], function () {
                            return f.onButtonNavKbdClick(this)
                        }]], validate: function () {
                            return !!(a.rangeSelector &&
                                a.rangeSelector.buttons && a.rangeSelector.buttons.length)
                        }, init: function (b) {
                            var c = a.rangeSelector;
                            c && c.hasVisibleDropdown ? f.initDropdownNav() : c && (c = c.buttons.length - 1, a.highlightRangeSelectorButton(0 < b ? 0 : c))
                        }, terminate: function () {
                            f.removeDropdownKeydownHandler && (f.removeDropdownKeydownHandler(), delete f.removeDropdownKeydownHandler)
                        }
                    })
                }, getRangeSelectorInputNavigation: function () {
                    var a = this.chart, b = this;
                    return new t(a, {
                        keyCodeMap: [], validate: function () {
                            return !!(a.rangeSelector && a.rangeSelector.inputGroup &&
                                "hidden" !== a.rangeSelector.inputGroup.element.getAttribute("visibility") && !1 !== a.options.rangeSelector.inputEnabled && a.rangeSelector.minInput && a.rangeSelector.maxInput)
                        }, init: function (a) {
                            b.onInputNavInit(a)
                        }, terminate: function () {
                            b.onInputNavTerminate()
                        }
                    })
                }, getKeyboardNavigation: function () {
                    return [this.getRangeSelectorButtonNavigation(), this.getRangeSelectorInputNavigation()]
                }, destroy: function () {
                    this.removeDropdownKeydownHandler && this.removeDropdownKeydownHandler();
                    this.removeInputKeydownHandler && this.removeInputKeydownHandler();
                    this.announcer && this.announcer.destroy()
                }
            });
            return p
        });
        v(b, "Accessibility/Components/InfoRegionsComponent.js", [b["Core/Renderer/HTML/AST.js"], b["Core/Chart/Chart.js"], b["Core/FormatUtilities.js"], b["Core/Globals.js"], b["Core/Utilities.js"], b["Accessibility/AccessibilityComponent.js"], b["Accessibility/Utils/Announcer.js"], b["Accessibility/Components/AnnotationsA11y.js"], b["Accessibility/Utils/ChartUtilities.js"], b["Accessibility/Utils/HTMLUtilities.js"]], function (b, e, r, p, u, t, l, m, h, q) {
            var g = r.format,
                a = p.doc;
            r = u.extend;
            var c = u.pick, d = m.getAnnotationsInfoHTML, f = h.getAxisDescription, n = h.getAxisRangeDescription, w = h.getChartTitle, v = h.unhideChartElementFromAT, N = q.addClass, J = q.getElement, H = q.getHeadingTagNameForElement, F = q.setElAttrs, B = q.stripHTMLTagsFromString, D = q.visuallyHideElement;
            e.prototype.getTypeDescription = function (a) {
                var b = a[0], c = this.series && this.series[0] || {};
                c = {numSeries: this.series.length, numPoints: c.points && c.points.length, chart: this, mapTitle: c.mapTitle};
                if (!b) return this.langFormat("accessibility.chartTypes.emptyChart",
                    c);
                if ("map" === b) return c.mapTitle ? this.langFormat("accessibility.chartTypes.mapTypeDescription", c) : this.langFormat("accessibility.chartTypes.unknownMap", c);
                if (1 < this.types.length) return this.langFormat("accessibility.chartTypes.combinationChart", c);
                a = a[0];
                b = this.langFormat("accessibility.seriesTypeDescriptions." + a, c);
                var d = this.series && 2 > this.series.length ? "Single" : "Multiple";
                return (this.langFormat("accessibility.chartTypes." + a + d, c) || this.langFormat("accessibility.chartTypes.default" + d, c)) + (b ? " " +
                    b : "")
            };
            e = function () {
            };
            e.prototype = new t;
            r(e.prototype, {
                init: function () {
                    var a = this.chart, b = this;
                    this.initRegionsDefinitions();
                    this.addEvent(a, "aftergetTableAST", function (a) {
                        b.onDataTableCreated(a)
                    });
                    this.addEvent(a, "afterViewData", function (a) {
                        b.dataTableDiv = a;
                        setTimeout(function () {
                            b.focusDataTable()
                        }, 300)
                    });
                    this.announcer = new l(a, "assertive")
                }, initRegionsDefinitions: function () {
                    var a = this;
                    this.screenReaderSections = {
                        before: {
                            element: null, buildContent: function (b) {
                                var c = b.options.accessibility.screenReaderSection.beforeChartFormatter;
                                return c ? c(b) : a.defaultBeforeChartFormatter(b)
                            }, insertIntoDOM: function (a, b) {
                                b.renderTo.insertBefore(a, b.renderTo.firstChild)
                            }, afterInserted: function () {
                                "undefined" !== typeof a.sonifyButtonId && a.initSonifyButton(a.sonifyButtonId);
                                "undefined" !== typeof a.dataTableButtonId && a.initDataTableButton(a.dataTableButtonId)
                            }
                        }, after: {
                            element: null, buildContent: function (b) {
                                var c = b.options.accessibility.screenReaderSection.afterChartFormatter;
                                return c ? c(b) : a.defaultAfterChartFormatter()
                            }, insertIntoDOM: function (a, b) {
                                b.renderTo.insertBefore(a,
                                    b.container.nextSibling)
                            }
                        }
                    }
                }, onChartRender: function () {
                    var a = this;
                    this.linkedDescriptionElement = this.getLinkedDescriptionElement();
                    this.setLinkedDescriptionAttrs();
                    Object.keys(this.screenReaderSections).forEach(function (b) {
                        a.updateScreenReaderSection(b)
                    })
                }, getLinkedDescriptionElement: function () {
                    var b = this.chart.options.accessibility.linkedDescription;
                    if (b) {
                        if ("string" !== typeof b) return b;
                        b = g(b, this.chart);
                        b = a.querySelectorAll(b);
                        if (1 === b.length) return b[0]
                    }
                }, setLinkedDescriptionAttrs: function () {
                    var a =
                        this.linkedDescriptionElement;
                    a && (a.setAttribute("aria-hidden", "true"), N(a, "highcharts-linked-description"))
                }, updateScreenReaderSection: function (a) {
                    var c = this.chart, d = this.screenReaderSections[a], f = d.buildContent(c), e = d.element = d.element || this.createElement("div"), g = e.firstChild || this.createElement("div");
                    this.setScreenReaderSectionAttribs(e, a);
                    b.setElementHTML(g, f);
                    e.appendChild(g);
                    d.insertIntoDOM(e, c);
                    D(g);
                    v(c, g);
                    d.afterInserted && d.afterInserted()
                }, setScreenReaderSectionAttribs: function (a, b) {
                    var c =
                        this.chart, d = c.langFormat("accessibility.screenReaderSection." + b + "RegionLabel", {chart: c});
                    F(a, {id: "highcharts-screen-reader-region-" + b + "-" + c.index, "aria-label": d});
                    a.style.position = "relative";
                    "all" === c.options.accessibility.landmarkVerbosity && d && a.setAttribute("role", "region")
                }, defaultBeforeChartFormatter: function () {
                    var a = this.chart, b = a.options.accessibility.screenReaderSection.beforeChartFormat, c = this.getAxesDescription(), f = a.sonify && a.options.sonification && a.options.sonification.enabled, e = "highcharts-a11y-sonify-data-btn-" +
                        a.index, g = "hc-linkto-highcharts-data-table-" + a.index, h = d(a), m = a.langFormat("accessibility.screenReaderSection.annotations.heading", {chart: a});
                    c = {
                        headingTagName: H(a.renderTo),
                        chartTitle: w(a),
                        typeDescription: this.getTypeDescriptionText(),
                        chartSubtitle: this.getSubtitleText(),
                        chartLongdesc: this.getLongdescText(),
                        xAxisDescription: c.xAxis,
                        yAxisDescription: c.yAxis,
                        playAsSoundButton: f ? this.getSonifyButtonText(e) : "",
                        viewTableButton: a.getCSV ? this.getDataTableButtonText(g) : "",
                        annotationsTitle: h ? m : "",
                        annotationsList: h
                    };
                    a = p.i18nFormat(b, c, a);
                    this.dataTableButtonId = g;
                    this.sonifyButtonId = e;
                    return a.replace(/<(\w+)[^>]*?>\s*<\/\1>/g, "")
                }, defaultAfterChartFormatter: function () {
                    var a = this.chart, b = a.options.accessibility.screenReaderSection.afterChartFormat, c = {endOfChartMarker: this.getEndOfChartMarkerText()};
                    return p.i18nFormat(b, c, a).replace(/<(\w+)[^>]*?>\s*<\/\1>/g, "")
                }, getLinkedDescription: function () {
                    var a = this.linkedDescriptionElement;
                    return B(a && a.innerHTML || "")
                }, getLongdescText: function () {
                    var a = this.chart.options,
                        b = a.caption;
                    b = b && b.text;
                    var c = this.getLinkedDescription();
                    return a.accessibility.description || c || b || ""
                }, getTypeDescriptionText: function () {
                    var a = this.chart;
                    return a.types ? a.options.accessibility.typeDescription || a.getTypeDescription(a.types) : ""
                }, getDataTableButtonText: function (a) {
                    var b = this.chart;
                    b = b.langFormat("accessibility.table.viewAsDataTableButtonText", {chart: b, chartTitle: w(b)});
                    return '<button id="' + a + '">' + b + "</button>"
                }, getSonifyButtonText: function (a) {
                    var b = this.chart;
                    if (b.options.sonification &&
                        !1 === b.options.sonification.enabled) return "";
                    b = b.langFormat("accessibility.sonification.playAsSoundButtonText", {chart: b, chartTitle: w(b)});
                    return '<button id="' + a + '">' + b + "</button>"
                }, getSubtitleText: function () {
                    var a = this.chart.options.subtitle;
                    return B(a && a.text || "")
                }, getEndOfChartMarkerText: function () {
                    var a = this.chart, b = a.langFormat("accessibility.screenReaderSection.endOfChartMarker", {chart: a});
                    return '<div id="highcharts-end-of-chart-marker-' + a.index + '">' + b + "</div>"
                }, onDataTableCreated: function (a) {
                    var b =
                        this.chart;
                    if (b.options.accessibility.enabled) {
                        this.viewDataTableButton && this.viewDataTableButton.setAttribute("aria-expanded", "true");
                        var c = a.tree.attributes || {};
                        c.tabindex = -1;
                        c.summary = b.langFormat("accessibility.table.tableSummary", {chart: b});
                        a.tree.attributes = c
                    }
                }, focusDataTable: function () {
                    var a = this.dataTableDiv;
                    (a = a && a.getElementsByTagName("table")[0]) && a.focus && a.focus()
                }, initSonifyButton: function (a) {
                    var b = this, c = this.sonifyButton = J(a), d = this.chart, f = function (a) {
                        c && (c.setAttribute("aria-hidden",
                            "true"), c.setAttribute("aria-label", ""));
                        a.preventDefault();
                        a.stopPropagation();
                        a = d.langFormat("accessibility.sonification.playAsSoundClickAnnouncement", {chart: d});
                        b.announcer.announce(a);
                        setTimeout(function () {
                            c && (c.removeAttribute("aria-hidden"), c.removeAttribute("aria-label"));
                            d.sonify && d.sonify()
                        }, 1E3)
                    };
                    c && d && (F(c, {tabindex: -1}), c.onclick = function (a) {
                        (d.options.accessibility && d.options.accessibility.screenReaderSection.onPlayAsSoundClick || f).call(this, a, d)
                    })
                }, initDataTableButton: function (a) {
                    var b =
                        this.viewDataTableButton = J(a), c = this.chart;
                    a = a.replace("hc-linkto-", "");
                    b && (F(b, {tabindex: -1, "aria-expanded": !!J(a)}), b.onclick = c.options.accessibility.screenReaderSection.onViewDataTableClick || function () {
                        c.viewData()
                    })
                }, getAxesDescription: function () {
                    var a = this.chart, b = function (b, d) {
                        b = a[b];
                        return 1 < b.length || b[0] && c(b[0].options.accessibility && b[0].options.accessibility.enabled, d)
                    }, d = !!a.types && 0 > a.types.indexOf("map"), f = !!a.hasCartesianSeries, e = b("xAxis", !a.angular && f && d);
                    b = b("yAxis", f && d);
                    d = {};
                    e && (d.xAxis = this.getAxisDescriptionText("xAxis"));
                    b && (d.yAxis = this.getAxisDescriptionText("yAxis"));
                    return d
                }, getAxisDescriptionText: function (a) {
                    var b = this.chart, c = b[a];
                    return b.langFormat("accessibility.axis." + a + "Description" + (1 < c.length ? "Plural" : "Singular"), {
                        chart: b, names: c.map(function (a) {
                            return f(a)
                        }), ranges: c.map(function (a) {
                            return n(a)
                        }), numAxes: c.length
                    })
                }, destroy: function () {
                    this.announcer && this.announcer.destroy()
                }
            });
            return e
        });
        v(b, "Accessibility/Components/ContainerComponent.js", [b["Accessibility/AccessibilityComponent.js"],
            b["Accessibility/KeyboardNavigationHandler.js"], b["Accessibility/Utils/ChartUtilities.js"], b["Core/Globals.js"], b["Accessibility/Utils/HTMLUtilities.js"], b["Core/Utilities.js"]], function (b, e, r, p, u, t) {
            var l = r.unhideChartElementFromAT, m = r.getChartTitle, h = p.doc, q = u.stripHTMLTagsFromString;
            r = t.extend;
            p = function () {
            };
            p.prototype = new b;
            r(p.prototype, {
                onChartUpdate: function () {
                    this.handleSVGTitleElement();
                    this.setSVGContainerLabel();
                    this.setGraphicContainerAttrs();
                    this.setRenderToAttrs();
                    this.makeCreditsAccessible()
                },
                handleSVGTitleElement: function () {
                    var b = this.chart, a = "highcharts-title-" + b.index, c = q(b.langFormat("accessibility.svgContainerTitle", {chartTitle: m(b)}));
                    if (c.length) {
                        var d = this.svgTitleElement = this.svgTitleElement || h.createElementNS("http://www.w3.org/2000/svg", "title");
                        d.textContent = c;
                        d.id = a;
                        b.renderTo.insertBefore(d, b.renderTo.firstChild)
                    }
                }, setSVGContainerLabel: function () {
                    var b = this.chart, a = b.langFormat("accessibility.svgContainerLabel", {chartTitle: m(b)});
                    b.renderer.box && a.length && b.renderer.box.setAttribute("aria-label",
                        a)
                }, setGraphicContainerAttrs: function () {
                    var b = this.chart, a = b.langFormat("accessibility.graphicContainerLabel", {chartTitle: m(b)});
                    a.length && b.container.setAttribute("aria-label", a)
                }, setRenderToAttrs: function () {
                    var b = this.chart;
                    "disabled" !== b.options.accessibility.landmarkVerbosity ? b.renderTo.setAttribute("role", "region") : b.renderTo.removeAttribute("role");
                    b.renderTo.setAttribute("aria-label", b.langFormat("accessibility.chartContainerLabel", {title: m(b), chart: b}))
                }, makeCreditsAccessible: function () {
                    var b =
                        this.chart, a = b.credits;
                    a && (a.textStr && a.element.setAttribute("aria-label", b.langFormat("accessibility.credits", {creditsStr: q(a.textStr)})), l(b, a.element))
                }, getKeyboardNavigation: function () {
                    var b = this.chart;
                    return new e(b, {
                        keyCodeMap: [], validate: function () {
                            return !0
                        }, init: function () {
                            var a = b.accessibility;
                            a && a.keyboardNavigation.tabindexContainer.focus()
                        }
                    })
                }, destroy: function () {
                    this.chart.renderTo.setAttribute("aria-hidden", !0)
                }
            });
            return p
        });
        v(b, "Accessibility/HighContrastMode.js", [b["Core/Globals.js"]],
            function (b) {
                var e = b.doc, r = b.isMS, p = b.win;
                return {
                    isHighContrastModeActive: function () {
                        var b = /(Edg)/.test(p.navigator.userAgent);
                        if (p.matchMedia && b) return p.matchMedia("(-ms-high-contrast: active)").matches;
                        if (r && p.getComputedStyle) {
                            b = e.createElement("div");
                            b.style.backgroundImage = "url(data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==)";
                            e.body.appendChild(b);
                            var t = (b.currentStyle || p.getComputedStyle(b)).backgroundImage;
                            e.body.removeChild(b);
                            return "none" === t
                        }
                        return !1
                    }, setHighContrastTheme: function (b) {
                        b.highContrastModeActive =
                            !0;
                        var e = b.options.accessibility.highContrastTheme;
                        b.update(e, !1);
                        b.series.forEach(function (b) {
                            var m = e.plotOptions[b.type] || {};
                            b.update({color: m.color || "windowText", colors: [m.color || "windowText"], borderColor: m.borderColor || "window"});
                            b.points.forEach(function (b) {
                                b.options && b.options.color && b.update({color: m.color || "windowText", borderColor: m.borderColor || "window"}, !1)
                            })
                        });
                        b.redraw()
                    }
                }
            });
        v(b, "Accessibility/HighContrastTheme.js", [], function () {
            return {
                chart: {backgroundColor: "window"},
                title: {style: {color: "windowText"}},
                subtitle: {style: {color: "windowText"}},
                colorAxis: {minColor: "windowText", maxColor: "windowText", stops: []},
                colors: ["windowText"],
                xAxis: {gridLineColor: "windowText", labels: {style: {color: "windowText"}}, lineColor: "windowText", minorGridLineColor: "windowText", tickColor: "windowText", title: {style: {color: "windowText"}}},
                yAxis: {gridLineColor: "windowText", labels: {style: {color: "windowText"}}, lineColor: "windowText", minorGridLineColor: "windowText", tickColor: "windowText", title: {style: {color: "windowText"}}},
                tooltip: {
                    backgroundColor: "window",
                    borderColor: "windowText", style: {color: "windowText"}
                },
                plotOptions: {
                    series: {lineColor: "windowText", fillColor: "window", borderColor: "windowText", edgeColor: "windowText", borderWidth: 1, dataLabels: {connectorColor: "windowText", color: "windowText", style: {color: "windowText", textOutline: "none"}}, marker: {lineColor: "windowText", fillColor: "windowText"}},
                    pie: {color: "window", colors: ["window"], borderColor: "windowText", borderWidth: 1},
                    boxplot: {fillColor: "window"},
                    candlestick: {lineColor: "windowText", fillColor: "window"},
                    errorbar: {fillColor: "window"}
                },
                legend: {backgroundColor: "window", itemStyle: {color: "windowText"}, itemHoverStyle: {color: "windowText"}, itemHiddenStyle: {color: "#555"}, title: {style: {color: "windowText"}}},
                credits: {style: {color: "windowText"}},
                labels: {style: {color: "windowText"}},
                drilldown: {activeAxisLabelStyle: {color: "windowText"}, activeDataLabelStyle: {color: "windowText"}},
                navigation: {buttonOptions: {symbolStroke: "windowText", theme: {fill: "window"}}},
                rangeSelector: {
                    buttonTheme: {
                        fill: "window", stroke: "windowText",
                        style: {color: "windowText"}, states: {hover: {fill: "window", stroke: "windowText", style: {color: "windowText"}}, select: {fill: "#444", stroke: "windowText", style: {color: "windowText"}}}
                    }, inputBoxBorderColor: "windowText", inputStyle: {backgroundColor: "window", color: "windowText"}, labelStyle: {color: "windowText"}
                },
                navigator: {handles: {backgroundColor: "window", borderColor: "windowText"}, outlineColor: "windowText", maskFill: "transparent", series: {color: "windowText", lineColor: "windowText"}, xAxis: {gridLineColor: "windowText"}},
                scrollbar: {barBackgroundColor: "#444", barBorderColor: "windowText", buttonArrowColor: "windowText", buttonBackgroundColor: "window", buttonBorderColor: "windowText", rifleColor: "windowText", trackBackgroundColor: "window", trackBorderColor: "windowText"}
            }
        });
        v(b, "Accessibility/Options/Options.js", [b["Core/Color/Palette.js"]], function (b) {
            return {
                accessibility: {
                    enabled: !0, screenReaderSection: {
                        beforeChartFormat: "<{headingTagName}>{chartTitle}</{headingTagName}><div>{typeDescription}</div><div>{chartSubtitle}</div><div>{chartLongdesc}</div><div>{playAsSoundButton}</div><div>{viewTableButton}</div><div>{xAxisDescription}</div><div>{yAxisDescription}</div><div>{annotationsTitle}{annotationsList}</div>",
                        afterChartFormat: "{endOfChartMarker}", axisRangeDateFormat: "%Y-%m-%d %H:%M:%S"
                    }, series: {describeSingleSeries: !1, pointDescriptionEnabledThreshold: 200}, point: {valueDescriptionFormat: "{index}. {xDescription}{separator}{value}."}, landmarkVerbosity: "all", linkedDescription: '*[data-highcharts-chart="{index}"] + .highcharts-description', keyboardNavigation: {
                        enabled: !0, focusBorder: {enabled: !0, hideBrowserFocusOutline: !0, style: {color: b.highlightColor80, lineWidth: 2, borderRadius: 3}, margin: 2}, order: ["series", "zoom",
                            "rangeSelector", "legend", "chartMenu"], wrapAround: !0, seriesNavigation: {skipNullPoints: !0, pointNavigationEnabledThreshold: !1}
                    }, announceNewData: {enabled: !1, minAnnounceInterval: 5E3, interruptUser: !1}
                }, legend: {accessibility: {enabled: !0, keyboardNavigation: {enabled: !0}}}, exporting: {accessibility: {enabled: !0}}
            }
        });
        v(b, "Accessibility/Options/LangOptions.js", [], function () {
            return {
                accessibility: {
                    defaultChartTitle: "Chart",
                    chartContainerLabel: "{title}. Highcharts interactive chart.",
                    svgContainerLabel: "Interactive chart",
                    drillUpButton: "{buttonText}",
                    credits: "Chart credits: {creditsStr}",
                    thousandsSep: ",",
                    svgContainerTitle: "",
                    graphicContainerLabel: "",
                    screenReaderSection: {
                        beforeRegionLabel: "Chart screen reader information.",
                        afterRegionLabel: "",
                        annotations: {heading: "Chart annotations summary", descriptionSinglePoint: "{annotationText}. Related to {annotationPoint}", descriptionMultiplePoints: "{annotationText}. Related to {annotationPoint}{ Also related to, #each(additionalAnnotationPoints)}", descriptionNoPoints: "{annotationText}"},
                        endOfChartMarker: "End of interactive chart."
                    },
                    sonification: {playAsSoundButtonText: "Play as sound, {chartTitle}", playAsSoundClickAnnouncement: "Play"},
                    legend: {legendLabelNoTitle: "Toggle series visibility", legendLabel: "Chart legend: {legendTitle}", legendItem: "Show {itemName}"},
                    zoom: {mapZoomIn: "Zoom chart", mapZoomOut: "Zoom out chart", resetZoomButton: "Reset zoom"},
                    rangeSelector: {dropdownLabel: "{rangeTitle}", minInputLabel: "Select start date.", maxInputLabel: "Select end date.", clickButtonAnnouncement: "Viewing {axisRangeDescription}"},
                    table: {viewAsDataTableButtonText: "View as data table, {chartTitle}", tableSummary: "Table representation of chart."},
                    announceNewData: {
                        newDataAnnounce: "Updated data for chart {chartTitle}",
                        newSeriesAnnounceSingle: "New data series: {seriesDesc}",
                        newPointAnnounceSingle: "New data point: {pointDesc}",
                        newSeriesAnnounceMultiple: "New data series in chart {chartTitle}: {seriesDesc}",
                        newPointAnnounceMultiple: "New data point in chart {chartTitle}: {pointDesc}"
                    },
                    seriesTypeDescriptions: {
                        boxplot: "Box plot charts are typically used to display groups of statistical data. Each data point in the chart can have up to 5 values: minimum, lower quartile, median, upper quartile, and maximum.",
                        arearange: "Arearange charts are line charts displaying a range between a lower and higher value for each point.",
                        areasplinerange: "These charts are line charts displaying a range between a lower and higher value for each point.",
                        bubble: "Bubble charts are scatter charts where each data point also has a size value.",
                        columnrange: "Columnrange charts are column charts displaying a range between a lower and higher value for each point.",
                        errorbar: "Errorbar series are used to display the variability of the data.",
                        funnel: "Funnel charts are used to display reduction of data in stages.",
                        pyramid: "Pyramid charts consist of a single pyramid with item heights corresponding to each point value.",
                        waterfall: "A waterfall chart is a column chart where each column contributes towards a total end value."
                    },
                    chartTypes: {
                        emptyChart: "Empty chart",
                        mapTypeDescription: "Map of {mapTitle} with {numSeries} data series.",
                        unknownMap: "Map of unspecified region with {numSeries} data series.",
                        combinationChart: "Combination chart with {numSeries} data series.",
                        defaultSingle: "Chart with {numPoints} data {#plural(numPoints, points, point)}.",
                        defaultMultiple: "Chart with {numSeries} data series.",
                        splineSingle: "Line chart with {numPoints} data {#plural(numPoints, points, point)}.",
                        splineMultiple: "Line chart with {numSeries} lines.",
                        lineSingle: "Line chart with {numPoints} data {#plural(numPoints, points, point)}.",
                        lineMultiple: "Line chart with {numSeries} lines.",
                        columnSingle: "Bar chart with {numPoints} {#plural(numPoints, bars, bar)}.",
                        columnMultiple: "Bar chart with {numSeries} data series.",
                        barSingle: "Bar chart with {numPoints} {#plural(numPoints, bars, bar)}.",
                        barMultiple: "Bar chart with {numSeries} data series.",
                        pieSingle: "Pie chart with {numPoints} {#plural(numPoints, slices, slice)}.",
                        pieMultiple: "Pie chart with {numSeries} pies.",
                        scatterSingle: "Scatter chart with {numPoints} {#plural(numPoints, points, point)}.",
                        scatterMultiple: "Scatter chart with {numSeries} data series.",
                        boxplotSingle: "Boxplot with {numPoints} {#plural(numPoints, boxes, box)}.",
                        boxplotMultiple: "Boxplot with {numSeries} data series.",
                        bubbleSingle: "Bubble chart with {numPoints} {#plural(numPoints, bubbles, bubble)}.",
                        bubbleMultiple: "Bubble chart with {numSeries} data series."
                    },
                    axis: {
                        xAxisDescriptionSingular: "The chart has 1 X axis displaying {names[0]}. {ranges[0]}",
                        xAxisDescriptionPlural: "The chart has {numAxes} X axes displaying {#each(names, -1) }and {names[-1]}.",
                        yAxisDescriptionSingular: "The chart has 1 Y axis displaying {names[0]}. {ranges[0]}",
                        yAxisDescriptionPlural: "The chart has {numAxes} Y axes displaying {#each(names, -1) }and {names[-1]}.",
                        timeRangeDays: "Range: {range} days.",
                        timeRangeHours: "Range: {range} hours.",
                        timeRangeMinutes: "Range: {range} minutes.",
                        timeRangeSeconds: "Range: {range} seconds.",
                        rangeFromTo: "Range: {rangeFrom} to {rangeTo}.",
                        rangeCategories: "Range: {numCategories} categories."
                    },
                    exporting: {chartMenuLabel: "Chart menu", menuButtonLabel: "View chart menu", exportRegionLabel: "Chart menu"},
                    series: {
                        summary: {
                            "default": "{name}, series {ix} of {numSeries} with {numPoints} data {#plural(numPoints, points, point)}.",
                            defaultCombination: "{name}, series {ix} of {numSeries} with {numPoints} data {#plural(numPoints, points, point)}.",
                            line: "{name}, line {ix} of {numSeries} with {numPoints} data {#plural(numPoints, points, point)}.",
                            lineCombination: "{name}, series {ix} of {numSeries}. Line with {numPoints} data {#plural(numPoints, points, point)}.",
                            spline: "{name}, line {ix} of {numSeries} with {numPoints} data {#plural(numPoints, points, point)}.",
                            splineCombination: "{name}, series {ix} of {numSeries}. Line with {numPoints} data {#plural(numPoints, points, point)}.",
                            column: "{name}, bar series {ix} of {numSeries} with {numPoints} {#plural(numPoints, bars, bar)}.",
                            columnCombination: "{name}, series {ix} of {numSeries}. Bar series with {numPoints} {#plural(numPoints, bars, bar)}.",
                            bar: "{name}, bar series {ix} of {numSeries} with {numPoints} {#plural(numPoints, bars, bar)}.",
                            barCombination: "{name}, series {ix} of {numSeries}. Bar series with {numPoints} {#plural(numPoints, bars, bar)}.",
                            pie: "{name}, pie {ix} of {numSeries} with {numPoints} {#plural(numPoints, slices, slice)}.",
                            pieCombination: "{name}, series {ix} of {numSeries}. Pie with {numPoints} {#plural(numPoints, slices, slice)}.",
                            scatter: "{name}, scatter plot {ix} of {numSeries} with {numPoints} {#plural(numPoints, points, point)}.",
                            scatterCombination: "{name}, series {ix} of {numSeries}, scatter plot with {numPoints} {#plural(numPoints, points, point)}.",
                            boxplot: "{name}, boxplot {ix} of {numSeries} with {numPoints} {#plural(numPoints, boxes, box)}.",
                            boxplotCombination: "{name}, series {ix} of {numSeries}. Boxplot with {numPoints} {#plural(numPoints, boxes, box)}.",
                            bubble: "{name}, bubble series {ix} of {numSeries} with {numPoints} {#plural(numPoints, bubbles, bubble)}.",
                            bubbleCombination: "{name}, series {ix} of {numSeries}. Bubble series with {numPoints} {#plural(numPoints, bubbles, bubble)}.",
                            map: "{name}, map {ix} of {numSeries} with {numPoints} {#plural(numPoints, areas, area)}.",
                            mapCombination: "{name}, series {ix} of {numSeries}. Map with {numPoints} {#plural(numPoints, areas, area)}.",
                            mapline: "{name}, line {ix} of {numSeries} with {numPoints} data {#plural(numPoints, points, point)}.",
                            maplineCombination: "{name}, series {ix} of {numSeries}. Line with {numPoints} data {#plural(numPoints, points, point)}.",
                            mapbubble: "{name}, bubble series {ix} of {numSeries} with {numPoints} {#plural(numPoints, bubbles, bubble)}.",
                            mapbubbleCombination: "{name}, series {ix} of {numSeries}. Bubble series with {numPoints} {#plural(numPoints, bubbles, bubble)}."
                        }, description: "{description}", xAxisDescription: "X axis, {name}", yAxisDescription: "Y axis, {name}", nullPointValue: "No value", pointAnnotationsDescription: "{Annotation: #each(annotations). }"
                    }
                }
            }
        });
        v(b, "Accessibility/Options/DeprecatedOptions.js", [b["Core/Utilities.js"]],
            function (b) {
                function e(b, e, g) {
                    for (var a, c = 0; c < e.length - 1; ++c) a = e[c], b = b[a] = m(b[a], {});
                    b[e[e.length - 1]] = g
                }

                function r(b, m, g, a) {
                    function c(a, b) {
                        return b.reduce(function (a, b) {
                            return a[b]
                        }, a)
                    }

                    var d = c(b.options, m), f = c(b.options, g);
                    Object.keys(a).forEach(function (c) {
                        var h, n = d[c];
                        "undefined" !== typeof n && (e(f, a[c], n), l(32, !1, b, (h = {}, h[m.join(".") + "." + c] = g.join(".") + "." + a[c].join("."), h)))
                    })
                }

                function p(b) {
                    var e = b.options.chart, g = b.options.accessibility || {};
                    ["description", "typeDescription"].forEach(function (a) {
                        var c;
                        e[a] && (g[a] = e[a], l(32, !1, b, (c = {}, c["chart." + a] = "use accessibility." + a, c)))
                    })
                }

                function u(b) {
                    b.axes.forEach(function (e) {
                        (e = e.options) && e.description && (e.accessibility = e.accessibility || {}, e.accessibility.description = e.description, l(32, !1, b, {"axis.description": "use axis.accessibility.description"}))
                    })
                }

                function t(b) {
                    var h = {
                        description: ["accessibility", "description"], exposeElementToA11y: ["accessibility", "exposeAsGroupOnly"], pointDescriptionFormatter: ["accessibility", "pointDescriptionFormatter"], skipKeyboardNavigation: ["accessibility",
                            "keyboardNavigation", "enabled"]
                    };
                    b.series.forEach(function (g) {
                        Object.keys(h).forEach(function (a) {
                            var c, d = g.options[a];
                            "undefined" !== typeof d && (e(g.options, h[a], "skipKeyboardNavigation" === a ? !d : d), l(32, !1, b, (c = {}, c["series." + a] = "series." + h[a].join("."), c)))
                        })
                    })
                }

                var l = b.error, m = b.pick;
                return function (b) {
                    p(b);
                    u(b);
                    b.series && t(b);
                    r(b, ["accessibility"], ["accessibility"], {
                        pointDateFormat: ["point", "dateFormat"],
                        pointDateFormatter: ["point", "dateFormatter"],
                        pointDescriptionFormatter: ["point", "descriptionFormatter"],
                        pointDescriptionThreshold: ["series", "pointDescriptionEnabledThreshold"],
                        pointNavigationThreshold: ["keyboardNavigation", "seriesNavigation", "pointNavigationEnabledThreshold"],
                        pointValueDecimals: ["point", "valueDecimals"],
                        pointValuePrefix: ["point", "valuePrefix"],
                        pointValueSuffix: ["point", "valueSuffix"],
                        screenReaderSectionFormatter: ["screenReaderSection", "beforeChartFormatter"],
                        describeSingleSeries: ["series", "describeSingleSeries"],
                        seriesDescriptionFormatter: ["series", "descriptionFormatter"],
                        onTableAnchorClick: ["screenReaderSection",
                            "onViewDataTableClick"],
                        axisRangeDateFormat: ["screenReaderSection", "axisRangeDateFormat"]
                    });
                    r(b, ["accessibility", "keyboardNavigation"], ["accessibility", "keyboardNavigation", "seriesNavigation"], {skipNullPoints: ["skipNullPoints"], mode: ["mode"]});
                    r(b, ["lang", "accessibility"], ["lang", "accessibility"], {
                        legendItem: ["legend", "legendItem"],
                        legendLabel: ["legend", "legendLabel"],
                        mapZoomIn: ["zoom", "mapZoomIn"],
                        mapZoomOut: ["zoom", "mapZoomOut"],
                        resetZoomButton: ["zoom", "resetZoomButton"],
                        screenReaderRegionLabel: ["screenReaderSection",
                            "beforeRegionLabel"],
                        rangeSelectorButton: ["rangeSelector", "buttonText"],
                        rangeSelectorMaxInput: ["rangeSelector", "maxInputLabel"],
                        rangeSelectorMinInput: ["rangeSelector", "minInputLabel"],
                        svgContainerEnd: ["screenReaderSection", "endOfChartMarker"],
                        viewAsDataTable: ["table", "viewAsDataTableButtonText"],
                        tableSummary: ["table", "tableSummary"]
                    })
                }
            });
        v(b, "Accessibility/A11yI18n.js", [b["Core/Chart/Chart.js"], b["Core/Globals.js"], b["Core/FormatUtilities.js"], b["Core/Utilities.js"]], function (b, e, r, p) {
            function u(b,
                       e) {
                var h = b.indexOf("#each("), g = b.indexOf("#plural("), a = b.indexOf("["), c = b.indexOf("]");
                if (-1 < h) {
                    c = b.slice(h).indexOf(")") + h;
                    g = b.substring(0, h);
                    a = b.substring(c + 1);
                    c = b.substring(h + 6, c).split(",");
                    h = Number(c[1]);
                    b = "";
                    if (e = e[c[0]]) for (h = isNaN(h) ? e.length : h, h = 0 > h ? e.length + h : Math.min(h, e.length), c = 0; c < h; ++c) b += g + e[c] + a;
                    return b.length ? b : ""
                }
                if (-1 < g) {
                    a = b.slice(g).indexOf(")") + g;
                    g = b.substring(g + 8, a).split(",");
                    switch (Number(e[g[0]])) {
                        case 0:
                            b = l(g[4], g[1]);
                            break;
                        case 1:
                            b = l(g[2], g[1]);
                            break;
                        case 2:
                            b = l(g[3],
                                g[1]);
                            break;
                        default:
                            b = g[1]
                    }
                    b ? (e = b, e = e.trim && e.trim() || e.replace(/^\s+|\s+$/g, "")) : e = "";
                    return e
                }
                return -1 < a ? (g = b.substring(0, a), a = Number(b.substring(a + 1, c)), b = void 0, e = e[g], !isNaN(a) && e && (0 > a ? (b = e[e.length + a], "undefined" === typeof b && (b = e[0])) : (b = e[a], "undefined" === typeof b && (b = e[e.length - 1]))), "undefined" !== typeof b ? b : "") : "{" + b + "}"
            }

            var t = r.format, l = p.pick;
            e.i18nFormat = function (b, e, l) {
                var g = function (a, b) {
                    a = a.slice(b || 0);
                    var c = a.indexOf("{"), d = a.indexOf("}");
                    if (-1 < c && d > c) return {
                        statement: a.substring(c +
                            1, d), begin: b + c + 1, end: b + d
                    }
                }, a = [], c = 0;
                do {
                    var d = g(b, c);
                    var f = b.substring(c, d && d.begin - 1);
                    f.length && a.push({value: f, type: "constant"});
                    d && a.push({value: d.statement, type: "statement"});
                    c = d ? d.end + 1 : c + 1
                } while (d);
                a.forEach(function (a) {
                    "statement" === a.type && (a.value = u(a.value, e))
                });
                return t(a.reduce(function (a, b) {
                    return a + b.value
                }, ""), e, l)
            };
            b.prototype.langFormat = function (b, h) {
                b = b.split(".");
                for (var l = this.options.lang, g = 0; g < b.length; ++g) l = l && l[b[g]];
                return "string" === typeof l ? e.i18nFormat(l, h, this) : ""
            }
        });
        v(b,
            "Accessibility/FocusBorder.js", [b["Core/Chart/Chart.js"], b["Core/Globals.js"], b["Core/Renderer/SVG/SVGElement.js"], b["Core/Renderer/SVG/SVGLabel.js"], b["Core/Utilities.js"]], function (b, e, r, p, u) {
                function t(a) {
                    if (!a.focusBorderDestroyHook) {
                        var b = a.destroy;
                        a.destroy = function () {
                            a.focusBorder && a.focusBorder.destroy && a.focusBorder.destroy();
                            return b.apply(a, arguments)
                        };
                        a.focusBorderDestroyHook = b
                    }
                }

                function l(b) {
                    for (var c = [], e = 1; e < arguments.length; e++) c[e - 1] = arguments[e];
                    b.focusBorderUpdateHooks || (b.focusBorderUpdateHooks =
                        {}, a.forEach(function (a) {
                        a += "Setter";
                        var d = b[a] || b._defaultSetter;
                        b.focusBorderUpdateHooks[a] = d;
                        b[a] = function () {
                            var a = d.apply(b, arguments);
                            b.addFocusBorder.apply(b, c);
                            return a
                        }
                    }))
                }

                function m(a) {
                    a.focusBorderUpdateHooks && (Object.keys(a.focusBorderUpdateHooks).forEach(function (b) {
                        var c = a.focusBorderUpdateHooks[b];
                        c === a._defaultSetter ? delete a[b] : a[b] = c
                    }), delete a.focusBorderUpdateHooks)
                }

                var h = u.addEvent, q = u.extend, g = u.pick, a = "x y transform width height r d stroke-width".split(" ");
                q(r.prototype, {
                    addFocusBorder: function (a,
                                              b) {
                        this.focusBorder && this.removeFocusBorder();
                        var c = this.getBBox(), d = g(a, 3);
                        c.x += this.translateX ? this.translateX : 0;
                        c.y += this.translateY ? this.translateY : 0;
                        var h = c.x - d, m = c.y - d, q = c.width + 2 * d, r = c.height + 2 * d, u = this instanceof p;
                        if ("text" === this.element.nodeName || u) {
                            var v = !!this.rotation;
                            if (u) var w = {x: v ? 1 : 0, y: 0}; else {
                                var D = w = 0;
                                "middle" === this.attr("text-anchor") ? (w = e.isFirefox && this.rotation ? .25 : .5, D = e.isFirefox && !this.rotation ? .75 : .5) : this.rotation ? w = .25 : D = .75;
                                w = {x: w, y: D}
                            }
                            D = +this.attr("x");
                            var y = +this.attr("y");
                            isNaN(D) || (h = D - c.width * w.x - d);
                            isNaN(y) || (m = y - c.height * w.y - d);
                            u && v && (u = q, q = r, r = u, isNaN(D) || (h = D - c.height * w.x - d), isNaN(y) || (m = y - c.width * w.y - d))
                        }
                        this.focusBorder = this.renderer.rect(h, m, q, r, parseInt((b && b.r || 0).toString(), 10)).addClass("highcharts-focus-border").attr({zIndex: 99}).add(this.parentGroup);
                        this.renderer.styledMode || this.focusBorder.attr({stroke: b && b.stroke, "stroke-width": b && b.strokeWidth});
                        l(this, a, b);
                        t(this)
                    }, removeFocusBorder: function () {
                        m(this);
                        this.focusBorderDestroyHook && (this.destroy =
                            this.focusBorderDestroyHook, delete this.focusBorderDestroyHook);
                        this.focusBorder && (this.focusBorder.destroy(), delete this.focusBorder)
                    }
                });
                b.prototype.renderFocusBorder = function () {
                    var a = this.focusElement, b = this.options.accessibility.keyboardNavigation.focusBorder;
                    a && (a.removeFocusBorder(), b.enabled && a.addFocusBorder(b.margin, {stroke: b.style.color, strokeWidth: b.style.lineWidth, r: b.style.borderRadius}))
                };
                b.prototype.setFocusToElement = function (a, b) {
                    var c = this.options.accessibility.keyboardNavigation.focusBorder;
                    (b = b || a.element) && b.focus && (b.hcEvents && b.hcEvents.focusin || h(b, "focusin", function () {
                    }), b.focus(), c.hideBrowserFocusOutline && (b.style.outline = "none"));
                    this.focusElement && this.focusElement.removeFocusBorder();
                    this.focusElement = a;
                    this.renderFocusBorder()
                }
            });
        v(b, "Accessibility/Accessibility.js", [b["Core/Chart/Chart.js"], b["Accessibility/Utils/ChartUtilities.js"], b["Core/Globals.js"], b["Accessibility/KeyboardNavigationHandler.js"], b["Core/DefaultOptions.js"], b["Core/Series/Point.js"], b["Core/Series/Series.js"],
            b["Core/Utilities.js"], b["Accessibility/AccessibilityComponent.js"], b["Accessibility/KeyboardNavigation.js"], b["Accessibility/Components/LegendComponent.js"], b["Accessibility/Components/MenuComponent.js"], b["Accessibility/Components/SeriesComponent/SeriesComponent.js"], b["Accessibility/Components/ZoomComponent.js"], b["Accessibility/Components/RangeSelectorComponent.js"], b["Accessibility/Components/InfoRegionsComponent.js"], b["Accessibility/Components/ContainerComponent.js"], b["Accessibility/HighContrastMode.js"],
            b["Accessibility/HighContrastTheme.js"], b["Accessibility/Options/Options.js"], b["Accessibility/Options/LangOptions.js"], b["Accessibility/Options/DeprecatedOptions.js"], b["Accessibility/Utils/HTMLUtilities.js"]], function (b, e, r, p, u, t, l, m, h, q, g, a, c, d, f, n, v, C, N, J, H, F, B) {
            function w(a) {
                this.init(a)
            }

            var y = r.doc, x = m.addEvent, z = m.extend, E = m.fireEvent, M = m.merge;
            M(!0, u.defaultOptions, J, {accessibility: {highContrastTheme: N}, lang: H});
            r.A11yChartUtilities = e;
            r.A11yHTMLUtilities = B;
            r.KeyboardNavigationHandler = p;
            r.AccessibilityComponent =
                h;
            w.prototype = {
                init: function (a) {
                    this.chart = a;
                    y.addEventListener && a.renderer.isSVG ? (F(a), this.initComponents(), this.keyboardNavigation = new q(a, this.components), this.update()) : a.renderTo.setAttribute("aria-hidden", !0)
                }, initComponents: function () {
                    var b = this.chart, e = b.options.accessibility;
                    this.components = {container: new v, infoRegions: new n, legend: new g, chartMenu: new a, rangeSelector: new f, series: new c, zoom: new d};
                    e.customComponents && z(this.components, e.customComponents);
                    var h = this.components;
                    this.getComponentOrder().forEach(function (a) {
                        h[a].initBase(b);
                        h[a].init()
                    })
                }, getComponentOrder: function () {
                    if (!this.components) return [];
                    if (!this.components.series) return Object.keys(this.components);
                    var a = Object.keys(this.components).filter(function (a) {
                        return "series" !== a
                    });
                    return ["series"].concat(a)
                }, update: function () {
                    var a = this.components, b = this.chart, c = b.options.accessibility;
                    E(b, "beforeA11yUpdate");
                    b.types = this.getChartTypes();
                    this.getComponentOrder().forEach(function (c) {
                        a[c].onChartUpdate();
                        E(b, "afterA11yComponentUpdate", {name: c, component: a[c]})
                    });
                    this.keyboardNavigation.update(c.keyboardNavigation.order);
                    !b.highContrastModeActive && C.isHighContrastModeActive() && C.setHighContrastTheme(b);
                    E(b, "afterA11yUpdate", {accessibility: this})
                }, destroy: function () {
                    var a = this.chart || {}, b = this.components;
                    Object.keys(b).forEach(function (a) {
                        b[a].destroy();
                        b[a].destroyBase()
                    });
                    this.keyboardNavigation && this.keyboardNavigation.destroy();
                    a.renderTo && a.renderTo.setAttribute("aria-hidden", !0);
                    a.focusElement && a.focusElement.removeFocusBorder()
                }, getChartTypes: function () {
                    var a = {};
                    this.chart.series.forEach(function (b) {
                        a[b.type] =
                            1
                    });
                    return Object.keys(a)
                }
            };
            b.prototype.updateA11yEnabled = function () {
                var a = this.accessibility, b = this.options.accessibility;
                b && b.enabled ? a ? a.update() : this.accessibility = new w(this) : a ? (a.destroy && a.destroy(), delete this.accessibility) : this.renderTo.setAttribute("aria-hidden", !0)
            };
            x(b, "render", function (a) {
                this.a11yDirty && this.renderTo && (delete this.a11yDirty, this.updateA11yEnabled());
                var b = this.accessibility;
                b && b.getComponentOrder().forEach(function (a) {
                    b.components[a].onChartRender()
                })
            });
            x(b, "update",
                function (a) {
                    if (a = a.options.accessibility) a.customComponents && (this.options.accessibility.customComponents = a.customComponents, delete a.customComponents), M(!0, this.options.accessibility, a), this.accessibility && this.accessibility.destroy && (this.accessibility.destroy(), delete this.accessibility);
                    this.a11yDirty = !0
                });
            x(t, "update", function () {
                this.series.chart.accessibility && (this.series.chart.a11yDirty = !0)
            });
            ["addSeries", "init"].forEach(function (a) {
                x(b, a, function () {
                    this.a11yDirty = !0
                })
            });
            ["update", "updatedData",
                "remove"].forEach(function (a) {
                x(l, a, function () {
                    this.chart.accessibility && (this.chart.a11yDirty = !0)
                })
            });
            ["afterDrilldown", "drillupall"].forEach(function (a) {
                x(b, a, function () {
                    this.accessibility && this.accessibility.update()
                })
            });
            x(b, "destroy", function () {
                this.accessibility && this.accessibility.destroy()
            })
        });
        v(b, "masters/modules/accessibility.src.js", [], function () {
        })
    });
    //# sourceMappingURL=accessibility.js.map
</script>
{{--highchart-localization--}}
<script>
    /**
     * Highcharts Localization plugin.
     * This plugin used for localization Highcharts date and number and also could be extend as you need.
     *
     *
     * @License GPLv3
     * @version 1.0
     * @author Milad Jafary (milad.jafary@gmail.com)
     */

    function getPersianLocal() {
        var PersianLocalizationDate = {
            /**
             * Get a timestamp and return jalali date.
             * @param timestamp
             * @returns {date: Date, hours: number, day: *, dayOfMonth: *, month: *, fullYear: *}
             */
            getDate: function (timestamp) {
                var date = new Date(timestamp);
                return {
                    date: date,
                    hours: date.getHours(),
                    day: date.getJalaliDay(),
                    dayOfMonth: date.getJalaliDate(),
                    month: date.getJalaliMonth(),
                    fullYear: date.getJalaliFullYear()
                };
            }
        };

        return {
            /**
             * @type {String} , An ISO 639-1 language code
             */
            lang: 'fa',
            /**
             * @type {String} , An ISO 3166-1 language code
             */
            country: 'IR',
            date: PersianLocalizationDate,
            i18n: {
                weekdays: ['????????', '????????????', '????????????', '???? ????????', '????????????????', '?????? ????????', '????????'],
                months: ['??????????????', '????????????????', '??????????', '??????', '??????????', '????????????', '??????', '????????', '??????', '????', '????????', '??????????']
            }
        };
    }

    (function (Highcharts) {

        var UNDEFINED;
        var LocalizationDate = {
            options: {
                locale: {
//                fa: {
//                    lang: 'fa',
//                    country: 'IR',
//                    date: FaLocalizationDate,
//                    i18n: {
//                        weekdays: ['????????', '????????????', '????????????', '???? ????????', '????????????????', '?????? ????????', '????????'],
//                        months: ['??????????????', '????????????????', '??????????', '??????', '??????????', '??????????????', '??????', '????????', '??????', '????', '????????', '??????????']
//                    }
//                }
                }
            },

            addLocale: function (locale) {
                this.options.locale[locale.lang] = locale;
            },

            defined: function (obj) {
                return obj !== UNDEFINED && obj !== null;
            },

            pick: function () {
                var args = arguments,
                    i,
                    arg,
                    length = args.length;
                for (i = 0; i < length; i++) {
                    arg = args[i];
                    if (typeof arg !== 'undefined' && arg !== null) {
                        return arg;
                    }
                }
            },

            pad: function (number, length) {
                // Create an array of the remaining length +1 and join it with 0's
                return new Array((length || 2) + 1 - String(number).length).join(0) + number;
            },

            getI18nByLang: function (lang) {
                if (!this.defined(this.options.locale[lang].i18n)) {
                    throw "Invalid i18n for language";
                }
                return this.options.locale[lang].i18n;
            },

            getMonthName: function (month, lang) {
                var i18n = this.getI18nByLang(lang);
                if (!this.defined(i18n.months)) {
                    throw "i18n for months is undefined";
                }
                return i18n.months[month];
            },

            getWeekDay: function (weekday, lang) {
                var i18n = this.getI18nByLang(lang);
                if (!this.defined(i18n.weekdays)) {
                    throw "i18n for weekdays is undefined";
                }
                return i18n.weekdays[weekday];
            },

            getDateByLocaleLang: function (localeLang) {
                if (!this.defined(this.options.locale[localeLang].date)) {
                    throw "Invalid date object for selected local";
                }
                return this.options.locale[localeLang].date;
            },

            dateFormat: function (format, timestamp, capitalize, locale) {
                if (!this.defined(timestamp) || isNaN(timestamp)) {
                    return 'Invalid date';
                }

                format = this.pick(format, '%Y-%m-%d %H:%M:%S');

                var lang = locale['lang'],
                    localeDate = this.getDateByLocaleLang(lang).getDate(timestamp),
                    date = localeDate['date'],
                    hours = localeDate['hours'],
                    day = localeDate['day'],
                    dayOfMonth = localeDate['dayOfMonth'],
                    month = localeDate['month'],
                    fullYear = localeDate['fullYear'],
                    key;

                // List all format keys. Custom formats can be added from the outside.
                var replacements = {
                    // Day
                    'a': this.getWeekDay(day, lang).substr(0, 3), // Short weekday, like 'Mon'
                    'A': this.getWeekDay(day, lang), // Long weekday, like 'Monday'
                    'd': this.pad(dayOfMonth), // Two digit day of the month, 01 to 31
                    'e': dayOfMonth, // Day of the month, 1 through 31

                    // Month
                    'b': this.getMonthName(month, lang).substr(0, 3), // Short month, like 'Jan'
                    'B': this.getMonthName(month, lang), // Long month, like 'January'
                    'm': this.pad(month + 1), // Two digit month number, 01 through 12

                    // Year
                    'y': fullYear.toString().substr(2, 2), // Two digits year, like 09 for 2009
                    'Y': fullYear, // Four digits year, like 2009

                    // Time
                    'H': this.pad(hours), // Two digits hours in 24h format, 00 through 23
                    'I': this.pad((hours % 12) || 12), // Two digits hours in 12h format, 00 through 11
                    'l': (hours % 12) || 12, // Hours in 12h format, 1 through 12
                    'M': this.pad(date.getMinutes()), // Two digits minutes, 00 through 59
                    'p': hours < 12 ? 'AM' : 'PM', // Upper case AM or PM
                    'P': hours < 12 ? 'am' : 'pm', // Lower case AM or PM
                    'S': this.pad(date.getSeconds()), // Two digits seconds, 00 through  59
                    'L': this.pad(Math.round(timestamp % 1000), 3) // Milliseconds (naming from Ruby)
                };

                // do the replaces
                for (key in replacements) {
                    while (format.indexOf('%' + key) !== -1) { // regex would do it in one line, but this is faster
                        format = format.replace('%' + key, typeof replacements[key] === 'function' ? replacements[key](timestamp) : replacements[key]);
                    }
                }

                // Optionally capitalize the string and return
                return capitalize ? format.substr(0, 1).toUpperCase() + format.substr(1) : format;
            }
        };

        Highcharts.localizationDateFormat = function (format, timestamp, capitalize) {
            if (!LocalizationDate.defined(Highcharts.getOptions().locale)) {
                return Highcharts.dateFormat(format, timestamp, capitalize);
            }
            var Locale = Highcharts.getOptions().locale;
            LocalizationDate.addLocale(Locale);
            return LocalizationDate.dateFormat(format, timestamp, capitalize, Locale);
        };

        Highcharts.localizationNumber = function (number) {
            if (!LocalizationDate.defined(Highcharts.getOptions().locale)) {
                return number;
            }

            return number.toString().replace(/\d+/g, function (digit) {
                var ret = '';
                for (var i = 0, len = digit.length; i < len; i++) {
                    ret += String.fromCharCode(digit.charCodeAt(i) + 1728);
                }
                return ret;
            });
        }
    }(Highcharts));


</script>

@stack('scripts')