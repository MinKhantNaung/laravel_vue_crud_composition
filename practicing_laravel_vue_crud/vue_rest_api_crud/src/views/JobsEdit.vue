<script setup>
import { onMounted } from 'vue'
import { RouterLink } from 'vue-router';
import useJobs from '../composables/jobs';

const { job, errors, getJob, updateJob } = useJobs();

const props = defineProps({
    id: {
        required: true, 
        type: String
    }
})

onMounted(() => getJob(props.id));
</script>

<template>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>အလုပ်infoကို ပြင်ရန်
                                <router-link to="/jobs" class="btn btn-sm btn-secondary float-end">
                                    <i class="fa-solid fa-backward me-1"></i>
                                    နောက်သို့
                                </router-link>
                            </h5>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="updateJob(job.id)" method="POST">
                                <div class="mb-3">
                                    <label for="title">အလုပ်ခေါင်းစဉ်</label>
                                    <input type="text" id="title" v-model="job.title"
                                        :class="[{ 'is-invalid': errors.title }, 'form-control']"
                                        placeholder="ခေါင်းစဉ်ထည့်ပါ">
                                    <div v-if="errors.title" class="text-danger">
                                        {{ errors.title[0] }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="desc">ဖော်ပြချက်</label>
                                    <textarea id="desc" v-model="job.description"
                                        :class="[{ 'is-invalid': errors.description }, 'form-control']"
                                        placeholder="ဖော်ပြချက်ထည့်ပါ"></textarea>
                                    <div v-if="errors.description" class="text-danger">
                                        {{ errors.description[0] }}
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-check me-1"></i>
                                    ပြင်မည်
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main></template>
