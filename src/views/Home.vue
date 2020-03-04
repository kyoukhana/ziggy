<template>
  <div class="container">
    <!--Header area -->
    <form id="invoice" @submit.prevent="save">
      <div class="row">
        <div class="column sm6 md6">
          <h1>ZIGGY’S COLLISION SERVICE</h1>333 McNielly Rd, Hamilton, ON, L8E 5H4
        </div>

        <div class="column sm6 md6">
          <p>
            Ziggy’s 905.746.024
            <br />Mo’s Cell 905.746.2471
            <br />Email: truckcarrepairs@gmail.com
            <br />
            Date: {{currentDate}}
          </p>
        </div>
      </div>
      <!--End header area -->

      <!--Start Row -->
      <div class="row">
        <div class="column sm6 md6">
          <label class="radio-container" style="margin-top: 20px;">
            Invoice
            <input
              type="radio"
              checked="checked"
              name="formtype"
              value="Invoice"
              v-model="frm.formtype"
            />
            <span class="checkmark"></span>
          </label>
          <label class="radio-container">
            Quote
            <input type="radio" name="formtype" value="Quote" v-model="frm.formtype" />
            <span class="checkmark"></span>
          </label>
        </div>
        <div class="column sm6 md6">
          <div class="input-group">
            <label class="label" id="lblDate"></label>
          </div>
        </div>
      </div>
      <!--End Row -->
      <!--Start Row -->
      <div class="row">
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">First Name*</label>
            <input
              class="input--style-4"
              type="text"
              name="firstName"
              v-model="$v.frm.firstName.$model"
            />
            <p class="error" v-if="!$v.frm.firstName.required">Required Field</p>
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">last name</label>
            <input
              class="input--style-4"
              type="text"
              name="lastName"
              v-model="$v.frm.lastName.$model"
            />
            <p class="error" v-if="!$v.frm.lastName.required">Required Field</p>
          </div>
        </div>

        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Email</label>
            <input class="input--style-4" type="email" name="email" v-model="$v.frm.email.$model" />
            <p class="error" v-if="!$v.frm.email.required">Required Valid Email</p>
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Address</label>
            <input
              class="input--style-4"
              type="text"
              name="address"
              v-model="$v.frm.address.$model"
            />
            <p class="error" v-if="!$v.frm.address.$model">Required Field</p>
          </div>
        </div>
      </div>
      <!--End Row -->

      <!--Start row -->
      <div class="row">
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">City</label>
            <input class="input--style-4" type="text" name="city" v-model="$v.frm.city.$model" />
            <p class="error" v-if="!$v.frm.city.$model">Required Field</p>
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Prov</label>
            <input class="input--style-4" type="text" name="prov" v-model="$v.frm.prov.$model" />
            <p class="error" v-if="!$v.frm.prov.$model">Required Field</p>
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Postal</label>
            <input class="input--style-4" type="text" name="postal" v-model="$v.frm.postal.$model" />
            <p class="error" v-if="!$v.frm.postal.$model">Required Field</p>
          </div>
        </div>

        <div class="column sm2 md2">
          <div class="input-group">
            <label class="label">Phone</label>
            <input class="input--style-4" type="text" name="phone" v-model="frm.phone" />
          </div>
        </div>
      </div>
      <!--End Row -->

      <!--Start row -->
      <div class="row">
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Make</label>
            <select class='select-css' name="make" v-model="frm.make">
              <option
                data-dropdownvalue="-1"
                value
                data-count="-1"
                class="dropdown-top-row"
              >Any Make</option>
              <optgroup label="Popular Makes">
                <option value="Acura">Acura</option>
                <option value="Audi">Audi</option>
                <option value="BMW">BMW</option>
                <option value="Buick">Buick</option>
                <option value="Cadillac">Cadillac</option>
                <option value="Chevrolet">Chevrolet</option>
                <option value="Chrysler">Chrysler</option>
                <option value="Dodge or Ram">Dodge or Ram</option>
                <option value="Ferrari">Ferrari</option>
                <option value="Ford">Ford</option>
                <option value="GMC">GMC</option>
                <option value="Honda">Honda</option>
                <option value="Hyundai">Hyundai</option>
                <option value="Infiniti">Infiniti</option>
                <option value="Jaguar">Jaguar</option>
                <option value="Jeep">Jeep</option>
                <option value="Kia">Kia</option>
                <option value="Lamborghini">Lamborghini</option>
                <option value="Land Rover">Land Rover</option>
                <option value="Lexus">Lexus</option>
                <option value="Lincoln">Lincoln</option>
                <option value="Maserati">Maserati</option>
                <option value="Mazda">Mazda</option>
                <option value="Mercedes-AMG">Mercedes-AMG</option>
                <option value="Mercedes-Benz">Mercedes-Benz</option>
                <option value="MINI">MINI</option>
                <option value="Mitsubishi">Mitsubishi</option>
                <option value="Nissan">Nissan</option>
                <option value="Porsche">Porsche</option>
                <option value="Ram">Ram</option>
                <option value="Subaru">Subaru</option>
                <option value="Tesla">Tesla</option>
                <option value="Toyota">Toyota</option>
                <option value="Volkswagen">Volkswagen</option>
                <option value="Volvo">Volvo</option>
              </optgroup>
              <optgroup label="All Makes">
                <option value="AC">AC</option>
                <option value="Acura">Acura</option>
                <option value="Alfa Romeo">Alfa Romeo</option>
                <option value="AM General">AM General</option>
                <option value="American Motors (AMC)">American Motors (AMC)</option>
                <option value="Amphicar">Amphicar</option>
                <option value="Aston Martin">Aston Martin</option>
                <option value="Audi">Audi</option>
                <option value="Austin">Austin</option>
                <option value="Austin-Healey">Austin-Healey</option>
                <option value="Bentley">Bentley</option>
                <option value="BMW">BMW</option>
                <option value="Bugatti">Bugatti</option>
                <option value="Buick">Buick</option>
                <option value="Cadillac">Cadillac</option>
                <option value="Caterham">Caterham</option>
                <option value="Chevrolet">Chevrolet</option>
                <option value="Chrysler">Chrysler</option>
                <option value="Citroen">Citroen</option>
                <option value="Daihatsu">Daihatsu</option>
                <option value="Datsun">Datsun</option>
                <option value="De Soto">De Soto</option>
                <option value="Diamond T">Diamond T</option>
                <option value="DKW">DKW</option>
                <option value="Dodge">Dodge</option>
                <option value="Dodge or Ram">Dodge or Ram</option>
                <option value="Eagle">Eagle</option>
                <option value="Edsel">Edsel</option>
                <option value="Essex">Essex</option>
                <option value="Factory Five Racing">Factory Five Racing</option>
                <option value="Ferrari">Ferrari</option>
                <option value="Fiat">Fiat</option>
                <option value="Fisker">Fisker</option>
                <option value="Ford">Ford</option>
                <option value="Four Winds">Four Winds</option>
                <option value="Franklin">Franklin</option>
                <option value="Freightliner">Freightliner</option>
                <option value="Genesis">Genesis</option>
                <option value="Geo">Geo</option>
                <option value="GMC">GMC</option>
                <option value="Hino">Hino</option>
                <option value="Honda">Honda</option>
                <option value="Hummer">Hummer</option>
                <option value="Hyundai">Hyundai</option>
                <option value="Infiniti">Infiniti</option>
                <option value="International">International</option>
                <option value="Isuzu">Isuzu</option>
                <option value="Jaguar">Jaguar</option>
                <option value="Jeep">Jeep</option>
                <option value="Karma">Karma</option>
                <option value="Kia">Kia</option>
                <option value="Lamborghini">Lamborghini</option>
                <option value="Lancia">Lancia</option>
                <option value="Land Rover">Land Rover</option>
                <option value="Lexus">Lexus</option>
                <option value="Lincoln">Lincoln</option>
                <option value="Lotus">Lotus</option>
                <option value="Maserati">Maserati</option>
                <option value="Maybach">Maybach</option>
                <option value="Mazda">Mazda</option>
                <option value="McLaren">McLaren</option>
                <option value="Mercedes-AMG">Mercedes-AMG</option>
                <option value="Mercedes-Benz">Mercedes-Benz</option>
                <option value="Mercury">Mercury</option>
                <option value="MG">MG</option>
                <option value="MINI">MINI</option>
                <option value="Mitsubishi">Mitsubishi</option>
                <option value="Morgan">Morgan</option>
                <option value="Morris">Morris</option>
                <option value="MV-1">MV-1</option>
                <option value="Nissan">Nissan</option>
                <option value="Oldsmobile">Oldsmobile</option>
                <option value="Opel">Opel</option>
                <option value="Packard">Packard</option>
                <option value="Pagani">Pagani</option>
                <option value="Plymouth">Plymouth</option>
                <option value="Pontiac">Pontiac</option>
                <option value="Porsche">Porsche</option>
                <option value="Ram">Ram</option>
                <option value="Renault">Renault</option>
                <option value="Rolls-Royce">Rolls-Royce</option>
                <option value="Rover">Rover</option>
                <option value="Saab">Saab</option>
                <option value="Saleen">Saleen</option>
                <option value="Saturn">Saturn</option>
                <option value="Scion">Scion</option>
                <option value="Shelby">Shelby</option>
                <option value="smart">smart</option>
                <option value="Sterling">Sterling</option>
                <option value="Studebaker">Studebaker</option>
                <option value="Subaru">Subaru</option>
                <option value="Sunbeam">Sunbeam</option>
                <option value="Suzuki">Suzuki</option>
                <option value="Tesla">Tesla</option>
                <option value="Toyota">Toyota</option>
                <option value="Triumph">Triumph</option>
                <option value="TVR">TVR</option>
                <option value="Vauxhall">Vauxhall</option>
                <option value="Volkswagen">Volkswagen</option>
                <option value="Volvo">Volvo</option>
                <option value="VPG">VPG</option>
                <option value="Willys">Willys</option>
                <option value="Yugo">Yugo</option>
              </optgroup>
            </select>
          </div>
        </div>
        <div class="column sm2 md2">
          <div class="input-group">
            <label class="label">Model</label>
            <input class="input--style-4" type="text" name="model" v-model="frm.model" />
          </div>
        </div>
        <div class="column sm2 md2">
          <div class="input-group">
            <label class="label">Year</label>
            <input class="input--style-4" type="text" name="year" v-model="frm.year" />
          </div>
        </div>

        <div class="column sm2 md2">
          <div class="input-group">
            <label class="label">Colour</label>
            <input class="input--style-4" type="text" name="colour" v-model="frm.colour" />
          </div>
        </div>

        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">License Plate</label>
            <input class="input--style-4" type="text" name="plate" v-model="frm.plate" />
          </div>
        </div>
      </div>
      <!--End Row -->

      <!---Start row -->
      <div class="row">
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Vin</label>
            <input class="input--style-4" type="text" name="vin" v-model="frm.vin" />
          </div>
        </div>
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Odometer</label>
            <input class="input--style-4" type="text" name="odometer" v-model="frm.odometer" />
          </div>
        </div>
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Detectuble</label>
            <input class="input--style-4" type="text" name="detectuble" v-model="frm.detectuble" />
          </div>
        </div>
      </div>
      <!--End row -->

      <!--Start Insurnace info -->
      <div class="row">
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Insurance</label>
            <input class="input--style-4" type="text" name="insurance" v-model="frm.insurance" />
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Phone</label>
            <input
              class="input--style-4"
              type="text"
              name="insurancePhone"
              v-model="frm.insurancephone"
            />
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Policy No</label>
            <input class="input--style-4" type="text" name="policy" v-model="frm.policyno" />
          </div>
        </div>

        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Claim No</label>
            <input class="input--style-4" type="text" name="claim" v-model="frm.claimno" />
          </div>
        </div>
      </div>
      <!--End Insurnace info -->
      <!---Start row -->
      <div class="row">
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Appraiser</label>
            <input class="input--style-4" type="text" name="appraiser" v-model="frm.appraiser" />
          </div>
        </div>
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Date Recived</label>
            <vc-date-picker v-model="frm.daterecived" style="padding:13px;" />
          </div>
        </div>
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Date Released</label>
            <vc-date-picker v-model="frm.datereleased" style="padding:13px;" />
          </div>
        </div>
      </div>
      <!--End row -->
      <!---Start row -->
      <div class="row">
        <div class="column sm12 md12">
          <div class="input-group">
            <label class="label">Work Performed</label>
            <textarea
              name="wordperformed"
              class="input--style-4"
              rows="2"
              cols="100%"
              v-model="frm.wordperformed"
            ></textarea>
          </div>
        </div>
      </div>
      <!--End row -->

      <!---Start row -->
      <div class="row">
        <div class="column sm6 md6">
          <div class="input-group">
            <label class="label">Customer Signature</label>
            <input
              class="input--style-4"
              type="text"
              name="daterecived"
              id="signature"
              v-model="frm.signature"
            />
          </div>
        </div>
        <div class="column sm6 md6">
          <div class="input-group">
            <label class="label">Labour</label>
            <currency-input
              class="input--style-4"
              name="labour"
              id="labour"
              currency="USD"
              v-model="frm.labour"
            />
            <label class="label">Parts</label>
            <currency-input
              class="input--style-4"
              name="labour"
              id="labour"
              currency="USD"
              v-model="frm.parts"
            />
          </div>

          <p>
            HST:
            <span id="hst">{{hstv}}</span>
          </p>
          <p>
            Total Cost:
            <span id="totalCost">{{total}}</span>
          </p>
        </div>
        <div class="row">
          <div class="column sm6 md6">
            <button
              type="submit"
              class="btnPrint"
              id="printme"
              style="padding:20px; background-color:#eee"
            >PRINT</button>
          </div>
          <div class="column sm6 md6">
            <button
              type="submit"
              class="btnPrint"
              id="email"
              style="padding:20px; background-color:#eee"
            >EMAIL</button>
          </div>
        </div>
      </div>
      <!--End row -->
    </form>
  </div>
