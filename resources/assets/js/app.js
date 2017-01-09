/**
 * Created by illia on 03.01.17.
 */



var app = new Vue({
    el: "#carList",
    data: {
        popup: "hey bitch",
        inputCarName: '',
        cars: [
            {carName: 'bang', milage: '40000'},
            {carName: 'swang', milage: 'n/a'},
            {carName: 'ohhnow', milage: '32223'},
            {carName: 'wv', milage: '3534'},
            {carName: 'benz', milage: '1300000'}
        ],
        active: true,
        message: "Hi nigaa pigga",
        tasks: [
            {description: 'Loverm', completed: true},
            {description: 'ipsda', completed: false},
            {description: 'dcgshu,mun', completed: true},
            {description: 'asda', completed: false},
            {description: 'dasdtyum6nb546v ', completed: true},
            {description: 'Lovcdfhfdjnerm', completed: false},
            {description: 'asddy7op2fcdasd', completed: true},
            {description: 'Lovasdasderm', completed: false},
            {description: 'asdbkiio,m;[p-,m346asd', completed: true},
            {description: 'hf6ff34vggbjut', completed: false},
            {description: 'asvda', completed: true},
            {description: 'kubj4kjy', completed: false}
        ]

    },
    methods: {
        addCar() {
            this.cars.push({carName: this.inputCarName});
            this.inputCarName = '';

            this.active = !this.active;
        },
        changeState(task) {
           task.completed = !task.completed;
        }
    },

    computed: {
        reversedMessage() {
            return this.message.split('').reverse().join('');
        },

        completedTasks() {
            return this.tasks.filter(task => task.completed);
        },

        notCompletedTasks() {
            return this.tasks.filter(task => !task.completed);
        }
    }
});

