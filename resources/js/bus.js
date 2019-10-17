/*
* This file is used to send events methods from one component to another component. Currently using this
* with carrier show blade to. Current components: CarrierOfficeNavigation, CarrierDataShow, 
* CarrierFactorShow, CarrierInsuracneShow, CarrierReferencesShow
*
* reference https://stackoverflow.com/questions/53728386/vue-call-method-of-another-component
*/
import Vue from 'vue';
export const EventBus = new Vue();