</template>

<script>
import { required, minLength, email } from 'vuelidate/lib/validators';

export default {
  name: 'home',
  data() {
    return {
      uiState: 'submit not clicked',
      errors: false,
      empty: true,
      dirty: false,
      frm: {
        formtype: '',
        firstName: '',
        lastName: '',
        email: '',
        address: '',
        city: '',
        prov: 'Ontario',
        postal: '',
        phone: '',
        make: '',
        model: '',
        year: '',
        colour: '',
        plate: '',
        vin: '',
        odometer: '',
        detectuble: '',
        insurance: '',
        insurancephone: '',
        policyno: '',
        claimno: '',
        appraiser: '',
        daterecived: new Date(),
        datereleased: new Date(),
        wordperformed: '',
        signature: '',
        labour: 0,
        parts: 0,
        hst: 0,
        totalCost: 0,
        debugerror: {},
      },
      newFrm: {},
    };
  },
  validations: {
    frm: {
      firstName: {
        required,
        minLength: minLength(2),
      },
      lastName: {
        required,
        minLength: minLength(2),
      },
      address: {
        required,
        minLength: minLength(2),
      },
      city: {
        required,
        minLength: minLength(2),
      },
      prov: {
        required,
        minLength: minLength(2),
      },
      postal: {
        required,
        minLength: minLength(6),
      },
      email: {
        required,
        email,
      },
    },
  },
  methods: {
    save(e) {
      e.preventDefault();
      this.frm.dirty = !this.$v.frm.$anyDirty;
      this.frm.errors = this.$v.frm.$anyError;
      console.log(this.frm.errors);
      if (this.frm.errors === true) {
        /* eslint-disable */
        alert("Please make sure you fill out the required fields");
      }
      else
      {
        this.$http.post('/api/', this.frm).then((response) => { 
          /* eslint-disable */
          alert("Your Message was sent");
         });
      }
    },
  },
  computed: {
    currentDate() {
      const d = new Date();
      return d.toLocaleDateString();
      },
       hstv() {
          const totalHST = (parseFloat(this.frm.parts || 0) + parseFloat(this.frm.labour || 0)) * 0.13;
          return totalHST.toLocaleString('en-CA', { style: 'currency', currency: 'CAD', minimumFractionDigits: 2 });
       },
       total() {
         const total = (parseFloat(this.frm.parts || 0) + parseFloat(this.frm.labour || 0)) * 1.13;
          return total.toLocaleString('en-CA', { style: 'currency', currency: 'CAD', minimumFractionDigits: 2 });
       },
  },
  mounted() {
    this.frm.totalCost = this.total;
    this.frm.hst = this.hstv;
  },
};
</script>
