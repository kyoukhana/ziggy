<template>
  <div class="container">
    <!--Header area -->
    <form id="invoice"  @submit.prevent="save">
      <div class="row">
        <div class="column sm6 md6">
          <h1>ZIGGY’S COLLISION SERVICE</h1>333 McNielly Rd, Hamilton, ON, L8E 5H4
        </div>

        <div class="column sm6 md6">
          <p>
            Ziggy’s 905.746.024
            <br />Mo’s Cell 905.746.2471
            <br />Email: truckcarrepairs@gmail.com<br> Date: {{currentDate}}
          </p>
        </div>
      </div>
      <!--End header area -->

      <!--Start Row -->
      <div class="row">
        <div class="column sm6 md6">
          <label class="radio-container" style="margin-top: 20px;">
            Invoice
            <input type="radio" checked="checked" name="formtype" value="Invoice"  v-model="frm.formtype"/>
            <span class="checkmark"></span>
          </label>
          <label class="radio-container">
            Quote
            <input type="radio" name="formtype" value="Quote" v-model="frm.formtype"/>
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
            <input class="input--style-4" type="text" name="firstName" v-model="$v.frm.firstName.$model"/>
            <p class="error" v-if="!$v.frm.firstName.required">Required Field</p>
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">last name</label>
             <input class="input--style-4" type="text" name="lastName" v-model="$v.frm.lastName.$model"/>
            <p class="error" v-if="!$v.frm.lastName.required">Required Field</p>
          </div>
        </div>

        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Email</label>
            <input class="input--style-4" type="email" name="email" v-model="$v.frm.email.$model"/>
             <p class="error" v-if="!$v.frm.email.email">Required Valid Email</p>
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Address</label>
            <input class="input--style-4" type="text" name="address" v-model="$v.frm.address.$model" />
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
            <input class="input--style-4" type="text" name="prov" v-model="$v.frm.prov.$model"/>
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

        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Phone</label>
            <input class="input--style-4" type="text" name="phone" v-model="frm.phone"/>
          </div>
        </div>
      </div>
      <!--End Row -->

      <!--Start row -->
      <div class="row">
        <div class="column sm2 md2">
          <div class="input-group">
            <label class="label">Make</label>
            <input class="input--style-4" type="text" name="make" v-model="frm.make" />
          </div>
        </div>
        <div class="column sm3 md3">
          <div class="input-group">
            <label class="label">Model</label>
            <input class="input--style-4" type="text" name="model" v-model="frm.model"/>
          </div>
        </div>
        <div class="column sm2 md2">
          <div class="input-group">
            <label class="label">Year</label>
            <input class="input--style-4" type="text" name="year" v-model="frm.year"/>
          </div>
        </div>

        <div class="column sm2 md2">
          <div class="input-group">
            <label class="label">Colour</label>
            <input class="input--style-4" type="text" name="colour" v-model="frm.colour"/>
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
            <input class="input--style-4" type="text" name="detectuble"  v-model="frm.detectuble"/>
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
            <label class="label">Insurance Phone</label>
            <input class="input--style-4" type="text" name="insurancePhone"  v-model="frm.insurancephone"/>
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
            <input class="input--style-4" type="text" name="claim" v-model="frm.claimno"/>
          </div>
        </div>
      </div>
      <!--End Insurnace info -->
      <!---Start row -->
      <div class="row">
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Appraiser</label>
            <input class="input--style-4" type="text" name="appraiser" v-model="frm.appraiser"/>
          </div>
        </div>
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Date Recived</label>
            <vc-date-picker v-model="frm.daterecived" style="padding:13px;"/>
          </div>
        </div>
        <div class="column sm4 md4">
          <div class="input-group">
            <label class="label">Date Released</label>
             <vc-date-picker v-model="frm.datereleased" style="padding:13px;"/>
          </div>
        </div>
      </div>
      <!--End row -->
      <!---Start row -->
      <div class="row">
        <div class="column sm12 md12">
          <div class="input-group">
            <label class="label">Work Performed</label>
            <textarea name="wordperformed" class="input--style-4" rows="2" cols="100%" v-model="frm.wordperformed"></textarea>
          </div>
        </div>
      </div>
      <!--End row -->

      <!---Start row -->
      <div class="row">
        <div class="column sm6 md6">
          <div class="input-group">
            <label class="label">Customer Signature</label>
            <input class="input--style-4" type="text" name="daterecived" id="signature" v-model="frm.signature"/>
          </div>
        </div>
        <div class="column sm6 md6">
          <div class="input-group">
            <label class="label">Labour</label>
            <currency-input class="input--style-4" name="labour" id="labour" currency="USD" v-model="frm.labour"/>
            <label class="label">Parts</label>
            <currency-input class="input--style-4" name="labour" id="labour" currency="USD" v-model="frm.parts"/>
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
          <div class="column sm6 md6">{{frm.debugerror}}<button type="submit" class="btnPrint" id="printme" style="padding:20px; background-color:#eee">PRINT</button></div>
          <div class="column sm6 md6"><button type="submit" class="btnPrint" id="email" style="padding:20px; background-color:#eee">EMAIL</button></div>
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
        prov: '',
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
      newFrm: {
      },
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
      this.frm.uiState = 'submit clicked';
      console.log(this.frm.errors);
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
