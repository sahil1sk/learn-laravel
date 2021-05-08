<template>
    <div>
       <div class="content">
			<div class="container-fluid">
				
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Tags <Button @click="addModel = true"><Icon type="md-add" />Add tag</Button></p>

					<div class="_overflow _table_div">
						<table class="_table" v-if="tags.length">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>Tag name</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(tag, i) in tags" :key="i">
								<td>{{tag.id}}</td>
								<td class="_table_name">{{tag.tagName}}</td>
								<td>{{tag.created_at}}</td>
								<td>
									<Button type="info">Edit</Button>
									<Button type="error">Delete</Button>
								</td>
							</tr>

						</table>
					</div>
				</div>

				<!-- Tag Heading model -->
				<!-- clossable to remove cross button -->
				<!-- mask clossable helps when we click backdrop it will not close modal -->
				<Modal
					v-model="addModel"
					title="Add tag"
					:mask-closable = "false"
					:closable = "false" 
				>

					<Input v-model="data.tagName" placeholder="Add tag name" />

					<div slot="footer">
						<Button type="default" @click="addModel = false" :disabled="isAdding">Close</Button>
						<Button type="primary" @click="addTag" :disabled="isAdding" :loading="isAdding"> {{ isAdding ? "Adding..." : "Add tag" }} </Button>
					</div>
				</Modal>

			</div>
		</div>
    </div>
</template>

<script>
export default {
	data() {
		return {
			data: {
				tagName: ''
			},
			addModel: false,
			isAdding: false,
			tags: [],
		}
	},
	methods: {
		async addTag() {
			if(this.data.tagName.trim() === '') return this.e("Tag name is required!");
			this.isAdding = true;

			const res = await this.callApi("post", "app/create_tag", this.data);
			if(res.status === 201) {
				this.tags.unshift(res.data);
				this.s("Tag has been added successfully!");
				this.addModel = false;
				this.data.tagName = "";
			} else {
				this.swr();
			}
			this.isAdding = false;
		}
	},
	async created() {
		const res = await this.callApi('get', 'app/get_tags');
		if(res.status === 200) {
			this.tags = res.data;
		} else {
			this.swr();
		}
	},
}
</script>