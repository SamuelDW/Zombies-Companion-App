import Routing from '../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router';
const Routes = require('../../../public/js/fos_js_routes.json');
Routing.setRoutingData(Routes);

export {Routing, Routes}