<template>
    <div>
        <input id="trix" type="hidden" :name="name" :value="value">

        <trix-editor ref="trix" input="trix" :placeholder="placeholder"></trix-editor>
    </div>
</template>

<script>
    import Trix from 'trix';

    export default {
        props: ['name', 'value', 'placeholder'],

        mounted () {
            this.$ref.trix.addEventListener('trix-change'. e => {
                console.log('Handling');
                this.$emit('input', e.target.innerHTML);
                
            });
        }
    }

</script>