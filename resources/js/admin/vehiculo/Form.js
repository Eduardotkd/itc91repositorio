import AppForm from '../app-components/Form/AppForm';

Vue.component('vehiculo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                Nombre:  '' ,
                
            }
        }
    }

});