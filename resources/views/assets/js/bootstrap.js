// Load plugins
import cash from 'cash-dom';

// Set plugins globally
window.cash = cash;

window.byId = (id) => document.getElementById(id);
window.byIdOptional = (id) => byId(id) || {};
window.byIdCash = (id) => cash(byId(id));

window.float = (value) => isNaN(value = parseFloat(value)) ? 0 : value;
window.round = (value, decimals = 8) => +(Math.round(value + 'e+' + decimals)  + 'e-' + decimals);
window.percentRound = (value1, value2) => round(Math.abs((float(value1) * 100 / float(value2)) - 100), 2);
