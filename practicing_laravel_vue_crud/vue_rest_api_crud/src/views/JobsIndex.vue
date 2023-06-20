<script setup>
import { onMounted, ref } from 'vue';
import useJobs from '../composables/jobs';
import { RouterLink } from 'vue-router';

const { jobs, getJobs, destroyJob } = useJobs();
onMounted(() => {
    getJobs();
})
</script>

<template>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 table-responsive">
                    <RouterLink :to="{ name: 'jobsCreate' }" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-plus me-1"></i>
                        အသစ်ထည့်ရန်
                    </RouterLink>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    အလုပ်ခေါင်းစဉ်
                                </th>
                                <th>ဖော်ပြချက်</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="job in jobs" :key="job.id">
                                <td class="text-nowrap">{{ job.title }}</td>
                                <td>{{ job.description }}</td>
                                <td class="text-nowrap">
                                    <RouterLink :to="'/jobs/edit/' + job.id" class="btn btn-sm btn-success me-1">
                                        <i class="fa-solid fa-user-pen"></i>
                                        ပြင်မည်
                                    </RouterLink>
                                    <button type="button" @click="destroyJob(job.id)" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash me-1"></i>
                                        ဖျက်မည်
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</template>
