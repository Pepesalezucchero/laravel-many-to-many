<script>
import axios from 'axios';

export default {
    name:'ApiContent',
    data() {
        return {
            technologies: [],
            createFormActive: false,
            newTechnology: {
                technology_name: '',
                description: '',
                language: '',
            }
        }
    },
    methods: {
        toggleCreateNewTechnology() {
            this.createFormActive = true;
        },
        submitNewTechnology() {
            axios.post('http://127.0.0.1:8000/api/v1/technologies', this.newTechnology)
            .then(res=> {

                const data = res.data;
    
                if (data.status == 'success') {
                    this.technologies.push(data.technology);
                    this.createFormActive = false;
                }

            })
            .catch(err => {
                console.err(err);
            });
        }
    },
    mounted() {
        
        axios.get('http://127.0.0.1:8000/api/v1/technologies')
        .then(res=> {

            const data = res.data;
            
            if(data.status == 'success')
                this.technologies = data.technologies;

            console.log('funziona!: ', this.technologies);

        })
        .catch(err => {
            console.err(err);
        })
    }
}
</script>


<template>
    <h1>Technologies:</h1>

    <form v-if="createFormActive" @submit.prevent="submitNewTechnology">
        <label for="name_technology"><strong>Technology name: </strong></label>
        <input type="text" name="name_technology" id="name_technology" v-model="newTechnology.name_technology">
        <br>
        <br>
        <label for="description"><strong>Description: </strong></label>
        <input type="text" name="description" id="description" v-model="newTechnology.description">
        <br>
        <br>
        <label for="language"><strong>Language: </strong></label>
        <input type="text" name="language" id="language" v-model="newTechnology.language">
        <br>
        <br>
        <input type="submit" value="Create">
    </form>

    <div v-else>
        <button @click="toggleCreateNewTechnology">Create a new Technology tab</button>
        <ul>
            <li v-for="technology in technologies" :key="technology.id">
                <h1>{{ technology.name_technology }}</h1>
                <p>{{ technology.description }}</p>
                <p>{{ technology.language }}</p>
            </li>
        </ul>
    </div>

</template>

<style scoped>

ul {
    list-style-type: none;
}

</style>