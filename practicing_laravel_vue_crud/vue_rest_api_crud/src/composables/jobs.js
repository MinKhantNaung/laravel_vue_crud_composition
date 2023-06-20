import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

axios.defaults.baseURL = 'http://localhost:8000/api/';

export default function useJobs() {
    const jobs = ref([]);
    const job = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getJobs = async () => {
        const response = await axios.get('jobs');
        jobs.value = response.data.jobs;
    }

    const getJob = async (id) => {
        const response = await axios.get('jobs/' + id);
        job.value = response.data.job;
    }

    const storeJob = async (data) => {
        try {
            await axios.post('jobs', data);
            await router.push({ name: 'jobsIndex' })
        } catch (error) {
            if (error.response.status === 400) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateJob = async (id) => {
        try {
            await axios.put('jobs/' + id, job.value);
            await router.push({ name: 'jobsIndex' });
        } catch (error) {
            if (error.response.status === 400) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyJob = async (id) => {
        if (confirm('Sure to delete?')) {
            await axios.delete('jobs/' + id);
            await getJobs();
        }
    }

    return {
        jobs,
        job,
        errors,
        getJobs,
        getJob,
        storeJob,
        updateJob,
        destroyJob
    }
}